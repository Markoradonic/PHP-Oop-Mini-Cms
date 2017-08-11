
<?php

session_start();
if (!isset($_SESSION['users_name']))
{
    header("location: ../login.php");
    exit();
}

include_once '../data-cls/Slide.php';

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
                       
                        <?php $slide = new Slide(); ?> 
                        <?php foreach ($slide->GetAll() as $singleSlide):?>
                        <div class="slide-wrapp row top30">
                            <div class="col-md-6"><img src="../img/slider/<?php echo $singleSlide->path ?>" width="200" height="80" /></div>
                            <div class="col-md-3"><a class="btn btn-default top30" href="slide.php?id=<?php echo $singleSlide->id; ?>&action=edit ">Uredi</a></div>
                            <div class="col-md-3"><a class="btn btn-danger top30" href="slide.php?id=<?php echo $singleSlide->id; ?>&action=delete&name=<?php echo $singleSlide->path; ?> ">Izbrisi</a></div>
                        </div>
                        <?php endforeach; ?>
                        
                        <div class="bottom30"> 
                            <a class="btn btn-success top30" href="new-slide.php">Ubaci novu sliku</a>
                        </div>
               
                    </div> <!-- container -->
                </div> <!-- row -->
            </div>
        </div>
        

    </body>
</html>

