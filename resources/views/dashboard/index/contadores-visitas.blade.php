<?php
$visits_count = $visits->count();
$attended_count = $visits->where('attended', 1)->count();
$not_attended_count = $visits->where('attended', 0)->count();
?>
<div class="card">
    <div class="card-header">
        <div class="card-header-title">
            <span class="tag is-dark">{{ $visits_count }}</span>
            <span class='ml-3'>Visitas</span>
        </div>
    </div>
    <div class="card-content">
        <div>
            <p class='mb-2'>
                <span class="tag is-success">{{ $attended_count }}</span>
                <span class='ml-2'>Atendidas</span>
            </p>
            <progress class="progress is-success" value="{{ $attended_count }}" max="{{ $visits_count }}">{{ $attended_count }}%</progress>
        </div>
        <br>
        <div>
            <p class='mb-2'>
                <span class="tag is-warning">{{ $not_attended_count }}</span>
                <span class='ml-2'>No atendidas</span>
            </p>
            <progress class="progress is-warning" value="{{ $not_attended_count }}" max="{{ $visits_count }}">{{ $not_attended_count }}%</progress>
        </div>
    </div>
</div>
<br>
