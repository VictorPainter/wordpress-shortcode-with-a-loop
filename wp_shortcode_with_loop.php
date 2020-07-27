<?php 

function myshort() {
    ob_start(); ?>
<?php
    $args = array( 'post_type' => 'cases', 'posts_per_page' => 6 );
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post();
?>

<div class="col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
    <a class="content" href="<?php echo get_permalink( $post->ID ); ?>">
        <div class="image">
            <?php the_post_thumbnail(); ?>
        </div>
        <div class="text">
            <span class="date"><?php echo rwmb_meta( 'rw_stitle' ); ?></span>
            <h3><?php the_title(); ?></h3>
            <p><?php echo rwmb_meta( 'rw_sdesc' ); ?></p>
        </div>
    </a>
</div>

<?php endwhile;

    return ob_get_clean();
}

add_shortcode('doitman', 'myshort');

?>