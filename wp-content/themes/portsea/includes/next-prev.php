<div class="navigation row">

	<?php
	    $prev = get_adjacent_post(true, array(58,59), true);
	    $next = get_adjacent_post(true, array(58,59), false);

	    //use an if to check if anything was returned and if it has, display a link
	    if($prev){
	        $url = get_permalink($prev->ID);  ?>
				<div class="previous col-sm-6">
					<i class="fa fa-chevron-circle-left" aria-hidden="true"></i><a class="next-prev" href="<?php echo $url; ?>" title="<?php $prev->post_title; ?>"><?php echo $prev->post_title; ?></a>
				</div>
	        <?php          
	       
	    }

	    if($next) {
	        $url = get_permalink($next->ID);   ?>
	        <div class="next col-sm-6 md-text-right">
	        	<a class="next-prev" href="<?php echo $url; ?>" title="<?php $prev->post_title; ?>"><?php echo $next->post_title; ?></a>
	        	<i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
	        </div>
			<?php 
	        
	    } 
	?>

</div>