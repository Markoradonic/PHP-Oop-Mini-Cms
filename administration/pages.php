
<?php

session_start();
if (!isset($_SESSION['users_name']))
{
    header("location: ../login.php");
    exit();
}

include_once '../data-cls/page.php';

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
                       
                        
                        <?php 
                       $page = new Page();
                       
                        ?>
                                            
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th>#</th>
                            <th>Ime</th>
                            <th>Uredi</th>
                            <th>Izbrisi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter = 1;?>
                            <?php foreach ($page->GetAll() as $pageObj): ?>
                           
                            <tr>
                            <td><?php echo $counter ?></td>
                            <td><?php echo $pageObj->title; ?></td>
                            <td><a href="page.php?id=<?php echo $pageObj->id; ?>&action=update">Uredi</a></td>
                            <td><a href="page.php?id=<?php echo $pageObj->id; ?>&action=delete">izbrisi</a></td>
                            </tr>
                         <?php $counter++; ?> 
                            <?php endforeach;?>
                            
                        </tbody>
                    </table>
                        <div><a class="btn btn-default" href="new-page.php">Nova Stranica</a></div>
                    </div> <!-- container -->
                </div> <!-- row -->
            </div>
        </div>
        

    </body>
</html>

