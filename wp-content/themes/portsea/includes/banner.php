


<div class="col-md-12 col-sm-12 ad-banners">
	

	<?php
	$banners = get_field('promo','option');

	if($banners){
		foreach($banners as $banner)
		{
			echo "<div class='col-md-6 col-sm-6 banner-images'>
			<a href=".$banner['link']."> 
				<div class='promo-image'><img src='".$banner['image']."' / >  </div>
				<div class='promo-logo'> <img src='".$banner['logo_on_image']."' / ></div>
				<div class='promo-title'> ".$banner['title']."</div>
			</a> 
			</div>";
		}

	}
?>

<!-- Bottom banners -->

	<?php
	$banners = get_field('bottom_promo','option');

	if($banners){
		foreach($banners as $banner)
		{
			echo "<div class='col-md-3 col-sm-3 banner-images'>
            
            
        
			<a href=".$banner['link']."> 
				<img src='".$banner['image']."' / > 
				
			</a> 
			</div>";
            
            
		}

	}
?>

<!--
<div class="col-md-3" style="padding-left:0px;">
<h3>SPECIAL EVENTS</h3>
<h5 class="custom">Register Today</h5>
<P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur laboriosam officiis nisi magnam rem fugiat itaque, reiciendis  </P>
<a href="http://localhost/portsea/special-events/" type="button"><button class="btn" >VIEW ALL</button></a>

</div>
<div class="col-md-3 "style="padding-left:0px;" >
<h3>NIPPERS</h3>
<h5 class="custom">7 - 14yo</h5>
<P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur laboriosam officiis nisi magnam rem fugiat itaque, reiciendis  </P>
<a href="http://localhost/portsea/nippers/" type="button"><button class="btn" >VIEW ALL</button></a>
</div>

<div class="col-md-3 "style="padding-left:0px;" >
<h3>PATROLS</h3>
<h5 class="custom">2016-17 Patrol Roster</h5>
<P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur laboriosam officiis nisi magnam rem fugiat itaque, reiciendis  </P>
<a href="http://localhost/portsea/patrols/" type="button"><button class="btn" >VIEW ALL</button></a>
</div>

<div class="col-md-3" style="padding-left:0px;" >
<h3>COMPETITION</h3>
<h5 class="custom">Join our Competition Teams</h5>
<P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur laboriosam officiis nisi magnam rem fugiat itaque, reiciendis  </P> 
    <a href="http://localhost/portsea/competition/" type="button"><button class="btn" >VIEW ALL</button></a>
</div>
-->




	
	</div>




</div>



      <style type="text/css">
        @media (max-width: 767px)  { 
          #banner-panel .panel-content {
            background: <?php echo get_field('mobile_background_color','option');?> !important;
          }
        }

      </style>

