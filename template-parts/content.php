<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package corl
 */

?>




        <?php 

if($args['i'] == 0){
  

?>

<div class="col-12 col-md-12 col-lg-12">
                                    <div id="post-<?php the_ID(); ?>" <?php post_class('featured_posts first'); ?>>
                                        <div class="blog_post_signle">
                                            <div class="blog_banner">
                                               <?php the_post_thumbnail('full'); ?>
                                            </div>
                                            <div class="blog_tag_time">
                                                <div class="tag_time">
                                                    <span class="tag fintech"><?php $categories_list = get_the_category_list( esc_html__( ', ', 'corl' ) );
			if ( $categories_list ) {
				printf( esc_html__( '%1$s', 'corl' ), $categories_list ); 
			} ?></span>
                                                    <!-- <span class="time">5 min</span> -->
                                                </div>
                                                <span><?php echo esc_html( get_the_date() ); ?></span>
                                            </div>
                                            <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                                            <p><?php echo get_excerpt_first(); ?></p>
                                        </div>
                                    </div>
                                </div>



<?php
}else{
    



        
        ?>


                                <div class="col-12 col-md-6 col-lg-6">
                                    <div id="post-<?php the_ID(); ?>" <?php post_class('featured_posts first'); ?>>
                                        <div class="blog_post_signle">
                                            <div class="blog_banner">
                                               <?php the_post_thumbnail('full'); ?>
                                            </div>
                                            <div class="blog_tag_time">
                                                <div class="tag_time">
                                                    <span class="tag fintech"><?php $categories_list = get_the_category_list( esc_html__( ', ', 'corl' ) );
			if ( $categories_list ) {
				printf( esc_html__( '%1$s', 'corl' ), $categories_list ); 
			} ?></span>
                                                    <span class="time"><?php echo esc_html( get_the_date() ); ?></span>
                                                </div>
                                            </div>
                                            <h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
                                            <p><?php echo get_excerpt(); ?></p>
                                        </div>
                                    </div>
                                </div>


                               

<?php } ?>

                                



                               

                                





