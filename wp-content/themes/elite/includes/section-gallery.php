<?php
if( $images ): ?>
<?php if(get_sub_field('section_title')) { ?><h2 class="heading"><?php the_sub_field('section_title'); ?></h2><?php } ?>
    <ul class="landing-gallery">
        <?php foreach( $images as $image ): ?>
            <li>
            	<a rel="lightbox" href="<?php echo $image['sizes']['large']; ?>" title="<?php echo $image['caption']; ?>">
            		 <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
            	</a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>