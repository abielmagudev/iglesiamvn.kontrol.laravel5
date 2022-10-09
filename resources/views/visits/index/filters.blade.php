<div class="has-text-right">
    <form action="{{ route('visits.index') }}" method="get" class="is-inline-block">
        <div class="field">
            <div class="control">
                <div class="select">
                    <select name="filter" onchange="submit()">
                        <option value="all">Todos</option>
                        <option value="attended" {{ $filter !== 'attended' ?: 'selected' }}>Atendidas</option>
                        <option value="not-attended" {{ $filter !== 'not-attended' ?: 'selected' }}>No atendidas</option>
                    </select>
                </div>
            </div>
        </div>
    </form>
    <div class="is-inline-block">
        @include('partials.pagination-simple')
    </div>
</div>