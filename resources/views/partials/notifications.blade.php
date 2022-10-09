<?php

$notification = false;

foreach(['info','success','warning','danger'] as $item)
{
   if(! session()->has($item) )
      continue;

   $notification = (object) array(
      'color' => $item,
      'content'  => session($item),
   );
   break; 
}

?>

@if( is_object($notification) )
   @component('components.notification', [
      'color' => $notification->color,
      'content'  => $notification->content,
   ])
   @endcomponent
@endif