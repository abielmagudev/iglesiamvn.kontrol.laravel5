<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
@if( env('APP_DEBUG') )
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="{{ asset('scripts/kontrol.js') }}"></script>
<script src="{{ asset('scripts/bulma.js') }}"></script>
@else
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script src="{{ asset('scripts/kontrol.min.js') }}"></script>
<script src="{{ asset('scripts/bulma.min.js') }}"></script>
@endif
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
<?php
// app()->environment('production') 
// env('APP_DEBUG')
// config('app.debug')
?>