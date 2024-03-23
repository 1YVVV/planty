<?php
/**
 * OceanWP Child Theme Functions
 *
 * When running a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions will be used.
 *
 * Text Domain: oceanwp
 * @link http://codex.wordpress.org/Plugin_API
 *
 */

/**
 * Load the parent style.css file
 *
 * @link http://codex.wordpress.org/Child_Themes
 */

function oceanwp_child_enqueue_parent_style() {
	// Dynamically get version number of the parent stylesheet (lets browsers re-cache your stylesheet when you update the theme)
	$theme   = wp_get_theme( 'OceanWP' );
	$version = $theme->get( 'Version' );
	// Load the stylesheet.
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'oceanwp-style' ), $version );
}
add_action( 'wp_enqueue_scripts', 'oceanwp_child_enqueue_parent_style' );


// Création de la fonction qui sera utilisée comme fonction de rappel (callback) pour insérer le nouveau lien dans le menu
// Fonction pour ajouter le lien Admin au menu d'en-tête et l'afficher lorsque l'utilisateur est connecté
function ajouter_lien_admin_au_menu_entete($elements, $menu) {
    // Vérifier si l'utilisateur est connecté
    if (is_user_logged_in() && $menu->theme_location == 'main_menu') {
        // Récupération de l'URL de l'administration
        $url_admin = admin_url();
        // Construction du lien Admin
        $lien_admin = '<li id="menu-item-admin"><a href="' . esc_url($url_admin) . '">Admin</a></li>';
        // esc_url() est une fonction native de WordPress destinée à nettoyer et à sanitariser une URL donnée.
        // Son objectif est de s'assurer que l'URL entrée est valide et conforme aux standards,
        // d'échapper les caractères spéciaux potentiellement malveillants et de neutraliser les risques potentiels de cross-site scripting (XSS) et d'injection SQL.
        
        // Division des éléments du menu en un tableau (séparateur, éléments) avec fonction explode()
        $tableau_elements_menu = explode('</li>', $elements);
        // Insertion du lien Admin à l'emplacement 1 (soit la 2ème position dans le tableau) avec fonction array_splice()
        array_splice($tableau_elements_menu, 1, 0, $lien_admin);
        // Reconversion du tableau en chaîne de caratères avec fonction implode()
        $elements = implode('</li>', $tableau_elements_menu);
    }
    return $elements;
}
// Utilisation du hook wp_nav_menu_items pour exécuter la fonction
// Le crochet wp_nav_menu_items accepte la fonction de rappel en tant qu'argument
// et est appelé chaque fois que la fonction wp_nav_menu() est utilisée pour afficher un menu.
add_filter('wp_nav_menu_items', 'ajouter_lien_admin_au_menu_entete', 10, 2);

