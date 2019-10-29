<?php
/**
* Fonction qui ajoute la possibilité de customiser la partie personnalisation du thème
* //https://developer.wordpress.org/themes/customize-api/customizer-objects/
*
* @param [type] $wp_customize
* @return void
*/
function ajout_personnalisation_footer($wp_customize)
{
 // Ajout d'un panel avec des options
 // Attention, un panel ne s'affichera que s'il contient des sections
 //https://developer.wordpress.org/reference/classes/wp_customize_manager/add_panel/
 $wp_customize->add_panel('coding-panel-footer', [
   'title' => __('Section footer'),
   'Description' => __('Personnalisation de la section footer')
 ]);
 $wp_customize->add_section('coding-footer-section-text', [
    'panel' => 'coding-panel-footer',
    'title' => __('Personnalisation du texte'),
    'description' => __('Personnalisez le texte')
  ]);
  $wp_customize->add_setting('coding-footer-text', [
    'type' => 'theme_mod',
    'sanitize_callback' => 'sanitize_textarea_field'
  ]);
 $wp_customize->add_control('coding-footer-text-control', [
    'section' => 'coding-footer-section-text',
    'settings' => 'coding-footer-text',
    'label' => __('Texte footer'),
    'description' => __('Personnalisez le texte du footer'),
    'type' => 'textarea'
  ]);
 }
 add_action('customize_register', 'ajout_personnalisation_footer');
 ?>