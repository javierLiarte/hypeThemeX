<?php
/**
 * Overriding for ACV theme (@jliarte)
 * Messages folder view (inbox, sent,drafts @sdrortega) 
 *
 * Provides form body for mass deleting messages
 *
 * @uses $vars['list'] List of messages
 */

echo elgg_view('procura/procura_messages/messages_tab_menu', array(
    'folder' => $vars['folder'],
));


$messages = $vars['list'];
if (!$messages) {
    echo '</div>';
    echo elgg_echo('messages:nomessages');
    return true;
}

/*
// Botón para eliminar mensajes
echo elgg_view('input/submit', array(
    'value' => elgg_echo('delete'),
    'name' => 'delete',
    'class' => 'elgg-button-action',
    'title' => elgg_echo('deleteconfirm:plural'),
));*/
echo '</div>';
/** Menu and buttons end **/

echo '<div class="messages-container clearfix">';
// Inclusión de cabecera para cada campo
echo
'<div class="messages-timestamp-cab">'.elgg_echo('procura_messages:fecha').'</div>
<div class="messages-owner-cab">'.elgg_echo('procura_messages:nombre').'</div> 
<div class="messages-subject-cab">'.elgg_echo('messages:title').'</div>
<div class="messages-delete"></div>
<br/>';

echo $messages;
echo '</div>';
