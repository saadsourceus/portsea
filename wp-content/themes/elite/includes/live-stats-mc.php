<?php
global $landing_page_object;
	if (isset($landing_page_object->ID)){
		$field_id = $landing_page_object->ID;
	} else {
		$field_id = $post->ID;
	}
?>
<div id="mc_wrap" class="clearfix">
    <ul id="compname-tab" class="clearfix">
    	<li class="compname-tab-title">Choose Match Centre</li>
        <?php 								 
		$mc_rows = get_field('competitions_ls', $field_id);
		if($mc_rows) { ?>
											
		<?php 
			$counter = 0;
			foreach($mc_rows as $mc_row) { 
			$counter++;
		?>
		
		<li><div data-user="<?php echo $mc_row['user_id'] ; ?>" id="comp-<?php echo $mc_row['comp_id'] ; ?>"><a <?php if($counter == 1) {echo 'class="active"';} ?>  href="#"><?php echo $mc_row['comp_label'] ; ?></a></div></li>
		<?php } ?>
										 
					
		<?php } ?>
    </ul>
    <div id="mc-wrapper"></div>			
</div>
<ul class="match-centre-phone">
	<li>Match Centre</li>
    <?php 								 
	if($mc_rows) { ?>
										
	<?php 
		foreach($mc_rows as $mc_mobile_row) { 
	?>
	
	<li><a href="<?php echo $mc_mobile_row['comp_link'] ; ?>" target="_blank"><?php echo $mc_mobile_row['comp_label'] ; ?></a></li>
	<?php } ?>
									 
				
	<?php } ?>
</ul>
<script src="http://www.spulsecdn.net/js/elite/ls-min.js"></script>
<script>
    jQuery(document).ready(function($) {
        $("#mc_wrap").livestatsWidget({
            allGames: 1,
            daysForward: 21,
            daysBack: 3
        });
        $(window).load(function () {
        	$('#mc-wrapper').find('#spls_comp_list_scroller').addClass('new-width');
        	$(document).on('click', '#compname-tab div', function (event) {
        		event.preventDefault();
        		myVar = setTimeout(function(){$('#mc-wrapper').find('#spls_comp_list_scroller').addClass('new-width');},2000)
        		$(this).closest('ul').find('a').removeClass('active');
        		$(this).find('a').toggleClass('active');

        	});
        });
    });
</script>
<!-- /.match-centre-phone -->
<!-- <script>
	jQuery(document).ready(function($) {

			var divLeft = [0];
			var initialLeft = 0;

			$(window).load(function () {

				$('#mc_wrap').find('#spls_comp_list_scroller').addClass('new-width');
			    var n = $(".spls_lsmatch").length;
			    var wraplength = (n * 191);
			    $('#spls_comp_list_scroller ul').css("width", wraplength + "px");

			    var limit = ($("#spls_comp_list_scroller").width() * 2);

			    $(window).resize(function () {
			        limit = $(window).width() - ($("#spls_comp_list_scroller").width() * 2);
			    });

			    $(document).on('click', '.scroller-prev', function (event) {
			    	event.preventDefault();
			        if (divLeft[activeComp] < -175) {
			            divLeft[activeComp] += 190;
			            $("#spls_comp_list_scroller ul").animate({
			                "left": divLeft[activeComp]
			            }, "slow");
			        }
			    });

			    $(document).on('click', '.scroller-next', function (event) {
			    	event.preventDefault();
			        if (divLeft[activeComp] > ((-wraplength) + 800)) {
			            divLeft[activeComp] -= 190;
			            $("#spls_comp_list_scroller ul").animate({
			                "left": divLeft[activeComp]
			            }, "slow");
			        }
			    });
			});
			jQuery(function () {
			    var comp = 1910;
			    $(document).on('click', '#compname-tab li', function (event) {
			    	event.preventDefault();
			        comp = $(this).attr('id') || '';
			        comp = comp.replace(/comp-/, '');
			        loadmycomp(comp);
			        $(this).closest('ul').find('a').removeClass('active');
			        $(this).find('a').toggleClass('active');
			    });

			    loadmycomp(comp);

			    function loadmycomp(comp) {
			        jQuery.ajax({
			            dataType: "jsonp",
			            url: "http://widget.live.sportingpulseinternational.com/ext/current_games.cgi?ag=1&df=21&db=3&css=1&u=10&sr=0&cmp=3&compid=" + comp + "&alt=1",
			            jsonpCallback: 'games',
			            success: function (data) {
			                jQuery('#mc-wrapper').html(data.data || '');
			                n = $(".spls_lsmatch").length;
			                wraplength = (n * 191);
			                $('#spls_comp_list_scroller ul').css("width", wraplength + "px");
			                activeComp = comp;
			                if (typeof divLeft[activeComp] !== 'undefined') {
			                    $("#spls_comp_list_scroller ul").animate({
			                        "left": divLeft[activeComp]
			                    }, "slow");

			                } else {

			                    divLeft[activeComp] = initialLeft;

			                    var m_names = new Array("January", "February", "March",
			                        "April", "May", "June", "July", "August", "September",
			                        "October", "November", "December");

			                    var d = new Date();
			                    var curr_date = d.getDate();
			                    if (curr_date < 10) {
			                        curr_date = "0" + curr_date;
			                    }
			                    var curr_month = d.getMonth();
			                    var curr_year = d.getFullYear();
			                    var today_date = curr_date + " " + m_names[curr_month] + " " + curr_year;

			                    $("li:contains(" + today_date + ")").addClass("todayGame");
			                    if (typeof $(".todayGame:first").offset() !== 'undefined') {
			                        var currLeft = $(".todayGame:first").offset().left - 620 || 0;
			                        if(currLeft > 5) {
			                        $("#spls_comp_list_scroller ul").animate({
			                            "left": -(currLeft - 180)
			                        }, "slow", function () {
			                            divLeft[activeComp] = -(currLeft - 180);
			                        });
			                        }
			                    }
			                }
			                $('#mc_wrap').find('#spls_comp_list_scroller').addClass('new-width');
			            }
			        });
			    }
			});
	});


</script> -->