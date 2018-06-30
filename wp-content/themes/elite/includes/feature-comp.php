<?php 
$rows = get_field('match_centre_type');
if($rows == '0') { ?>
<script src="http://www.spulsecdn.net/js/ext_script_ddown.js" type="text/javascript"></script>
<?php } 
$fixture = get_field('landing_page_fixtures_and_results');
			if($fixture){ ?>
 
<style>
 .results_container .spteam1  , .results_container .spteam2{
				background-image: url('../wp-content/themes/NZFF/core/images/no-team-logo_42x42.png');
				width: 36px;
			    height: 36px;
			    margin-top: -1px;
			    margin-right: 15px;
			    border: none;
			    background-size: 100%
			}
         .active-match .spteam1 ,
         .active-match .spteam2
        {
 
                      width: 35%;
                     height:auto;
				     margin-top: -1px;
				     margin-right: 15px;
				     border: none;
				     background-size: 100px 100px;
				     background-repeat: no-repeat;
				     text-align: center;
				     background-position: center;
				     background-image: url('../wp-content/themes/NZFF/core/images/no-team-logo_120x120.png');

        }

<?php 
	$tids = get_field('landing_page_fixtures_logo');

		if ($tids){ 
		foreach ($tids as $tid) { ?>

			.results_container .<?php echo $tid['landing_page_team_id']; ?> {
				background-image: url('<?php echo $tid['landing_page_fixtures_team_logo']; ?>');
				width: 36px;
			    height: 36px;
			    margin-top: -1px;
			    margin-right: 15px;
			    border: none;
			    background-size: 100%
			}

		     .active-match   .<?php echo $tid['landing_page_team_id']; ?>  {
   
                     width: 35%;
                     height:auto;
				     margin-top: -1px;
				     margin-right: 15px;
				     border: none;
				     background-size: 110px 110px;
				     background-repeat: no-repeat;
				     text-align: center;
				     background-position: center;
				     background-image: url('<?php echo $tid['landing_page_fixtures_team_logo']; ?>');
				     
				 	}

	<?php	}
	}
 ?>
 #fixtures_lg_wrapper {
<?php $fixture_image = get_field('feature_image');
    $fix_image =  $fixture_image[url];
?>
        background:#000 url("<?php echo $fix_image;?>");
        position: relative !important;
    background-size: cover !important;
    margin-left: -15px;
    margin-right: -15px;
   
 }
</style>

<div id="fixtures_lg_wrapper">
<div id="fixtures_lg" class="clearfix">
<div id="fixtures_lg-wrapper" class="clearfix">
<?php 



