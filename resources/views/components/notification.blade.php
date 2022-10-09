<?php

function setNotificationIcon($color)
{
    $default_icons = array(
        'danger'  => 'error',
        'info'    => 'info',
        'success' => 'check',
        'warning' => 'exclamation-triangle',
    );
    
    if( array_key_exists($color, $default_icons) )
        return $default_icons[$color];
    
    return;
}

$preset_color = isset($color) ? $color : 'primary';

$notification = (object) array(
    'color'   => $preset_color,
    'mode'    => isset($mode)    ? $mode    : 'dark',
    'close'   => isset($close)   ? $close   : false,
    'icon'    => isset($icon)    ? $icon    : setNotificationIcon($preset_color),
    'content' => isset($content) ? $content : '...',
    'classes' => isset($classes) ? $classes : '',
);

?>

<div class="notification is-<?= $notification->color ?> <?= $notification->mode === 'light' ? 'is-light' : '' ?>">
    <?php if($notification->close): ?>
    <button class="delete"></button>
    <?php endif ?>
    <div class="<?= $notification->classes ?>">
        <?php if( is_string($notification->icon) ): ?>
        @component('components.icon', [
            'icon' => $notification->icon,
        ])
        @endcomponent
        <?php endif ?>
        <?= $notification->content ?>
    </div>
</div>