<?php
/**
 * Plugin Name: Editorial Calendar ID Numbers
 * Plugin URI: https://onemallgroup.com
 * Description: Universal IDs for our editorial calendar.
 * Author: Ryan Morton
 * Author URI: https://www.thenerdscribe.com
 * Version: 0.1
 * Text Domain: editorial-calendar-ids
 *
 * Copyright 2017
 *
 * @package editorial-ids
 * @author Ryan Morton
 * @version 0.1
 */

// Prevent direct file access
if( ! defined( 'ABSPATH' ) ) {
  die();
}

add_filter( 'manage_posts_columns', 'revealid_add_id_column', 5 );
add_action( 'manage_posts_custom_column', 'revealid_id_column_content', 5, 2 );


function revealid_add_id_column( $columns ) {
  $columns['revealid_id'] = 'ID';
  return $columns;
}

function revealid_id_column_content( $column, $id ) {
  $blogInfo = get_bloginfo($show = 'name');
  $splitWords = explode(' ', $blogInfo);
  $outString = '';
  foreach($splitWords as $word) {
    $firstLetter = substr($word, 0, 1);
    $outString .= $firstLetter;
  }

  $ecID = $outString;
  if( 'revealid_id' == $column ) {
    echo $outString . $id;
  }
}
