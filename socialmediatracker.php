<?php
/*
Plugin Name: Social Media Tracker
Plugin URI: http://sp.senac.br/
Description: Suas redes sociais de forma personalizada dentro de seu CMS favorito!
Version: 1.0.0
Author: Joao Vitor Barbosa Souza
Author URI: http://sp.senac.br/
*/

// Bloqueando acesso direto ao plugin
if (!defined('ABSPATH')) {
  exit;
}

require_once(plugin_dir_path(__FILE__).'/includes/socialmediatracker-scripts.php');

require_once(plugin_dir_path(__FILE__).'/includes/socialmediatracker-class.php');

function registrar_socialmediatracker(){
  register_widget('SMT_Subs_Widget');
}

add_action('widgets_init', 'registrar_socialmediatracker');