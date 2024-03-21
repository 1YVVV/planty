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


// Utilisation du hook wp_nav_menu_items pour afficher le lien Admin lorsque l'utilisateur est connecté à WordPress
// function add_admin_link_to_menu($items) {
//     if ( is_user_logged_in() ) { // Vérifie si l'utilisateur est connecté
//         $items .= '<li><a href="'. admin_url('') .'">Admin</a></li>'; // Ajoute le lien "Admin" aux éléments du menu
//     }
//     return $items;
// }
// add_filter( 'wp_nav_menu_items', 'add_admin_link_to_menu');

// Utilisation du hook wp_nav_menu_items pour afficher le lien Admin lorsque l'utilisateur est connecté à WordPress
// Fonction pour modifier les éléments du menu d'en-tête
function modifier_menu_admin($items) {
    // Vérifier si l'utilisateur est connecté
    if (is_user_logged_in() ) {
        // Récupérer l'URL de l'administration
        $admin_url = admin_url();

        // Construire le lien Admin
        $admin_link = '<li id="menu-item-admin"><a href="' . esc_url($admin_url) . '">Admin</a></li>';

        // Diviser les éléments du menu en un tableau
        $menu_items = explode('</li>', $items);

        // Insérer le lien Admin à l'emplacement désiré (par exemple, après le premier élément)
        array_splice($menu_items, 1, 0, $admin_link); // Insérer après le premier élément (index 0)

        // Rejoindre les éléments du menu en une chaîne
        $items = implode('</li>', $menu_items);
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'modifier_menu_admin', 10, 2);




// Hook wpcf7_mail_sent de Contact Form 7 pour déclencher la soumission du formulaire droit après l'envoi du gauche
// add_action('wpcf7_mail_sent', 'envoi_formulaires', 10, 1);

// function envoi_formulaires($formulaire_commande)
// {
//     $id_gauche = 'bccf6a7';
//     $id_droite = 'ab70392';
// 	$id_bouton = '7765998';

//     if ($formulaire_commande->id() == $id_bouton) {
//         $formulaire_gauche = WPCF7_ContactForm::get_instance($id_gauche);
//         $formulaire_droite = WPCF7_ContactForm::get_instance($id_droite);

//         if ($formulaire_gauche && $formulaire_droite) {
//             $envoi = WPCF7_Submission::get_instance();

//             if ($envoi) {
//                 $donnees_gauche = $envoi->get_posted_data($formulaire_gauche);
//                 $donnees_droite = $envoi->get_posted_data($formulaire_droite);
// 				$donnees_bouton = $envoi->get_posted_data($formulaire_commande);
               
//                 // Vérifier si tous les champs sont remplis
//                 if (empty($donnees_gauche['nom']) || empty($donnees_gauche['prenom']) || empty($donnees_gauche['email']) ||
//                     empty($second_data['adresse']) || empty($second_data['code_postal']) || empty($second_data['ville'])) {
//                     $donnees_valides = false;
//                     $formulaire_commande->add_feedback("Veuillez remplir tous les champs.", 'error');
//                 }

//                 if (!$donnees_valides) {
//                     // Empêcher l'envoi du troisième formulaire s'il manque des données dans les deux premiers formulaires
//                     $contact_form->skip_mail = true;
//                 }
// 				else {
// 					$donnees_valides = true;
// 					$formulaire_gauche->set_properties(array('posted_data' => $donnees_gauche));
//                     $formulaire_gauche->submit();
//                     $formulaire_droite->set_properties(array('posted_data' => $donnees_droite));
//                     $formulaire_droite->submit();
// 				}

//             }
//         }
//     }
// }

