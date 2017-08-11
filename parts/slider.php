  


    <?php 
            include_once 'data-cls/Slide.php';
            $slide = new Slide();
            
            $slide->GetAll();
            
           
            
        ?>
<div class="row">
  <div class="container">
    <div class="owl-carousel owl-theme">
        
    
        <?php foreach ($slide->GetAll() as $valeu):  ?>
        <div> <img src="img/slider/<?php echo $valeu->path ?>" alt="<?php echo $valeu->alt_text; ?>"> </div>
        <?php endforeach; ?>
  
    </div>
</div>




<script>
    $(document).ready(function(){
  $('.owl-carousel').owlCarousel({
    items:1,
    margin:10,
    autoHeight:true,
   // nav:true,
    smartSpeed:950
    
});


});

</script>