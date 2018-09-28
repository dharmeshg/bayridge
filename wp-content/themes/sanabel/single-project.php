<?php
get_header();
?>
<!-- start site content -->
<div class="site_content">

    <?php asalah_page_title_holder(); ?>

    <div class="new_section portfolio_section container-fluid">
        <div class="container">
            <div class="row">
                

                <?php while (have_posts()) : the_post(); ?>

                    <?php
                        $asalah_project_content_class = asalah_project_content_class();
                        $asalah_project_sidebar_class = asalah_project_sidebar_class();
                    ?>
                    <!-- start portfolio banner -->
                    <section class="<?php echo esc_attr($asalah_project_content_class); ?> main_content single_project_content">
                        <div class="project_banner row clearfix">
                            <header class="content_banner blog_post_banner col-md-12 clearfix">
                                <?php asalah_blog_post_banner(); ?>
                            </header>

                        </div>
                    </section>

                    <div class="side_content widget_area <?php echo esc_attr($asalah_project_sidebar_class); ?>">

                        <?php
                        // difine project info container classes in case of full widh project layout
                        $project_info_container = '';
                        $project_description_content = '';
                        $project_details_content = '';
                        if ($asalah_project_sidebar_class == 'col-md-12') {
                            if ( ( (asalah_post_option("asalah_projects_details") == "show") || (asalah_option("asalah_project_details") && asalah_post_option("asalah_projects_details") != "hide") )
                                  && ( (asalah_post_option("asalah_project_overview") == "show") || (asalah_option("asalah_project_overview") && asalah_post_option("asalah_project_overview") != "hide") ) 
                                ) {
                                $project_info_container = 'row';
                                $project_description_content = 'col-md-8';
                                $project_details_content = 'col-md-4';
                            }
                        }
                        ?>
                        <div class="project_info_container clearfix <?php echo esc_attr($project_info_container); ?>">

                            <?php if ((asalah_post_option("asalah_project_overview") == "show") || (asalah_option("asalah_project_overview") && asalah_post_option("asalah_project_overview") != "hide")): ?>
                            <div class="project_description_content clearfix widget_container <?php echo esc_attr($project_description_content); ?>">
                                <div class="widget_container">
                                    <?php if (asalah_cross_option("asalah_project_overview_phrase")): ?>
                                        <h4 class="title thin_title page-header widget_title"><?php echo asalah_cross_option("asalah_project_overview_phrase"); ?></h4>
                                    <?php else: ?>
                                        <h4 class="title thin_title page-header widget_title"><?php _e('Project Overview', 'asalah') ?></h4>
                                    <?php endif; ?>
                                    <div class="textwidget widget_content">
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                            </div>
                            <?php endif ?>
                            
                            <?php if ( ( (asalah_post_option("asalah_projects_social") == "show") || (asalah_option("asalah_project_social_share") && asalah_post_option("asalah_projects_social") != "hide") )
                            || ( (asalah_post_option("asalah_projects_details") == "show") || (asalah_option("asalah_project_details") && asalah_post_option("asalah_projects_details") != "hide") ) 
                            ): ?>
                            <div class="project_details_content clearfix widget_container <?php echo esc_attr($project_details_content) ?>">
                                <?php if ((asalah_post_option("asalah_projects_details") == "show") || (asalah_option("asalah_project_details") && asalah_post_option("asalah_projects_details") != "hide")): ?>
                                    <div class="widget_container">
                                        <?php if (asalah_cross_option("asalah_project_details_phrase")): ?>
                                            <h4 class="title thin_title page-header widget_title"><?php echo asalah_cross_option("asalah_project_details_phrase"); ?></h4>
                                        <?php else: ?>
                                            <h4 class="title thin_title page-header widget_title"><?php _e('Project Details', 'asalah') ?></h4>
                                        <?php endif; ?>
                                        <div class="widget_content">
                                            <div class="projects_details_content">
                                                <div class="project_details_item">
                                                    <?php
                                                    if (asalah_post_option('asalah_project_date')) {
                                                        echo '<p><strong>'.__('Date', 'asalah').' : </strong>' . asalah_post_option('asalah_project_date') . '</p>';
                                                    }
                                                    ?>
                                                </div>                                               

                                                <div class="project_details_item">
                                                    <?php
                                                    $tags_list = get_the_term_list($post->ID, 'tagportfolio', '', ', ', '');
                                                    if ($tags_list != ''):
                                                        ?>
                                                        <p><strong><?php _e("Tags", "asalah"); ?> : </strong><?php
                                                            echo balanceTags($tags_list);
                                                            ?></p>
                                                    <?php endif; ?>
                                                </div>

                                                <div class="project_details_item">
                                                    <?php
                                                    // project client
                                                    if (asalah_post_option('asalah_project_client')) {
                                                        echo "<p>";
                                                        if ( esc_url(asalah_post_option('asalah_project_client_url')) ) {
                                                            echo '<strong>'.__('Client', 'asalah').' : </strong><a target="_blank" href="' . esc_url( asalah_post_option('asalah_project_client_url') ) . '">' . asalah_post_option('asalah_project_client') . '</a>';
                                                        } else {
                                                            echo '<strong>'.__('Client', 'asalah').' : </strong>' . asalah_post_option('asalah_project_client');
                                                        }
                                                        echo "</p>";  
                                                    }

                                                    if ( esc_url(asalah_post_option('asalah_project_client_logo')) ) {
                                                        echo "<p class='project_client_logo'>";
                                                        if ( esc_url(asalah_post_option('asalah_project_client_url')) ) {
                                                            echo '<a target="_blank" href="' . esc_url(asalah_post_option('asalah_project_client_url')) . '"><img class="project_client_logo" src="'.esc_url(asalah_post_option('asalah_project_client_logo')).'" /></a>';
                                                        } else {
                                                            echo '<img src="'.esc_url(asalah_post_option('asalah_project_client_logo')).'" />';
                                                        }
                                                        echo "</p>"; 
                                                    }
                                                    ?>
                                                </div>

                                                <div class="project_details_item project_preview_url">
                                                    <?php
                                                    // project preview text
                                                    if (asalah_post_option('asalah_project_preview_text')) {
                                                        $preview_text = asalah_post_option('asalah_project_preview_text');
                                                    } else {
                                                        $preview_text = __('Live Preview', 'asalah');
                                                    }

                                                    if (asalah_post_option('asalah_project_url')) {
                                                        echo '<a class="project_preview_button" target="_blank" href="' . asalah_post_option('asalah_project_url') . '">' . $preview_text . ' </a>';
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if ((asalah_post_option("asalah_projects_social") == "show") || (asalah_option("asalah_project_social_share") && asalah_post_option("asalah_projects_social") != "hide")): ?>
                                <div class="widget_container clearfix">
                                    <div class="widget_content">
                                        <?php asalah_post_like(); ?>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>

                        </div>
                    </div>
                <?php endwhile; ?>

                <!-- start portfolio navigation -->
                <?php if (asalah_cross_option('asalah_project_next_prev') != "hide") : ?>
                    <?php
                        $next_post = get_next_post();
                        $prev_post = get_previous_post();
                    ?>
                    <?php if ( !empty( $prev_post ) || !empty( $next_post ) ): ?>
                        <div class="project_navigation_container post_navigation_container col-md-12">
                            <div class="project_navigation_wrapper post_navigation_wrapper clearfix">
                                <?php if (!empty( $prev_post )): ?>
                                    <a title="<?php echo esc_attr($prev_post->post_title); ?>" href="<?php echo get_permalink( $prev_post->ID ); ?>" id="right_nav_arrow" class="cars_nav_control next_nav_arrow"><?php _e("Next Project", 'asalah'); ?></i></a>
                                <?php endif; ?>

                                <?php if (!empty( $next_post )): ?>
                                    <a title="<?php echo esc_attr($next_post->post_title); ?>" href="<?php echo get_permalink( $next_post->ID ); ?>" id="left_nav_arrow" class="cars_nav_control prev_nav_arrow"><?php _e("Previous Project", 'asalah'); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                
            </div>
        </div>
    </div>

    <?php if ((asalah_post_option("asalah_other_projects") == "show") || ( asalah_option("asalah_other_projects") && asalah_post_option("asalah_other_projects") != 'hide')): ?>
    <!-- shadow divider only if other projects enabled -->

    <!-- start other projects except this project -->
    <div class="new_section other_projects_section container-fluid">
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            
            
            

            <div class="section_title text-center clearfix" style="">

                <?php
                $unique_color = '';
                if ( asalah_option('asalah_other_project_title_unique_word_color') ) {
                    $unique_color = asalah_option('asalah_other_project_title_unique_word_color');
                }
                $unique_word_style = "";
                if ($unique_color) {
                    $unique_word_style = 'style="color:'.$unique_color.'"';
                }

                $title = asalah_option('asalah_other_project_title');
                $unique_word = asalah_option('asalah_other_project_title_unique_word');

                if ($title && $unique_word) {
                  $title = str_replace($unique_word, "<span class='unique_word_color related_project_unique_color' ".$unique_word_style.">".$unique_word."</span>", $title);
                }
                ?>
                <?php if ($title): ?>
                <h2><?php echo balanceTags($title); ?></h2>
                <?php endif; ?>

                <?php if (asalah_option('asalah_other_projects_desc')): ?>
                <p><?php echo asalah_option('asalah_other_projects_desc'); ?></p>
                <?php endif; ?>
            </div>

            <?php
            $wp_query = new WP_Query(array('post_type' => 'project', 'orderby' => 'rand', 'posts_per_page' => 3, 'post__not_in' => array($post->ID) ));
            ?>

            <?php if (have_posts()) : ?>
            <div class= "projects_wrapper style_default">
                <div class="thumbnails portfolio_grid grid row">
                    <div class="col-md-12"><div class="asalah_row">
                    <?php while (have_posts()) : the_post(); ?>
                        <?php 
                        $output = '';
                        $output .= '<li class="one_third portfolio_grid_list clearfix grid_list portfoliotagfilterall '.asalah_portfolio_tag().' ">';
                                $output .= '<figure class="portfolio_figure overlay_fade">';
                                    if (get_the_post_thumbnail($post->ID)) {
                                      $output .= get_the_post_thumbnail($post->ID, 'portfolio', array( 'class' => 'img-responsive' ) );
                                    }else{
                                      // if no project thumbnail show default thumbnail
                                      $output .= '<img src="'.asalah_option('asalah_default_project_thumbnail').'" class="img-responsive"/>';
                                    }
                        $output .= '<div class="overlay_color"></div>';
                                    $output .= '<a href="'.get_permalink().'">';
                          $output .= '<figcaption  class="portfolio_caption">';
                                            $output .= '<h4 class="title">'.get_the_title().'</h4>'; // seperate title into two parts
                                        $output .= '</figcaption>'; // end portfolio_caption
                        $output .= '</a>';
                                $output .= '</figure>'; // end portfolio_figure overlay_fade
                            $output .= '</li>'; // portfolio_grid_list

                            echo balanceTags($output);
                        ?>
                    <?php endwhile; ?>
                    </div></div> <!-- end col-md-12 and end asalah_row -->
                </div> <!-- end thumbnails portfolio grid grid row -->
            </div> <!-- end projects wrapper style_grid -->
            <?php endif; ?>
        </div>

    </div>
    </div>
    </div>
    <?php endif; ?>

</div>
<?php get_footer(); ?>