<div class="map-image" style="background-image: url('<?php echo get_field('map_image','option');?>');">

</div>

<div class="container">
<div class="col-md-12 contact">


<?php
$banners = get_field('contact_details','option');

if($banners){
  $count = 0;
  foreach($banners as $banner)
  { $count++;
    //echo "<div class='col-md-4'><a href=".$banner['link']."> <img src='".$banner['image']."' / > <span class='banner-text'>".$banner['text']."</span> </a> </div>"; 
    ?>
      <div class="col-md-4 box<?php echo $count;?>">
        <img src="<?php echo $banner['background_image']; ?>">
        <span class="main-text"> <?php echo $banner['address_1']; ?></span>
        <span class="sub-text"><?php echo $banner['address_2']; ?></span>
      </div>
    <?php

  }

}
?>

</div>

<div class="contact-email">
<i class="fa fa-envelope" aria-hidden="true"></i> :<span> <?php echo get_field('contact_email','option');?></span>
</div>


</div>


