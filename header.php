<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package corl
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>> 
<?php wp_body_open(); ?>

    <main class="main-wrapper     <?php if(is_front_page()){ echo "body_shape";}else{echo "inner_page";} ?>">
    <div id="particles2-js" class="particles_2"></div>
        <!-- .....:::::: Start Header Section :::::.... -->
        <header class="header-section sticky-header">
            <div class="header-wrapper">
                <div class="container">
                    <div class="row d-flex flex-wrap align-items-center justify-content-center">
                        <div class="col-auto">
                            <!-- Start Header Logo -->
                            <?php
								the_custom_logo();
								if ( is_front_page() && is_home() ) :
									?>
									<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="header-logo" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
									<?php
								else :
									?>
									<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="header-logo" rel="home"><?php bloginfo( 'name' ); ?></a></p>
									<?php
								endif;
								$corl_description = get_bloginfo( 'description', 'display' );
								if ( $corl_description || is_customize_preview() ) :
									?>
									<p class="site-description"><?php echo $corl_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
							<?php endif; ?>
                            <!-- End Header Logo -->
                        </div>
                        <div class="col-auto p-0 me-lg-auto">
                            <!-- Start Header Menu -->
                            <?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
									'menu_class'        => 'header-nav',
								)
							);
							?>
                            <!-- End Header Menu -->
                        </div>
                        <div class="col-auto">

                            <div class="header-btn-link">
                                <?php 

                                      $signinbuttontext = get_theme_mod( 'corl_signin_button_text' );
                                      $signinbuttonlink = get_theme_mod( 'corl_signin_button_link' );
                                      if($signinbuttontext){
                                          echo'<a href="'.$signinbuttonlink.'" class="btn btn-lg btn-default active">'.$signinbuttontext.'</a>';
                                      }

                                      $applynowbuttontext = get_theme_mod( 'corl_applynow_button_text' );
                                      $applynowbuttonlink = get_theme_mod( 'corl_applynow_button_link' );
                                      if($applynowbuttontext){
                                        echo'<a href="'.$applynowbuttonlink.'" class="btn btn-lg btn-default">'.$applynowbuttontext.'</a>';
                                    }
                                
                                ?>
                                <div class="fairmint-invest-widget"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- .....:::::: End Header Section :::::.... -->

        <!-- .....:::::: Start Mobile Header Section :::::.... -->
        <div class="mobile-header d-block d-lg-none">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto">
                        <div class="mobile-logo">
                            <a href="<?php echo get_home_url(); ?>"><img src="<?php echo get_theme_mod( 'corl_mobile_logo' , 'default' ) ?>" alt="corl logo"></a>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="mobile-action-link text-end">
                            <a data-bs-toggle="offcanvas" href="#toggleMenu" role="button"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/mobile_menu_bar.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- .....:::::: Start MobileHeader Section :::::.... -->

        <!--  .....::::: Start Offcanvas Mobile Menu Section :::::.... -->
        <div class="offcanvas offcanvas-start" tabindex="-1" id="toggleMenu">
            <div class="offcanvas-header">
                <!-- Start Header Logo -->
                <a href="<?php echo get_home_url(); ?>" class="header-logo"><img src="<?php echo get_theme_mod( 'corl_mobile_logo' , 'default' ) ?>" alt="corl logo"></a>
                <!-- End Header Logo -->
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <!-- Start Offcanvas Mobile Menu Wrapper -->
                <div class="offcanvas-mobile-menu-wrapper">
                    <!-- Start Mobile Menu  -->
                    <div class="mobile-menu-bottom">
                        <!-- Start Mobile Menu Nav -->
                        <div class="offcanvas-menu">
                            <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location' => 'menu-2',
                                        'menu_id'        => 'mobile-menu',
                                    )
                                );
                                ?>
                        </div>
                        <!-- End Mobile Menu Nav -->
                    </div>
                    <!-- End Mobile Menu -->

                    <div class="col-auto p-0 text-center mb-4">
                        <div class="header-btn-link">
                            <?php 

                                    $first_button_text = get_theme_mod( 'first_button_text' );
                                    $first_button_link = get_theme_mod( 'first_button_link' );
                                    if($first_button_text){
                                        echo '<a href="'.$first_button_link.'" class="btn btn-lg btn-default active">'.$first_button_text.'</a>';
                                    }

                                    $secound_button_text = get_theme_mod( 'secound_button_text' );
                                    $secound_button_link = get_theme_mod( 'secound_button_link' );
                                    if($secound_button_text){
                                        echo '<a href="'.$secound_button_link.'" class="btn btn-lg btn-default">'.$secound_button_text.'</a>';
                                    }
                            
                            ?>
                            
                        </div>
                    </div>

                    <!-- Start Mobile contact Info -->
                    <div class="mobile-contact-info text-center">
                        <ul class="social-link">
                            <?php 
                              $corl_linkedin_link = get_theme_mod( 'corl_linkedin_link' );
                              $corl_facebook_link = get_theme_mod( 'corl_facebook_link' );
                              $corl_twitter_link = get_theme_mod( 'corl_twitter_link' );
                              $corl_instagram_link = get_theme_mod( 'corl_instagram_link' );

                              if($corl_linkedin_link){echo'<li><a href="'.$corl_linkedin_link.'"><i class="fab fa-linkedin-in"></i></a></li>';}
                              if($corl_facebook_link){echo'<li><a href="'.$corl_facebook_link.'"><i class="fab fa-facebook-f"></i></a></li>';}
                              if($corl_twitter_link){echo'<li><a href="'.$corl_twitter_link.'"><i class="fab fa-twitter"></i></a></li>';}
                              if($corl_instagram_link){echo'<li><a href="'.$corl_instagram_link.'"><i class="fab fa-instagram"></i></a></li>';}

                            ?>
                        </ul>
                    </div>
                    <!-- End Mobile contact Info -->

                </div>
                <!-- End Offcanvas Mobile Menu Wrapper -->
            </div>
        </div>
        <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->



