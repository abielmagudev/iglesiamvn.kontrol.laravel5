<?php
$visits_count = $visits->count();
$attended_count = $visits->where('attended', 1)->count();
$not_attended_count = $visits->where('attended', 0)->count();
?>
<div class="box">
    <p class="heading has-text-weight-bold"><span class="tag is-light is-rounded">{{ $visits_count }}</span> Visitas</p>
    <br>
    <div class="heading"><span class="tag is-success is-rounded">{{ $attended_count }}</span> Atendidas</div>
    <progress class="progress is-success" value="{{ $attended_count }}" max="{{ $visits_count }}">{{ $attended_count }}%</progress>
    <p></p>
    <div class="heading"><span class="tag is-warning is-rounded">{{ $not_attended_count }}</span> No atendidas</div>
    <progress class="progress is-warning" value="{{ $not_attended_count }}" max="{{ $visits_count }}">{{ $not_attended_count }}%</progress>
</div>
