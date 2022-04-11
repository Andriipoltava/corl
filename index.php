<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package corl
 */
$page_for_posts = get_option('page_for_posts');
get_header();
?>

	<main id="primary" class="site-main">

		<?php
		if ( have_posts() ) :

			?>

        <!-- ...::: Start Hero Display Section :::... -->
        <div class="inner_hero blog">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero/inner_hero.png" alt="" class="inner_bg">
            <div class="container">
                <div class="header_aera">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="hero-content">
							<h1 class="page-title"><?php single_post_title(); ?></h1>
                                <p>
                                    <?php echo get_post_meta($page_for_posts,'corl_blog-description',true)?:'Corl 12 is an artificially-intelligent platform that finances businesses in the digital economy and shares in their future revenue.'; ?>
                                </p>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="header_banner">
                                <div class="banner"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero/blog-hero.svg" alt="blog hero banner"> </div>
                            </div>
                        </div>
                    </div>
                    <div class="bird_shape">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/bird.png" alt="" class="bird bird_1">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/bird-4.png" alt="" class="bird bird_2">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/bird-3.png" alt="" class="bird bird_3">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/bird-2.png" alt="" class="bird bird_4">
                    </div>
                </div>
            </div>
            <div class="vecteria_wrapper">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/vecteria_1.png" alt="" class="vecteria_shape vecteria_1">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/vecteria_2.png" alt="" class="vecteria_shape vecteria_2">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/vecteria_3.png" alt="" class="vecteria_shape vecteria_3">
            </div> 
        </div>
        <!-- ...::: End Hero Display Section :::... -->	


				
			
	<section class="blog_area">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="blog_wrapper">
                             <h4>Recent Post</h4>
                            <div class="row">

<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'post_type'=>'post',
    'paged' => $paged,
);
$loop = new WP_Query( $args );

if ( $loop->have_posts() ) {
    $i=0;
			/* Start the Loop */
            while ( $loop->have_posts() ) : $loop->the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type(), ['i' => $i]);
                $i++;
			endwhile;
            $total_pages = $loop->max_num_pages;
            ?>
            <div class="col-12 col-md-12">
                <nav aria-label="navigation" class="pagination">
                <?php			

if ($total_pages > 1){

    $current_page = max(1, get_query_var('paged'));

    echo paginate_links(array(
        'base' => get_pagenum_link(1) . '%_%',
        'format' => '/page/%#%',
        'current' => $current_page,
        'total' => $total_pages,
        'prev_text'    => __('<'),
        'next_text'    => __('>'),
    ));
}    

?>
                </nav>
            </div>



<?php

        }
        wp_reset_postdata();
?>


                           </div>
                        </div>
                        
                    </div>


                   


                    <?php get_sidebar(); ?>







                    
                </div>
            </div>
            
        </section>
        <!-- ...::: End Blog Section :::... -->

<?php





			

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();
