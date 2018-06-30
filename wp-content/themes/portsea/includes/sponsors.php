<div class="container sponsor">
<h3 class="center"><?php echo get_field('sponsors_title','option');?></h3>

<div class="spon">
<div class="spons-title"><?php echo get_field('major_title','option');?></div>
<?php $plat_spon = get_field('major_sponsors','option');
      
        if($plat_spon)
        {
          echo '<ul class="sponsors mob-slider clearfix">';

          foreach($plat_spon as $logos)
          {
            echo '<li><a href="'.$logos['link'].'"><img src="'.$logos['image'].'" /> </a>';
          }

          echo '</ul>';
        } 
        
        ?>
</div>
        <!-- Diamond -->
        <div class="spon">
        <div class="spons-title"><?php echo get_field('diamond_title','option');?></div>
        <?php $plat_spon = get_field('diamond_sponsors','option');
      
        if($plat_spon)
        {
          echo '<ul class="sponsors mob-slider clearfix">';

          foreach($plat_spon as $logos)
          {
            echo '<li><a href="'.$logos['link'].'"><img src="'.$logos['image'].'" /> </a>';
          }

          echo '</ul>';
        } 
        
        ?>
      </div>
      
       <!-- Platinum -->
        <div class="spon">
        <div class="spons-title"><?php echo get_field('platinum_sponsors_title','option');?></div>
        <?php $plat_spon = get_field('platinum_sponsors','option');
      
        if($plat_spon)
        {
          echo '<ul class="sponsors mob-slider clearfix">';

          foreach($plat_spon as $logos)
          {
            echo '<li><a href="'.$logos['link'].'"><img src="'.$logos['image'].'" /> </a>';
          }

          echo '</ul>';
        } 
        
        ?>
      </div>

</div>

    