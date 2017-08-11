
<?php

session_start();

if (!isset($_SESSION['users_name']))
{
    header("location: ../login.php");
    exit();
}

include_once '../data-cls/page.php';

if (isset($_GET['id']))
{
    //////////////////////////////////////
    if ($_GET['action'] == "delete")
    {
        $page = new Page();
        $page->DeleteByid($_GET['id']);
    } else
    {
        $page = new Page();
        $page->GetByID($_GET['id']);
    }
    ///////////////////////////////
    if (isset($_POST['Prepravi']))
    {
        $page->Update($_POST['pageName'], $_POST['pageContent']);
        
    }
}//..isset($_GET['id'])

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
                       
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Ime stranice</label>
                                    <input type="text" name="pageName" class="form-control max-w-300" value="<?php echo $page->title ?>">
                                </div>
                                <div class="form-group">
                                    <label>Tekst stranice</label>
                                    <textarea  name="pageContent" class="form-control ckeditor"><?php echo $page->content; ?></textarea>
                                </div>
                                <div class="form-group"> 
                                    <input type="submit" name="Prepravi" class="btn btn-default" value="Kreiraj">
                                </div>
                            </form>
                      
                    </div> <!-- container -->
                </div> <!-- row -->
            </div>
        </div>
        

    </body>
</html>

