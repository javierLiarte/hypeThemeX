<div id="procura-notifications" class="procura-notifications">
<?php

$notificaciones = $vars['notificaciones'];
$orden_fecha = $vars['orden_fecha'];
$orden_nivel = $vars['orden_nivel'];

?>
<div class="notification-unread-count">
    <?=sprintf(elgg_echo("procura_notifications:unreadcount"),procura_notifications_count_unread())?>
</div>
<br/>
<div class="notifications-header">
    <div class="timestamp">
        <a href="?orden=<?=$orden_fecha?>">
        <?=elgg_echo('procura_notifications:order:date')?> <?=(($orden_fecha=='fecha_asc')?'▲':'▼')?>
        </a>
    </div>
    <div class="level">
        <a href="?orden=<?=$orden_nivel?>">
        <?=elgg_echo('procura_notifications:order:priority')?> <?=(($orden_nivel=='nivel_asc')?'▲':'▼')?>
        </a>
    </div>
</div>
<?php

foreach ($notificaciones as $notificacion){
    echo elgg_view("object/notification", array ('notificacion' => $notificacion));
}

?>
</div>