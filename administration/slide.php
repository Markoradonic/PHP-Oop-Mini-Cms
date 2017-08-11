<?php

include_once 'template.php';
$slide = new Slide();



if (isset($_GET['id']) && isset($_GET['action']))
{

    
    if ($_GET['action'] == "delete")
    {
        $slide  = new Slide();
        if ($slide->Delete($_GET['id']))
        {
            unlink("../img/slider/" . $_GET['name']);
            header("Location: slides.php");
        }
    }elseif($_GET['action'] == "edit")
    {
        
        $slide->GetById($_GET['id']);
    if (isset($_POST['updateSlide']))
        {
            $slide->alt_text = $_POST['alt_text'];
            $slide->Update();
        }
        
    }
    
    if (!isset($slide))
    {
        header("Location: erroer.php");
    }
    
}



?>

<div class="container">
    <div class="row">
        <div class="top10">
            <img height="150" width="400" src="<?php echo "../img/slider/" . $slide->path; ?>"/>
             
        </div>
        <form method="post" class="top10">
            <textarea class="form-control" name="alt_text"><?php echo $slide->alt_text; ?></textarea>
            <input type="submit" value="Uredi" name="updateSlide" class="btn btn-default top10"/>
        </form>
    </div>
</div>



