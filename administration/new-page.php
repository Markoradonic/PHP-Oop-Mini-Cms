
<?php

session_start();
if (!isset($_SESSION['users_name']))
{
    header("location: ../login.php");
    exit();
}

include_once '../data-cls/page.php';

 if (isset($_POST['pageSubmit']))
{
    if (!empty($_POST['pageName']) || !empty($_POST['pageContent']))
    {
         $page = new Page();
    $page->title = $_POST['pageName'];
    $page->content = $_POST['pageContent'];
    $page->Insert();
    if (!$page->error)
    {
        header("Location: pages.php");
    }else
    {
        $error_msg = $page->error_msg;
    }
    } else
    {
        echo '<div class="row">';
        echo '<div class="container">';
        echo '<div class="alert alert-danger">Unesite zeljene podateke</div>';
        echo '</div>';
        echo '</div>';
    }
   
}

?>

<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="../css/mine.css"> 
        <link type="text/css" rel="stylesheet" href="../css/bootstrap.css">
        <script src="../js/jquery-3.1.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../ckeditor/ckeditor.js"></script>
        
        <title>administracija</title>
    </head>
    <body>
        <div class="container">
            <div class="row" >
               
                
                <div class="col-md-10 top50">
                    <?php echo $_SESSION['users_name']; ?> <span>Dobrodosli na kontrolnu tablu</span>
                </div>
                <div class="top50">
                    <a href="logout.php"> Odjavi se </a>
                </div>
                
                <?php include_once 'parts/menu.php'; ?>
          
                <div class="row">
                    <div class="container">
                       
                        <div class="col-md-12">
                            <?php if (!empty($error_msg))
                            {
                                echo '<div class="alert alert-danger">'. $error_msg .'</div>';
                            } ?>
                            
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Ime stranice</label>
                                    <input type="text" name="pageName" class="form-control max-w-300">
                                </div>
                                <div class="form-group">
                                    <label>Tekst stranice</label>
                                    <textarea  name="pageContent" class="form-control ckeditor"></textarea>
                                </div>
                                <div class="form-group"> 
                                    <input type="submit" name="pageSubmit" class="btn btn-default" value="Kreiraj">
                                </div>
                            </form>
                        </div>
                      
                    </div> <!-- container -->
                </div> <!-- row -->
            </div>
        </div>
        

    </body>
</html>
