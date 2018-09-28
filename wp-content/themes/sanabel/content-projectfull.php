<?php 
$current_post_id = "";
if (isset($_POST['current_post_id'])) {
    $current_post_id = $_POST['current_post_id'];
}

$portfolio_thumbnail_option = "portfolio";
if (asalah_option("asalah_portfolio_thumnails") == "masonry") {
    $portfolio_thumbnail_option = "masonry";
}
if (asalah_post_option("asalah_portfolio_thumnails", $current_post_id) == "default") {
    $portfolio_thumbnail_option = "portfolio";  
}elseif (asalah_post_option("asalah_portfolio_thumnails", $current_post_id) == "masonry") {
    $portfolio_thumbnail_option = "masonry";
}

$portfolio_column = "one_third";
if (asalah_option("asalah_portfolio_columns")) {
   $portfolio_column = asalah_option("asalah_portfolio_columns");
}
if (asalah_post_option("asalah_portfolio_columns", $current_post_id)) {
   $portfolio_column = asalah_post_option("asalah_portfolio_columns", $current_post_id);
}
?>

<?php while (have_posts()) : the_post(); ?>
    <?php 
    $output = '';
    $output .= '<li class="'.$portfolio_column.' portfolio_grid_list filterable_item clearfix grid_list portfoliotagfilterall '.asalah_portfolio_tag().' ">';
            $output .= '<figure class="portfolio_figure overlay_fade">';
                if (get_the_post_thumbnail($post->ID)) {
                  $output .= get_the_post_thumbnail($post->ID, $portfolio_thumbnail_option, array( 'class' => 'img-responsive' ) );
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