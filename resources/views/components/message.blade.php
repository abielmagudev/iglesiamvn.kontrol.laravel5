<?php

$message = (object) array(
  'color' => isset($color) ? $color : 'primary',
  'header' => isset($header) && is_string($header) ? $header : false,
  'close' => isset($close) && is_bool($close) ? $close : false,
  'content' => isset($content) && is_string($content) ? $content : '...',
);

?>

<article class="message is-{{ $message->color }}">
  @if( $message->header )
  <div class="message-header">
    <p>{{ $message->header }}</p>
    @if( $message->close )
    <button class="delete" aria-label="delete"></button>
    @endif
  </div>
  @endif
  <div class="message-body">
    <?= $message->content ?>
  </div>
</article>