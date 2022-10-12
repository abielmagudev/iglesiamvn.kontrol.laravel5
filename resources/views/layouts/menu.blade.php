<?php $list = config('kontrol.menu') ?>
<aside class="menu">
    <ul class="menu-list">
        @foreach($list as $item)
        <li>
            <a href="{{ route($item['route']) }}" class="{{ isRoute($item['route']) ? 'is-active' : '' }}">{{ $item['label'] }}</a>
        </li>
        @endforeach
    </ul>
</aside>