$golden = get_field('landing_page_golden_boot_showhide'); 
    if( $golden == 'show' ) {
				
				$fixtures_counter = 100;
			foreach($fixture as $row) { 
				$fixtures_counter++;
				?>


                   <div class="container">
	         <div class="row">
				<div class="fixtures_box fixtures_box<?php echo $fixtures_counter; ?> ">
					<h1 class="fixtures_heading"><?php if($row['landing_page_logo']){ ?><img src="<?php echo $row['landing_page_logo']; ?>" alt=""><?php } ?><span class="npl_heading"><?php echo $row['landing_page_competition_name']; ?></span></h1>

					<div class="results_ladder_container">
						<div class="results_container">
                          
		                 <div class="col-md-5">
							 <?php //echo $row['competition_id']; ?>
							 
							    <select style="display:none" name="sblock<?php echo $fixtures_counter; ?>_dropdown_name" class="SP_ext_scripts" id="sblock<?php echo $fixtures_counter; ?>_dropdown">                 
							      		<option value=""></option>                 
										<option value="http://www.sportingpulse.com/ext/external_schedule.cgi?c=<?php echo $row['landing_page_competition_id']; ?>&pool=1&round=0&cols=2&fix=1&json=1"><?php echo $row['landing_page_competition_name']; ?></option>
							    </select> 
								<div class="table_header clearfix">
									<h2>Round Results</h2>
									<a href="http://www.foxsportspulse.com/comp_info.cgi?c=<?php echo $row['landing_page_competition_id']; ?>&pool=1&round=0&a=FIXTURE" target="_blank">View <span class="hide-xs">full fixtures list</span></a>
								</div>
							
							    <section id="sblock<?php echo $fixtures_counter; ?>_wrapper" name="sblock<?php echo $fixtures_counter; ?>_dropdown_name">
							    </section>
							
							</div>
						</div>
						<div class="ladder_container">
                            <div class="col-md-4">

						  <section class="widget_match_center_heading">
					
						    <select style="display:none" name="sblock<?php echo $fixtures_counter; ?>0_dropdown_name" class="SP_ext_scripts" id="sblock<?php echo $fixtures_counter; ?>0_dropdown">                 
						      		<option value=""></option>                 
									<option value="http://www.sportingpulse.com/ext/external_ladder.cgi?c=<?php echo $row['landing_page_competition_id']; ?>&pool=-1&round=0&pool=-1&cols=1,2,3,4,7,8,9&fix=0&json=1"><?php echo $row['landing_page_competition_name']; ?></option>
						    </select> 
						  </section>	
							
						    <section id="sblock<?php echo $fixtures_counter; ?>0_wrapper" name="sblock<?php echo $fixtures_counter; ?>0_dropdown_name">
						    </section>

							</div>
						</div><!-- End ladder_container -->
					
	<?php }  ?>

                    	<?php 
			$golds = get_field('landing_page_g_competition');
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

					</div>

				</div>
					
			

           <p class="more"><a target="_blank" href="http://www.foxsportspulse.com/comp_info.cgi?c=<?php echo $row['landing_page_competition_id']; ?>&pool=1&round=0&a=FIXTURE"> More </a></p><br/>
           <br/>
     	<div class="indicator_container"></div>
	</div>
</div>
<?php } else { ?>


<?php 
			
				$fixtures_counter = 100;
			foreach($fixture as $row) { 
				$fixtures_counter++;
				?>


                   <div class="container">
	         <div class="row">
				<div class="fixtures_box fixtures_box<?php echo $fixtures_counter; ?> ">
					<h1 class="fixtures_heading"><?php if($row['logo']){ ?><img src="<?php echo $row['landing_page_logo']; ?>" alt=""><?php } ?><span class="npl_heading"><?php echo $row['landing_page_competition_name']; ?></span></h1>

					<div class="results_ladder_container">
						<div class="results_container">
                          
		                 <div class="col-md-6">
							 <?php //echo $row['competition_id']; ?>
							 
							    <select style="display:none" name="sblock<?php echo $fixtures_counter; ?>_dropdown_name" class="SP_ext_scripts" id="sblock<?php echo $fixtures_counter; ?>_dropdown">                 
							      		<option value=""></option>                 
										<option value="http://www.sportingpulse.com/ext/external_schedule.cgi?c=<?php echo $row['landing_page_competition_id']; ?>&pool=1&round=0&cols=2&fix=1&json=1"><?php echo $row['landing_page_competition_name']; ?></option>
							    </select> 
								<div class="table_header clearfix">
									<h2>Round Results</h2>
									<a href="http://www.foxsportspulse.com/comp_info.cgi?c=<?php echo $row['landing_page_competition_id']; ?>&pool=1&round=0&a=FIXTURE" target="_blank">View <span class="hide-xs">full fixtures list</span></a>
								</div>
							
							    <section id="sblock<?php echo $fixtures_counter; ?>_wrapper" name="sblock<?php echo $fixtures_counter; ?>_dropdown_name">
							    </section>
							
							</div>
						</div>
						<div class="ladder_container">
                            <div class="col-md-6">

						  <section class="widget_match_center_heading">
					
						    <select style="display:none" name="sblock<?php echo $fixtures_counter; ?>0_dropdown_name" class="SP_ext_scripts" id="sblock<?php echo $fixtures_counter; ?>0_dropdown">                 
						      		<option value=""></option>                 
									<option value="http://www.sportingpulse.com/ext/external_ladder.cgi?c=<?php echo $row['landing_page_competition_id']; ?>&pool=-1&round=0&pool=-1&cols=1,2,3,4,7,8&fix=0&json=1"><?php echo $row['landing_page_competition_name']; ?></option>
						    </select> 
						  </section>	
							
						    <section id="sblock<?php echo $fixtures_counter; ?>0_wrapper" name="sblock<?php echo $fixtures_counter; ?>0_dropdown_name">
						    </section>

							</div>
						</div><!-- End ladder_container -->
					<?php }  ?>

					</div>

				</div>

           <p class="more"><a target="_blank" href="http://www.foxsportspulse.com/comp_info.cgi?c=<?php echo $row['landing_page_competition_id']; ?>&pool=1&round=0&a=FIXTURE"> More </a></p><br/>
           <br/>
     	<div class="indicator_container"></div>
	</div>
</div>


<?php } ?>


</div>
</div>
</div>

<?php }  ?>