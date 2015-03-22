<?php
/**
 * The template for displaying Facebook comments.
 *
 * The area of the page that contains both current comments
 * and the comment form, directly obtained from the Facebook plugin.
 *
 * @package Moon
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

// Display Facebook comments app.
echo '<div class="fb-comments" data-href="' . get_permalink() . 
        '" data-width="100%" data-numposts="8" data-colorscheme="light"></div>';
