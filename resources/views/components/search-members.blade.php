<?php

$settings = (object) array(
    'placeholder' => isset($placeholder) && is_string($placeholder) ? $placeholder : ''
);
?>

<form action="{{ route('members.search') }}" method="get" autocomplete="off">
    <div class="control is-expanded has-icons-right">
        <input type="search" class="input is-rounded is-small" name="value" placeholder="{{ $settings->placeholder }}">
        <span class="icon is-right">
            <i class="fas fa-search"></i>
        </span>
    </div>
</form>