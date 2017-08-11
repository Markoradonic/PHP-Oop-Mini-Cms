<?php 
$page = new Page();
$page->GetByID($_GET['id']);

?>
<div class="row">
    <div class="col-md-2">
        <h2><?php echo $page->title ?></h2>
    </div>
    
    <div class="row">
        <div class="col-md-12">
          <?php 
          echo $page->content
          ?>
            
        </div>
    </div>
</div>