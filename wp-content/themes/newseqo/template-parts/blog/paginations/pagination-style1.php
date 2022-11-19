<?php 
global $wp_query;

// stop execution if there's only 1 page
if ( $wp_query->max_num_pages <= 1 ){
    return;
}

$newseqo_paged	 = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
$newseqo_max	 = intval( $wp_query->max_num_pages );

// add current page to the array
if ( $newseqo_paged >= 1 ){
    $newseqo_links[] = $newseqo_paged;
}

// add the pages around the current page to the array
if ( $newseqo_paged >= 3 ) {
    $newseqo_links[] = $newseqo_paged - 1;
    $newseqo_links[] = $newseqo_paged - 2;
}

if ( ( $newseqo_paged + 2 ) <= $newseqo_max ) {
    $newseqo_links[] = $newseqo_paged + 2;
    $newseqo_links[] = $newseqo_paged + 1;
}

echo '<ul class="pagination justify-content-center">' . "\n";

// previous Post Link
if ( get_previous_posts_link() ){
    printf( '<li>%s</li>' . "\n", wp_kses_post(get_previous_posts_link( '<i class="xts-icon xts-arrow-left"></i>' )) );
}

// link to first page, plus ellipses if necessary
if ( !in_array( 1, $newseqo_links ) ) {
    $newseqo_class = 1 == $newseqo_paged ? ' class="active"' : '';

    printf( '<li%s><a class="page-link" href="%s">%s</a></li>' . "\n", esc_attr($newseqo_class), esc_url( get_pagenum_link( 1 ) ), '1' );

    if ( !in_array( 2, $newseqo_links ) )
        echo '<li class="pagination-dots">&middot;&middot;&middot;</li>';
}

// link to current page, plus 2 pages in either direction if necessary
sort( $newseqo_links );
foreach ( (array) $newseqo_links as $newseqo_link ) {
    $newseqo_class = $newseqo_paged == $newseqo_link ? ' class="active"' : '';
    printf( '<li%s><a class="page-link" href="%s">%s</a></li>' . "\n", esc_attr($newseqo_class), esc_url( get_pagenum_link( $newseqo_link ) ), wp_kses_post($newseqo_link) );
}

// link to last page, plus ellipses if necessary
if ( !in_array( $newseqo_max, $newseqo_links ) ) {
    if ( !in_array( $newseqo_max - 1, $newseqo_links ) )
        echo '<li>&middot;&middot;&middot;</li>';

    $newseqo_class = $newseqo_paged == $newseqo_max ? ' class="active"' : '';
    printf( '<li%s><a class="page-link" href="%s" >%s</a></li>' . "\n", esc_attr($newseqo_class), esc_url( get_pagenum_link( $newseqo_max ) ), esc_html($newseqo_max) );
}

// next Post Link
if ( get_next_posts_link() ){
    printf( '<li>%s</li>' . "\n", wp_kses_post(get_next_posts_link( '<i class="xts-icon xts-arrow-right"></i>' )) );
}

echo '</ul>' . "\n";