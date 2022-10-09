@if( $errors->any() )

<?php
$content = '<p style="margin-bottom:1rem"><b>Revisar nuevamente:</b></p>
            <ul>';
foreach($errors->all() as $error)
{
    $content .= "<li>- {$error}</li>";
}
$content .= '</ul>';
?>

@component('components.message', [
    'color' => 'warning',
    'content' => $content,
])
@endcomponent
<?php // 'header' => 'Revisar nuevamente', ?>

@endif

