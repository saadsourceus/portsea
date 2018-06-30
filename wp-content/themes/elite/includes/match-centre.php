<?php
global $landing_page_object;
	if (isset($landing_page_object->ID)){
		$field_id = $landing_page_object->ID;
	} else {
		$field_id = $post->ID;
	}
?>

<script src="http://www.spulsecdn.net/js/ext_script_ddown.js" type="text/javascript"></script>
<div class="widget_match_center">
  <section class="widget_match_center_heading">
    <h2 class="widget_match_center_header">
    </h2>
    <select name="sblock4_dropdown_name" class="SP_ext_scripts" id="sblock4_dropdown">                 
      		<option value="">Select Other Competition</option>                 
			<?php 								 
			$matches = get_field('match_centre', $field_id);
			if($matches) { ?>
												
			<?php foreach($matches as $matche) { ?>
			<option value="http://www.sportingpulse.com/ext/external_schedule.cgi?c=<?php echo $matche['comp_id'] ; ?>&round=<?php echo $matche['round_number'] ; ?>&pool=<?php echo $matche['time_of_season'] ; ?>&cols=&days=3&json=1"><?php echo $matche['comp_name'] ; ?></option>
			<?php } ?>
											 
						
			<?php } ?>
    </select> 
  </section>	
  <section class="widget_match_center_content">    
    <section id="sblock4_wrapper" name="sblock4_dropdown_name">
    </section>
  </section>  


</div>


<script>
	function matchpager(){
	  			jQuery(".widget_match_center #sblock4_wrapper .fixturerow.spmatch").wrapAll("<div id='mc-game-wrap'><div id='mc-game-content'></div></div>");

	  }

	  jQuery(document).ready(function($) {
		  $('#sblock4_wrapper').on('click', '#spnext', function() {
		      $( "#mc-game-content" ).animate({
		          'marginLeft': '-=265px'
		        }, 200, function() {
		        		
		        });
		  });
		  $('.widget_match_center').on('hover', '.sp-match-link a', function() {
		  	console.log($(this).attr("href"));

		  });
		  $('#sblock4_wrapper').on('click', '#spprev', function() {
		  	if($( "#mc-game-content" ).css('marginLeft') < '0px'){

		  	
		  	    $( "#mc-game-content" ).animate({
		  	        'marginLeft': '+=265px'
		  	    }, 200, function() {

		        });
		  	}
		  })
	  })
</script>