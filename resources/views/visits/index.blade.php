<?php
$attended_color = '#E6FFEC';
$not_attended_color = '#FFFBEB';
?>
@extends('main')
@section('title', 'Visitas')
@section('content')
@include('visits.index.filters')
<br>
<div class="card">
	<div class="card-header is-shadowless">
		<div class="card-header-title subtitle"> 
			<span>Visitas</span>&nbsp;
			<span class="tag is-primary">{{ $visits->count() }}</span>&nbsp;
			<span class="tag" style="background-color:{{ $attended_color }}">{{ $visits->where('attended', 1)->count() }}</span>&nbsp;
			<span class="tag" style="background-color:{{ $not_attended_color }}">{{ $visits->where('attended', 0)->count() }}</span>
		</div>
		<div class="card-header-icon">
			<a href="{{ route('visits.create') }}" class="button is-link is-small">Nueva visita</a>
		</div>
	</div>
	<div class="card-content" style="padding:0">
		<small class="table-container">
			<table class="table is-hoverable is-fullwidth">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Fecha</th>
						<th colspan="2">Notas</th>
					</tr>
				</thead>
				<tbody>
					@foreach($visits_filtered as $visit)
					<tr style="background-color:{{ $visit->attended ? '#E6FFEC' : '#FFFBEB' }}">
						<td style="white-space:nowrap;width:1%">{{ $visit->fullname }}</td>
						<td style="white-space:nowrap">{{ $visit->visited_at->format('l d M, Y') }}</td>
						<td>
							<em>{{ $visit->notes }}</em>
						</td>
						<td style="white-space:nowrap">
							<a href="{{ route('visits.edit', $visit) }}" class="button is-warning is-small">
								@component('components.icon', [
									'icon' => 'pencil'
								])
								@endcomponent
							</a>
							<a href="{{ route('visits.delete', $visit) }}" class="button is-danger is-small">
								@component('components.icon', [
									'icon' => 'minus'
								])
								@endcomponent
							</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</small>
	</div>
</div>
<br>
@include('visits.index.filters')
@endsection