<?php 
$club_logos = get_field('club_logos');
$cl_count = count($club_logos);
if($cl_count == 1){$cl_size = 50; $cl_margin = 0;}
if($cl_count == 2){$cl_size = 1090 / $cl_count - 480; $cl_margin = 480 + (480 / ($cl_count -1));}
if($cl_count == 3){$cl_size = 1090 / $cl_count - 300; $cl_margin = 300 + (300 / ($cl_count -1));}
if($cl_count == 4){$cl_size = 1090 / $cl_count - 200; $cl_margin = 200 + (200 / ($cl_count -1));}
if($cl_count == 5){$cl_size = 1090 / $cl_count - 150; $cl_margin = 150 + (150 / ($cl_count -1));}
if($cl_count >= 6 && $cl_count <= 7){$cl_size = 1090 / $cl_count - 100; $cl_margin = 100 + (100 / ($cl_count -1));}
if($cl_count >= 8 && $cl_count <= 9){$cl_size = 1090 / $cl_count - 60; $cl_margin = 60 + (60 / ($cl_count -1));}
if($cl_count >= 10 && $cl_count <= 11){$cl_size = 1090 / $cl_count - 40; $cl_margin = 40 + (40 / ($cl_count -1));}
if($cl_count == 12){$cl_size = 1090 / $cl_count - 25; $cl_margin = 25 + (25 / $cl_count);}
if($cl_count == 13){$cl_size = 1090 / $cl_count - 15; $cl_margin = 15 + (15 / $cl_count);}
if($cl_count == 14){$cl_size = 1090 / $cl_count - 10; $cl_margin = 10 + (10 / $cl_count);}
if($cl_count == 15){$cl_size = 1090 / $cl_count - 8; $cl_margin = 8 + (8 / $cl_count);}
if($cl_count >= 16){$cl_size = 1090 / $cl_count - 5; $cl_margin = 5 + (5 / $cl_count);}


$cl_size_md = .86 * $cl_size;
$cl_margin_md = .86 * $cl_margin;

$cl_size_sm = .66 * $cl_size;
$cl_margin_sm = .66 * $cl_margin;

?>

<style>
@media (min-width: 768px) {
	ul.club-logos li {
		width: <?php echo $cl_size_sm; ?>px;
		height: <?php echo $cl_size_sm; ?>px;
		margin-right: <?php echo $cl_margin_sm; ?>px;
	}
	ul.club-logos li img {
		max-width: <?php echo $cl_size_sm; ?>px;
		max-height:<?php echo $cl_size_sm; ?>px;
	}
}
@media (min-width: 992px) {
	ul.club-logos li {
		width: <?php echo $cl_size_md; ?>px;
		height: <?php echo $cl_size_md; ?>px;
		margin-right: <?php echo $cl_margin_md; ?>px;
	}
	ul.club-logos li img {
		max-width: <?php echo $cl_size_md; ?>px;
		max-height:<?php echo $cl_size_md; ?>px;
	}
}
@media (min-width: 1200px)  {
	ul.club-logos li {
		width: <?php echo $cl_size; ?>px;
		height: <?php echo $cl_size; ?>px;
		margin-right: <?php echo $cl_margin; ?>px;
	}
	ul.club-logos li img {
		max-width: <?php echo $cl_size; ?>px;
		max-height:<?php echo $cl_size; ?>px;
	}
}
</style>

<script>
	jQuery(document).ready(function($){
		$('body').addClass('has-club-logos');
	});
</script>

<?php
if($club_logos) { ?>
<ul class="club-logos clearfix">
<?php foreach($club_logos as $club_logo) {
	$attachment_id = $club_logo['logo_image']['id'];
	$image = wp_get_attachment_image_src( $attachment_id, 'medium' ); ?>
	
	<li><a href="<?php echo $club_logo['club_link']; ?>" target="_blank"><img src="<?php echo $image[0];  ?>" alt="<?php echo $club_logo['club_name']; ?>" ></a></li>
<?php }	?>
</ul>
<?php }	?>