<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package corl
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

 <!-- sidebar start -->
 <div class="col-12 col-md-6 col-lg-6">
                        <div class="blog_wrapper">
                            <div class="post_wrapper_right">
                                 <h4>Featured Post</h4>
                                <ul>
									<?php

											$args = array(
												'posts_per_page' => 5,
												'meta_key' => '_featured-post',
												'meta_value' => 1
											);

											$featured = new WP_Query($args);

											if ($featured->have_posts()): while($featured->have_posts()): $featured->the_post();
												
											
									
									
									?>

                                    <li>
                                        <div class="blog_banner">
										    <?php the_post_thumbnail('thumbnail'); ?>
                                        </div>
                                        <div class="blog_title_time">
                                            <div class="tag_time">
                                                <span class="tag development"><?php $categories_list = get_the_category_list( esc_html__( ', ', 'corl' ) );
			if ( $categories_list ) {
				printf( esc_html__( '%1$s', 'corl' ), $categories_list ); 
			} ?></span>
                                                <span class="time"><?php echo esc_html( get_the_date() ); ?></span>
                                            </div>
                                            <h5><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h5>
                                        </div>
                                    </li>

									<?php

										endwhile; else:

										endif;
									
									
									?>
                                   
                                </ul>
                            </div>

                            <div class="post_wrapper_right random_post">
                                 <h4>Random Post</h4>
                                <ul>
								<?php

$args = array(
	'posts_per_page' => 5,
	'orderby' => 'rand',
);

$featured = new WP_Query($args);

if ($featured->have_posts()): while($featured->have_posts()): $featured->the_post();
	



?>

<li>
<div class="blog_banner">
<?php the_post_thumbnail('thumbnail'); ?>
</div>
<div class="blog_title_time">
<div class="tag_time">
	<span class="tag development"><?php $categories_list = get_the_category_list( esc_html__( ', ', 'corl' ) );
if ( $categories_list ) {
printf( esc_html__( '%1$s', 'corl' ), $categories_list ); 
} ?></span>
	<span class="time"><?php echo esc_html( get_the_date() ); ?></span>
</div>
<h5><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h5>
</div>
</li>

<?php

endwhile; else:

endif;


?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- sidebar end -->
