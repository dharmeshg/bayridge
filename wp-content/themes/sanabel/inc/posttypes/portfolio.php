<?php
function asalah_portfolio_tag() {
    global $post;
    $terms = get_the_terms($post->ID, 'tagportfolio');
    if ($terms && !is_wp_error($terms)) :
        $links = array();
        foreach ($terms as $term) {
            $links[] = "portfoliotagfilter-" . $term->name;
        }
        $links = str_replace(' ', '-', $links);
        $tax = join(" ", $links);
    else :
        $tax = '';
    endif;
    return strtolower($tax);
}

function asalah_portfolio_tag_list_filter() {
    $terms = get_terms("tagportfolio");  
    $count = count($terms); 
    
    echo '<ul id="filters" class="option-set nav" data-option-key="filter">';  
    echo '<li class="active"><a href="#filter" data-option-value="*">';
    _e('Show All', 'asalah');
    echo '</a></li>';  
        if ( $count > 0 )  
        {  
            foreach ( $terms as $term ) {
                $termname = strtolower($term->name);  
                $termname = str_replace(' ', '-', $termname);
                $termname =  "portfoliotagfilter-".$termname;   
                echo '<li><a href="#filter" data-option-value=".'.$termname.'">'.$term->name.'</a></li>'; 
            }  
        }  
    echo "</ul>";
}

function asalah_portfolio_tag_list_url() {
    $terms = get_terms("tagportfolio");
    $count = count($terms);

    echo '<ul class="option-set nav" data-option-key="filter">';
    if (asalah_option('asalah_portfolio_url')) {
        echo '<li><a class="filter_link_visit" href="'.asalah_option('asalah_portfolio_url').'">Show all</a></li>';
    }
    if ($count > 0) {
        foreach ($terms as $term) {
            $term_link = get_term_link($term, 'species');
            $termname = strtolower($term->name);
            $termname = str_replace(' ', '-', $termname);
            $termname = "portfoliotagfilter-" . $termname;
            echo '<li><a class="filter_link_visit" href="' . $term_link . '" >' . $term->name . '</a></li>';
        }
    }
    echo "</ul>";
}
?>