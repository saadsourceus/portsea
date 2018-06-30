
					<?php 
			$golds = get_field('landing_page_g_competition', 'option');
			print_r($golds);
			if($golds){
				
				$golden_counter = 100;
			foreach($golds as $gold) { 
				$golden_counter++;
				?>
						  <div class="col-md-3">
			
                       <div  class="spcompname"><?php echo $gold['landing_page_golden_header_text'];?></div>

  
<?php
  
 // $comp = the_field('g_competition_id', 'option');
        
echo do_shortcode ("[external_content selector='.statleader-container']http://www.foxsportspulse.com/comp_info.cgi?c=".$gold['landing_page_golden_competition_id']."&pool=1&round=0&a=STATS[/external_content]");?>


        </div>
	<?php } } ?>