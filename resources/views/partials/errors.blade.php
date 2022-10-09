@if( $errors->any() )
<div class="message is-danger">
	<div class="message-header">
		<b>Auch!! errores...</b>
		<span class="icon">
			<i class="fa fa-frown-o"></i>
		</span>
	</div>
	<div class="message-body">
		<ul>
			@foreach($errors->all() as $error) 
			<li>&bull; {{ $error }}</li>
			@endforeach
		</ul>
	</div>
</div>
@endif