<?php 
	// echo rowMachine(180, 4, '2%');
?>

<ul class="logos-2 clearfix">


<?php 
$rows = get_field('logos_2', 'option');
if($rows) {
	foreach($rows as $row) {
		$attachment_id = $row['logo']['id'];
		$image = wp_get_attachment_image_src( $attachment_id, 'medium' ); ?>
		
		<li><a href="<?php echo $row['link_url']; ?>"><img class="img-responsive" src="<?php echo $image[0];  ?>" alt="<?php echo $row['image']['alt']; ?>"></a></li>

	<?php
	}
}
?>
</ul>