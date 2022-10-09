<?php // This view need this vars, paginationPrevious, paginationCurrent, paginationNext  ?>

<div class="buttons has-addons">
	<a class="button" href="{{ $paginationPrevious }}">
		<span class="icon">
			<i class="fa fa-caret-left"></i>
		</span>
	</a>

	<a class="button">
		<span>{{ $paginationCurrent }}</span>
	</a>
	
	<a class="button" href="{{ $paginationNext }}">
		<span class="icon">
			<i class="fa fa-caret-right"></i>
		</span>
	</a>
</div>

<?php /*  
<div class="pagination" role="navigation" aria-label="pagination">
	<a class="pagination-previous" href="{-- $paginationPrevious --}">
		<span class="icon">
			<i class="fa fa-caret-left"></i>
		</span>
	</a>
	<span class="pagination-previous">
		<b>{-- $paginationCurrent --}</b>
	</span>
  	<a class="pagination-next" href="{-- $paginationNext --}">
  		<span class="icon">
			<i class="fa fa-caret-right"></i>
		</span>
	</a>
  	<ul class="pagination-list"></ul>
</div>
*/ ?>