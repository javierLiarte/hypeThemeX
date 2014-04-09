<?php
/**
 * Overriding for ACV theme (@jliarte)
 * Extracting tab menu from * Messages folder view (inbox, sent,drafts @sdrortega) 
 *
 * Provides a tab menu for procura messages plugin
 *
 * @uses $vars['folder'] Message folder being viewed
 */

$links['inbox'] = elgg_view('output/url', array(
    'href' => elgg_get_site_url().'procura_messages/inbox',
    'text' => elgg_echo ('messages:inbox'),
//    'class' => 'elgg-button elgg-button-action',
    'is_trusted' => true,
));
$links['sent'] = elgg_view('output/url', array(
    'href' => elgg_get_site_url().'procura_messages/sent',
    'text' => elgg_echo ('messages:sentmessages'),
    //    'class' => 'elgg-button elgg-button-action',
    'is_trusted' => true,
));
$links['drafts'] = elgg_view('output/url', array(
    'href' => elgg_get_site_url().'procura_messages/drafts',
    'text' => elgg_echo ('procura_messages:drafts'),
    // 'class' => 'elgg-button elgg-button-action',
    'is_trusted' => true,
));

?>
<ul class="tabs">
    <? foreach ($links as $folder => $link) {
        $class = ($vars['folder'] == $folder)?' class="elgg-state-selected"':'';
        echo "<li$class>$link</li>\n";
    }?>
</ul>
<div class="message-list-header clearfix">
<?php

if ($vars['folder'] == 'inbox')
	echo sprintf(elgg_echo("messages:unreadcount"),pr_messages_count_unread());
// Incluimos un botón para acceder a los borradores. Aparecerá siempre, menos cuado estemos en borradores
// Botón de "Nuevo mensaje"
echo elgg_view('output/url', array(
    'href' => elgg_get_site_url().'procura_messages/compose',
    'text' => elgg_echo('messages:new'),
    'class' => 'round button elgg-button-new-message',
    'is_trusted' => true,
));
echo '<br/>';
