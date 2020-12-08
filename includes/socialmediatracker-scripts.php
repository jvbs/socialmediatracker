<?php

function smt_add_scripts(){
  // adicionando css  & js
  wp_enqueue_style('smt-style', plugins_url().'/socialmediatracker/css/style.css');
  wp_enqueue_style('smt-script', plugins_url().'/socialmediatracker/js/main.js');

  wp_register_script('google', 'https://apis.google.com/js/platform.js');
  wp_enqueue_script('google');
}

add_action('wp_enqueue_scripts', 'smt_add_scripts');