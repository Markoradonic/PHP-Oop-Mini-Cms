<?php
include_once 'classes/UserLogin.php';

if (isset($_POST['posalji']))
{
    $login = new UserLogin();
    
    if ($login->Login($_POST['korisnickoime'], $_POST['lozinka']))
    {
        header('Location: administration/index.php');
    }
}

?>


<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="css/mine.css">
        <link type="text/css" rel="stylesheet" href="css/bootstrap.css">
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <title></title>
    </head>
    <body>
        
    <body>
        <div class="row">
        <div class="container">
      <div class="container">
    <div class="row top100">
        <form method="post" class="max-w-300 top200 center-block">
            <div class="form-group">
                <lebel>Korisnicko ime:</lebel>
                <input type="text" class="form-control" name="korisnickoime"/>
            </div>
            <div class="form-group">
                <lebel>Lozinka:</lebel>
                <input type="password" class="form-control" name="lozinka"/>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary center-block" name="posalji" value="Ulogus se" />
            </div>
            <?php   
                if(isset($login))
                {
                    echo '<div class="alert alert-danger">'. $login->status .'</div>';
                }
             ?>
        </form>
    </div>
</div>
        </div>  
        </div>  
        
        

    </body>    
    </body>
</html>
