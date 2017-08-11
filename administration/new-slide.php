
<?php

session_start();
if (!isset($_SESSION['users_name']))
{
    header("location: ../login.php");
    exit();
}

include_once '../data-cls/Slide.php';
include_once '../classes/Upload.php';



if (isset($_POST['submitSlide']))
{
    $upload = new Upload($_FILES['fileToUpload']);
    $upload->SetPath("../img/slider");
    $upload->SupportedTypes(array("image/jpeg"));
    $upload->Upload();
    
    if ($upload->Is_uploaded())
    {
        $lide = new Slide();
        
      
        $lide->Insert($upload->GetFileName(), $_POST['alt_text']);
        header("Location: slides.php");
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
                       
                        <form method="post" enctype="multipart/form-data">
                            <div><input name="fileToUpload" type="file"/></div>
                            
                            <div><textarea class="form-control top10" name="alt_text"></textarea></div>
                            
                            <input class="btn btn-default top10" type="submit" value="Simi" name="submitSlide"/>
                        </form>
               
                    </div> <!-- container -->
                </div> <!-- row -->
            </div>
        </div>
        

    </body>
</html>
