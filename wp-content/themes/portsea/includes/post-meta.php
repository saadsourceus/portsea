<div class="row post-meta">
	<div class="col-md-8">
		<p>Author Name: <?php $username = get_userdata( $post->post_author ); ?>    
<a href="<?php echo get_author_posts_url( $post->post_author ); ?>"><?php echo $username->user_nicename; ?></a> | Posted <?php the_time() ?> on <?php the_time('l jS F, Y') ?></p>
		<span class="tags"><?php the_tags( 'Tags: ', '', '' ); ?></span>
	</div>
	<div class="col-md-4">
		
	</div>
</div>