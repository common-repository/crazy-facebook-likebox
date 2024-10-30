<?php
/**
 * Created by PhpStorm.
 * User: sashisolutions
 * Date: 4/10/2017
 * Time: 5:04 PM
 */

function ss_crazy_fblikebox_add_scripts(){

	wp_enqueue_style('ss_crazy_fblikebox_style', plugins_url().'/crazy-fb-likebox/css/main.css' );
	wp_enqueue_style('ss_crazy_fblikebox_style', plugins_url().'/crazy-fb-likebox/css/bootstrap.css');
    wp_enqueue_script('ss_crazy_fblikebox_scripts', 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&amp;version=v3.3' );
}

add_action('wp_enqueue_scripts', 'ss_crazy_fblikebox_add_scripts');

