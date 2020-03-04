<?php
/**
 * Created by PhpStorm.
 * User: holevi96
 * Date: 2017. 07. 06.
 * Time: 13:51
 */

register_sidebar(array(
    'name'          => __( 'Categories', 'yusp' ),
    'id'            => 'post_categories',
    'description'   => '',
    'class'         => '',
    'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget'  => '</li>',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>' ));