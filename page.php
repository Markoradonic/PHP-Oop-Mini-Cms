<?php 
    
    include_once 'data-cls/page.php';
    $page = new Page();
    if(isset($_GET['id']))
    {
        $page = new Page();
        $page->GetByID($_GET['id']);
       
        //echo '<pre>', print_r($page) ,'</pre>';
        
         if ($page->id == false)
          {
              header("Location: parts/error_page.php");
          }

        
    } else
{
    header('Location: error_page.php');   
    exit();
}
    
  
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="css/mine.css">
        <link rel="stylesheet" href="OwlCarousel2/dist/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="OwlCarousel2/dist/assets/owl.theme.default.min.css">   
        <link type="text/css" rel="stylesheet" href="css/bootstrap.css">
       <script src="js/jquery-3.1.1.min.js"></script>
       <script src="OwlCarousel2/dist/owl.carousel.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <title></title>
    </head>
    <body>
        
        <div class="container">
        <?php
       
        include_once 'parts/menu.php';
        include_once 'parts/slider.php';
        include_once 'parts/content.php';
        include_once 'parts/new-comment.php';
        include_once 'parts/comments.php';
        ?>
            
        </div>   
        
        <?php  
    
        ?>
        
    </body>
</html>
