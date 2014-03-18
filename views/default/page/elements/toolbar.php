<?php

// $menu = elgg_view_menu('site'); // TODO: menu is empty for admin or other users not configured in procura
$menu = elgg_view('procura/custom_menu');
$search = elgg_view('search/search_box');

echo '<nav class="elgg-page-toolbar sticky">';
if ($search) {
	echo '<div class="elgg-col elgg-col-3of4">' . $menu . '</div>';
	echo '<div class="elgg-col elgg-col-1of4">' . $search . '</div>';
} else {
	echo '<div class="elgg-col elgg-col-1of1">' . $menu . '</div>';
}
echo '</nav>';