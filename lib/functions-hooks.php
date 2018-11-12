<?php

// Custom hooks (like excerpt length etc)

function order_posts_by_title( $query ) {
  if ( $query->is_home() && $query->is_main_query() ) {
    $query->set( 'orderby', 'title' );
    $query->set( 'order', 'ASC' );
  }
}
add_action( 'pre_get_posts', 'order_posts_by_title' );
