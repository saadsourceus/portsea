    <div id="sidebar" class="col-sm-3 col-md-3">
   <?php if ( is_active_sidebar( 'inner-sidebar' ) ) : ?>
        <?php dynamic_sidebar( 'inner-sidebar' ); ?>
    <?php endif; ?>

    <?php $external_links = get_fields("external_links_inner","options"); ?>

<?php if( have_rows('external_links_inner', 'options') ):?>
    <ul class="buttons-box-inner">
    <?php while ( have_rows('external_links_inner', 'options') ) : the_row(); ?>
        <li>
            <a href="<?php the_sub_field('url_inner', 'options'); ?>">
                <span><?php the_sub_field('text_inner', 'options'); ?></span>
                <i class="fa fa-chevron-circle-right"></i>
            </a>
        </li>
    <?php endwhile; ?>
    </ul>   
<?php endif; ?>
</div>

