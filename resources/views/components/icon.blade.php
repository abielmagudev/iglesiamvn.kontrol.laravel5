<?php
$icons = array(
    'angle-double-down' => 'fas fa-angle-double-down',
    'angle-double-left' => 'fas fa-angle-double-left',
    'angle-double-right' => 'fas fa-angle-double-right',
    'angle-double-up' => 'fas fa-angle-double-up',
    'angle-down' => 'fas fa-angle-down',
    'angle-left' => 'fas fa-angle-left',
    'angle-right' => 'fas fa-angle-right',
    'angle-up' => 'fas fa-angle-up',
    'ban' => 'fas fa-ban',
    'bars' => 'fas fa-bars',
    'bell' => 'fas fa-bell',
    'birthday' => 'fas fa-birthday-cake',
    'bookmark' => 'fas fa-bookmark',
    'bug' => 'fas fa-bug',
    'cake' => 'fa fa-birthday-cake',
    'caret-down' => 'fas fa-caret-down',
    'caret-left' => 'fas fa-caret-left',
    'caret-right' => 'fas fa-caret-right',
    'caret-up' => 'fas fa-caret-up',
    'check' => 'fas fa-check',
    'chevron-down' => 'fas fa-chevron-down',
    'chevron-left' => 'fas fa-chevron-left',
    'chevron-right' => 'fas fa-chevron-right',
    'chevron-up' => 'fas fa-chevron-up',
    'cog' => 'fas fa-cog',
    'comment' => 'fas fa-comment',
    'edit-border' => 'far fa-edit',
    'edit' => 'fas fa-edit',
    'ellipsis-h' => 'fas fa-ellipsis-h',
    'ellipsis-v' => 'fas fa-ellipsis-v',
    'error-circle-border' => 'far fa-times-circle',
    'error-circle' => 'fas fa-times-circle',
    'error' => 'fas fa-times',
    'exclamation-circle' => 'fas fa-exclamation-circle',
    'exclamation-triangle' => 'fas fa-exclamation-triangle',
    'exclamation' => 'fas fa-exclamation',
    'face-sad' => 'fas fa-sad-tear',
    'face-smile' => 'fas fa-smile',
    'info-circle' => 'fas fa-info-circle',
    'info' => 'fas fa-info',
    'minus-circle' => 'fas fa-minus-circle',
    'minus-square-border' => 'far fa-minus-square',
    'minus-square' => 'fas fa-minus-square',
    'minus' => 'fas fa-minus',
    'pencil-square' => 'fas fa-pen-square',
    'pencil' => 'fas fa-pencil-alt',
    'plus-circle' => 'fas fa-plus-circle',
    'plus-square-border' => 'far fa-plus-square',
    'plus-square' => 'fas fa-plus-square',
    'plus' => 'fas fa-plus',
    'question-circle-border' => 'far fa-question-circle',
    'question-circle' => 'fas fa-question-circle',
    'question' => 'fas fa-question',
    'search' => 'fas fa-search',
    'trash-alt-border' => 'far fa-trash-alt',
    'trash-alt' => 'fas fa-trash-alt',
    'trash' => 'fas fa-trash',
    'undo-alt' => 'fas fa-undo-alt',
    'undo-alt' => 'fas fa-undo-alt',
    'undo' => 'fas fa-undo',
    'user-alt' => 'fas fa-user-alt',
    'user-border' => 'far fa-user',
    'user-circle-border' => 'far fa-user-circle',
    'user-circle' => 'fas fa-user-circle',
    'user' => 'fas fa-user',
    'users-two' => 'fas fa-user-friends',
    'users' => 'fas fa-users',
);

$sizes = array(
    'tiny'    => 'fa-xs',
    'small'   => 'fa-sm',
    'large'   => 'fa-lg',
    'big'     => 'fa-2x',
    'biggest' => 'fa-3x',
    'bigger'  => 'fa-5x',
    'jumbo'   => 'fa-7x',
);

$flips = array(
    'h' => 'fa-flip-horizontal',
    'v' => 'fa-flip-vertical',
    'b' => 'fa-flip-both',
);

$rotates = array(
    '90'  => 'fa-rotate-90',
    '180' => 'fa-rotate-180',
    '270' => 'fa-rotate-270',
);

$animates = array(
    'pulse' => 'fa-pulse',
    'spin'  => 'fa-spin',
);

$pulls = array(
    'pull-right' => 'fa-pull-right',
    'pull-left'  => 'fa-pull-left',
);

$icon = (object) array(
    'animate' => isset($animate) && array_key_exists($animate, $animates) ? $animates[$animate] : '',
    'border'  => isset($border) && is_bool($border) ? $border : '',
    'class'   => isset($icon) && array_key_exists($icon, $icons) ? $icons[$icon] : $icons['face-sad'],
    'color'   => isset($color) && is_string($color) ? $color : '',
    'flip'    => isset($flip) && array_key_exists($flip, $flips) ? $flips[$flip] : '',
    'pull'    => isset($pull) && array_key_exists($pull, $pulls) ? $pulls[$pull] : '',
    'rotate'  => isset($rotate) && array_key_exists($rotate, $rotates) ? $rotates[$rotate] : '',
    'size'    => isset($size) && array_key_exists($size, $sizes) ? $sizes[$size] : '',
);
?>

<span class="icon <?= $icon->color ?>">
    <i class="<?= $icon->class ?> <?= $icon->size ?> <?= $icon->rotate ?> <?= $icon->flip ?> <?= $icon->animate ?> <?= $icon->border ?>"></i>
</span>