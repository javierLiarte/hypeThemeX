<?php

/**
 * Responsive Theme for Elgg
 *
 * @package hypeJunction
 * @subpackage ThemeX
 *
 * @author Ismayil Khayredinov <ismayil.khayredinov@gmail.com>
 */

namespace hypeJunction\ThemeX;

const PLUGIN_ID = 'hypeThemeX';

$theme = elgg_get_plugin_setting('theme', PLUGIN_ID);
if (!$theme) {
	$theme = 'default';
}

define('ELGG_THEME', $theme);

elgg_register_event_handler('init', 'system', __NAMESPACE__ . '\\init');
elgg_register_event_handler('pagesetup', 'system', __NAMESPACE__ . '\\setup_menus', 999);

/**
 * Initialize the plugin
 */
function init() {

	if (elgg_in_context('admin')) {
		return;
	}

	elgg_extend_view('page/elements/head', 'framework/fonts/font-awesome');
	elgg_extend_view('page/elements/head', 'framework/fonts/open-sans');
	elgg_extend_view('page/elements/head', 'framework/metatags/viewport');

	elgg_unextend_view('page/elements/header', 'search/header'); // Very annoying extention that needs to disappear
	elgg_unextend_view('css/elgg', 'custom_index/css');
	elgg_unextend_view('css/elgg', 'groups/css');
	elgg_unextend_view('css/elgg', 'messages/css');
	elgg_unextend_view('css/elgg', 'profile/css');
	elgg_unextend_view('css/elgg', 'search/css');


	$jquery_ui = JQUERY_UI_THEME;
	elgg_register_css('jquery-ui', "/mod/hypeThemeX/stylesheets/jquery-ui-themes-1.10.3/themes/$jquery_ui/jquery-ui.min.css", 300);
	elgg_load_css('jquery-ui');

	$theme = ELGG_THEME;
	elgg_register_css('elgg.theme', "/mod/hypeThemeX/stylesheets/themes/$theme/theme.css", 400);
	elgg_load_css('elgg.theme');

	elgg_register_js('modernizr', '/mod/hypeThemeX/javascripts/vendor/custom.modernizr.js', 'head', 100);
	elgg_register_js('jquery', '/mod/hypeThemeX/javascripts/vendor/jquery-1.10.2.min.js', 'head', 125);
	elgg_register_js('jquery-migrate', '/mod/hypeThemeX/javascripts/vendor/jquery-migrate-1.2.1.min.js', 'head', 150);
	elgg_register_js('jquery-ui', '/mod/hypeThemeX/javascripts/vendor/jquery-ui-1.10.3.custom.min.js', 'head', 175);

	elgg_register_js('foundation', '/mod/hypeThemeX/javascripts/foundation/foundation.js', 'footer', 200);
	elgg_register_js('foundation.abide', '/mod/hypeThemeX/javascripts/foundation/foundation.abide.js', 'footer', 201);
	elgg_register_js('foundation.alerts', '/mod/hypeThemeX/javascripts/foundation/foundation.alerts.js', 'footer', 201);
	elgg_register_js('foundation.clearing', '/mod/hypeThemeX/javascripts/foundation/foundation.clearing.js', 'footer', 201);
	elgg_register_js('foundation.cookie', '/mod/hypeThemeX/javascripts/foundation/foundation.cookie.js', 'footer', 201);
	elgg_register_js('foundation.dropdown', '/mod/hypeThemeX/javascripts/foundation/foundation.dropdown.js', 'footer', 201);
	elgg_register_js('foundation.forms', '/mod/hypeThemeX/javascripts/foundation/foundation.forms.js', 'footer', 201);
	elgg_register_js('foundation.interchange', '/mod/hypeThemeX/javascripts/foundation/foundation.interchange.js', 'footer', 201);
	elgg_register_js('foundation.joyride', '/mod/hypeThemeX/javascripts/foundation/foundation.joyride.js', 'footer', 201);
	elgg_register_js('foundation.magellan', '/mod/hypeThemeX/javascripts/foundation/foundation.magellan.js', 'footer', 201);
	elgg_register_js('foundation.orbit', '/mod/hypeThemeX/javascripts/foundation/foundation.orbit.js', 'footer', 201);
	elgg_register_js('foundation.placeholder', '/mod/hypeThemeX/javascripts/foundation/foundation.placeholder.js', 'footer', 201);
	elgg_register_js('foundation.reveal', '/mod/hypeThemeX/javascripts/foundation/foundation.reveal.js', 'footer', 201);
	elgg_register_js('foundation.section', '/mod/hypeThemeX/javascripts/foundation/foundation.section.js', 'footer', 201);
	elgg_register_js('foundation.tooltips', '/mod/hypeThemeX/javascripts/foundation/foundation.tooltips.js', 'footer', 201);
	elgg_register_js('foundation.topbar', '/mod/hypeThemeX/javascripts/foundation/foundation.topbar.js', 'footer', 201);

	elgg_register_simplecache_view('js/theme/init');
	elgg_register_js('elgg.theme', elgg_get_simplecache_url('js', 'theme/init'), 'footer', 900);

	elgg_load_js('modernizr');
	elgg_load_js('jquery'); // Foundation needs higher version of jquery than that in Elgg
	elgg_load_js('jquery-migrate');
	elgg_load_js('jquery-ui');
	elgg_load_js('foundation'); // loads Foundation js

	elgg_load_js('elgg.theme');
}

/**
 * Customize the topbar menu so that it works with Foundation
 */
function setup_menus() {

	elgg_register_menu_item('topbar', array(
		'name' => 'elgg_logo',
		'href' => elgg_get_site_url(),
		'text' => elgg_view('page/elements/topbar_logo'),
		'item_class' => 'name'
	));

	elgg_register_menu_item('topbar', array(
		'name' => 'toggle',
		'href' => '#',
		'text' => '<span>' . elgg_echo('menu') . '</span>',
		'item_class' => 'toggle-topbar menu-icon',
		'priority' => 900
	));
}
