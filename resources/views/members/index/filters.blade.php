<form class="is-inline-block" method="get">
    <div class="select">
        <?php $filters = array(
            'todos' => 'Todos',
            'activos' => 'Solo activos',
            'inactivos' => 'Solo inactivos',
        ) ?>
        <select name="filter" onchange="submit()">
            @foreach($filters as $value => $label)
            <option value="{{ $value }}" {{ request()->has('filter') && request('filter') === $value ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>
    </div>
</form>
<div class="is-inline-block">
    @include('partials.pagination-simple')
</div>