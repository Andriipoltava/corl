<?php
/**
 * The template for displaying all single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package corl
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

		?>



<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
       <!-- ...::: Start blog post Section :::... -->
	   <section class="blog_post">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="post_back_btn">
                            <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" ><i class="fas fa-chevron-left"></i> Back</a>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="blog_article">
                            <div class="blog_post_head">
                                <?php if ( is_singular() ) :
									the_title( '<h1 class="entry-title">', '</h1>' );
								else :
									the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
								endif; ?>
                                <div class="blog_tag_time">
                                    <div class="tag_time">
                                        <span class="tag fintech"><?php $categories_list = get_the_category_list( esc_html__( ', ', 'corl' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( '%1$s', 'corl' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			} ?></span>
                                        <span class="time">5 min</span>
                                        <span class="time"><?php echo esc_html( get_the_date() ); ?></span>
                                    </div>
									<?php 
									 $postid = get_the_ID();
									 $single_page_url = get_permalink($postid);
									?>
                                    <ul class="social_share d-flex justify-content-center align-items-center">
                                        <li class="a2a_kit a2a_kit_size_32 a2a_default_style" data-a2a-url="<?php echo $single_page_url;?>"><a class="a2a_button_facebook" href="<?php echo $single_page_url;?>" title=""><i class="fab fa-facebook"></i></a></li>
										<li class="a2a_kit a2a_kit_size_32 a2a_default_style" data-a2a-url="<?php echo $single_page_url;?>"><a class="a2a_button_twitter" href="<?php echo $single_page_url;?>" title=""><i class="fab fa-twitter"></i></i></a></li>
										<li class="a2a_kit a2a_kit_size_32 a2a_default_style" data-a2a-url="<?php echo $single_page_url;?>"><a class="a2a_button_instagram" href="<?php echo $single_page_url;?>" title=""><i class="fab fa-instagram"></i></i></a></li>
										<li class="a2a_kit a2a_kit_size_32 a2a_default_style" data-a2a-url="<?php echo $single_page_url;?>"><a class="a2a_button_linkedin" href="<?php echo $single_page_url;?>" title=""><i class="fab fa-linkedin"></i></i></a></li>
                                        
                                    </ul>
                                </div>
                                 <div class="post_banner">
                                    <div class="banner"><?php corl_post_thumbnail(); ?></div>
                                </div>
                            </div>
                            <div class="entry-content blog_post_content">      
							<?php
									the_content(
										sprintf(
											wp_kses(
												/* translators: %s: Name of current post. Only visible to screen readers */
												__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'corl' ),
												array(
													'span' => array(
														'class' => array(),
													),
												)
											),
											wp_kses_post( get_the_title() )
										)
									);

									wp_link_pages(
										array(
											'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'corl' ),
											'after'  => '</div>',
										)
									);
							?>
                                
                            </div>
                            <div class="author_info" style="margin-top:40px;">
                                <div class="profile_wrapper d-flex align-items-center">
                                    <div class="author_pic">
                                        <?php echo get_avatar( get_the_author_meta('email'), '90' );?>
                                        
                                    </div>
                                    <div class="name_title">
                                        <h3><?php corl_posted_by(); ?></h3>
                                        <span><?php $authorDesc = the_author_meta('description'); echo $authorDesc; ?></span>
                                    </div>
                                </div>
                                <div class="tag_social">
                                    <!-- <ul class="tags">
                                        <li>Funding News</li>
                                        <li>News</li>
                                        <li>Funding</li>
                                        <li>News</li>
                                    </ul> -->
                                    <ul class="social_share d-flex justify-content-center align-items-center">
                                    <li class="a2a_kit a2a_kit_size_32 a2a_default_style" data-a2a-url="<?php echo $single_page_url;?>"><a class="a2a_button_facebook" href="<?php echo $single_page_url;?>" title=""><i class="fab fa-facebook"></i></a></li>
										<li class="a2a_kit a2a_kit_size_32 a2a_default_style" data-a2a-url="<?php echo $single_page_url;?>"><a class="a2a_button_twitter" href="<?php echo $single_page_url;?>" title=""><i class="fab fa-twitter"></i></i></a></li>
										<li class="a2a_kit a2a_kit_size_32 a2a_default_style" data-a2a-url="<?php echo $single_page_url;?>"><a class="a2a_button_instagram" href="<?php echo $single_page_url;?>" title=""><i class="fab fa-instagram"></i></i></a></li>
										<li class="a2a_kit a2a_kit_size_32 a2a_default_style" data-a2a-url="<?php echo $single_page_url;?>"><a class="a2a_button_linkedin" href="<?php echo $single_page_url;?>" title=""><i class="fab fa-linkedin"></i></i></a></li>
                                    </ul>
                                </div>
                            </div> 
                        </div>

                       
                    </div>
                </div>
            </div>
            <div class="fish_shape_wrapper">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fist_left_1.png" alt="" class="fist_right_to_left fist_right_to_left_1">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fist_left_2.png" alt="" class="fist_right_to_left fist_right_to_left_2">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fist_left_3.png" alt="" class="fist_right_to_left fist_right_to_left_3">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fist_left_4.png" alt="" class="fist_right_to_left fist_right_to_left_4">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fist_left_5.png" alt="" class="fist_right_to_left fist_right_to_left_5">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fist_left_6.png" alt="" class="fist_right_to_left fist_right_to_left_6">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fist_left_7.png" alt="" class="fist_right_to_left fist_right_to_left_7">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fist_left_8.png" alt="" class="fist_right_to_left fist_right_to_left_8">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fist_left_9.png" alt="" class="fist_right_to_left fist_right_to_left_9">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fist_left_10.png" alt="" class="fist_right_to_left fist_right_to_left_10">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/fist_left_11.png" alt="" class="fist_right_to_left fist_right_to_left_11">
            </div> 
            <div class="vecteria_wrapper">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/vecteria_1.png" alt="" class="vecteria_shape vecteria_1">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/vecteria_2.png" alt="" class="vecteria_shape vecteria_2">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/shape/vecteria_3.png" alt="" class="vecteria_shape vecteria_3">
            </div>  
        </section>
        <!-- ...::: End blog post Section :::... -->
</article><!-- #post-<?php the_ID(); ?> -->


<div class="post-navigation container">
      <div class="navigation">
           <?php the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'corl' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'corl' ) . '</span> <span class="nav-title">%title</span>',
				)
			); ?>

      </div>
</div>



<?php
			

			// If comments are open or we have at least one comment, load up the comment template.
			/* if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif; */

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->
<script async src="https://static.addtoany.com/menu/page.js"></script> 
<?php
get_footer();
