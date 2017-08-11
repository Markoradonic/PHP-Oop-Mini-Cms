

<?php
    include_once 'data-cls/Comment.php';
    if(isset($_POST["posalji"]))
    {
        if(!empty($_POST["ime"]) && !empty($_POST["komentar"]))
        {
            $comment = new Comment();
            $comment->person_name = $_POST["ime"];
            $comment->content = $_POST["komentar"];
            $comment->id_page = $_POST["id_page"];
            $comment->Insert();
        }    
    }
?>

<div class="row">
    <div class="col-md-12">
        <form method="post">
            <div class="form-group">
                <label>Vase ime:</label>
                <input name="ime" type="text" class="form-control max-w-300">
            </div>
            
           <div class="form-group">
                <label>Vasa poruka:</label>
                <textarea name="komentar" type="text" class="form-control"></textarea>
            </div>
            
            <input name="id_page" type="hidden" value="<?php echo $_GET['id']?>">
     
            <div class="form-group">
                <input name="posalji" type="submit" class="btn btn-default" value="posalji">      
            </div>
        </form>
    </div>
</div>

