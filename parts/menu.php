<?php 
include_once 'data-cls/page.php';
$page = new Page();

//echo '<pre>', print_r($nizObjekate), '</pre>';
?>

<nav class="navbar navbar-default top30">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
    
     
        <?php 
        foreach ($page->GetAll() as $page)
        {
            echo '<li><a href="page.php?id=' . $page->id . '">'.$page->title . '</a></li>';
        }
        ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php">Uloguje se</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
  