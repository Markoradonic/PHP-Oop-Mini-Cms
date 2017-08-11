
<?php
include_once '../data-cls/comment.php';
session_start();
if (!isset($_SESSION['users_name']))
{
    header("location: ../login.php");
    exit();
}

//include_once '../data-cls/page.php';

$comment = new comment();
if(isset($_GET['id']) && isset($_GET['action']))
{
    if ($_GET['action'] == 'delete')
    {
        $comment->DeleteById($_GET['id']);
        header("Location: comments.php");
    }elseif ($_GET['action'] == 'view')
    {
        $comment->GetById($_GET['id']);
        
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
                       
                        <div class="comment">
                            <div class="name"><b>Komentar napisao/la:</b> <?php echo $comment->person_name; ?> </div>
                            <div class="name"><b>Sadrzaj komentara:</b> <?php echo $comment->content; ?> </div>
                            <div><b>Komentar je postavljen na stranici: </b><?php echo $comment->page->title; ?></div>
                            <div class="top30"><a class="btn btn-danger" href="comment.php?id=<?php echo $comment->id ?>&action=delete">Delete</a></div>
                        </div>
 
                    </div> <!-- container -->
                </div> <!-- row -->
            </div>
        </div>
        

    </body>
</html>
