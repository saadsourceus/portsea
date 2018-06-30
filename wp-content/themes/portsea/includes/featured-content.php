<!-- <table>
<tr style="margin-left: 30px;">
<td class="news-thumb"><img class="alignnone size-full wp-image-673" src="http://localhost/portsea/wp-content/uploads/2018/05/Layer-3-1.png" alt="" width="300" height="300" />
<h4 class="heading1">SPECIAL EVENTS</h4>
<b >Register today</b>
<br>Lorem ipsum dolor sit amet, consectetur adipisi</br>cing elit,
<br>
<a href="#"><button class="custom1" style="margin-top:10px;">view more</button></a>
</td>
</tr>
</table>
 -->
<div class="container">
    <div class="row">
        <?php 
            $posts = get_field('featured_posts','option');

            if( $posts ):
        ?>
        <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>
        <?php $post_id = $post->ID; ?>

        <div class="col-md-3" style="min-height: 425px; max-height:425px; margine-top:20px;">
            <div class="card news-thumb" style="width: auto;">
                <?php echo get_the_post_thumbnail ($post_id, 'medium'); ?>
                <div class="card-body">
                    <a href="<?php the_permalink(); ?>">
                        <h5 class="card-title heading1">
                            <?php the_title(); ?>
                        </h5>
                    </a>
                    <b><?php the_field('sub_heading'); ?></b>
                    <p class="card-text"><?php the_field('description_text'); ?></p>
                    <a href="<?php the_permalink(); ?>">
                        <button class="custom1 btn btn-danger" type="button">VIEW MORE</button>

                    </a>
                </div>
            </div>
        </div>

            <?php endforeach; ?>
            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
            <?php endif; ?>

    </div>
</div>