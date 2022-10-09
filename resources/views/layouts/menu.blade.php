<?php $list = config('kontrol.menu') ?>
<aside class="menu">
    <ul class="menu-list">
        @foreach($list as $item)
        <li>
            <a href="{{ route($item['route']) }}" class="{{ isRoute($item['route']) ? 'is-active' : '' }}">{{ $item['label'] }}</a>
            @if( isRoute($item['route']) && isset($item['submenu']) )
            <ul>
                @foreach($item['submenu'] as $subitem)
                <li>
                    <a href="{{ route($subitem['route']) }}">{{ $subitem['label'] }}</a>
                </li>
                @endforeach
            </ul>
            @endif
        </li>
        @endforeach
    </ul>
</aside>