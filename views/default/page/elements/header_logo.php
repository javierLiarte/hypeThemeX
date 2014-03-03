<?php
/**
 * Elgg header logo
 */

$site = elgg_get_site_entity();
$site_name = $site->name;
$site_url = elgg_get_site_url();
$img_path = '/mod/procuraHypeThemeX'; // TODO: substitute with automatically generated path
?>

<h1>
	<a class="elgg-heading-site" href="<?php echo $site_url; ?>">
		<img src="<?=$img_path?>/graphics/procura/procura.png" />
		<img src="<?=$img_path?>/graphics/procura/HUVR-300x61.png" />
	</a>
</h1>
