<?php
/**
 * Procura custom menu (from custom_index module)
 *
 * @uses $vars['value'] Current search query
 * @uses $vars['class'] Additional class
 */

if (elgg_is_active_plugin('custom_index') &&
	elgg_is_active_plugin('prp')) {

	$user = elgg_get_logged_in_user_entity();
	$tipoUsuario = prp_get_user_profile_type($user);

	//Obtener lista de elementos de menú para el perfil actual:
	$lista_menus = procura_custom_index_get_menu_items_by_profile($tipoUsuario);//funcion de este mismo módulo 

	echo '<ul class="elgg-menu elgg-menu-site elgg-menu-site-default clearfix">';
	foreach ($lista_menus as $item_menu) {
		echo '<li class="elgg-menu-item-'.$item_menu->item_name.' ">'.
			 '<a href="'.$item_menu->item_url.'">'.elgg_echo($item_menu->item_name).'</a></li>';
	}
	echo '</ul>';


}
?>