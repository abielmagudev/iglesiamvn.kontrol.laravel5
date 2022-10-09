<?php

$settings = (object) array(
   'content' => isset($content) ? $content : '',
   'submit_label' => isset($submit_label) ? $submit_label : 'Si, continuar',
   'submit_route' => isset($submit_route) ? $submit_route : '#!',
   'cancel_label' => isset($cancel_label) ? $cancel_label : 'Cancelar',
   'cancel_route' => isset($cancel_route) ? $cancel_route : '#!',
);

?>

<div class="box has-text-centered">
   <div>
      @component('components.icon', [
         'icon' => 'exclamation-circle',
         'color' => 'has-text-danger',
         'size' => 'jumbo'
      ])
      @endcomponent
   </div>
   <br>

   <div>
      <p style="margin-bottom:0.33rem"><?= $settings->content ?></p>
      <p class="subtitle">...deseas continuar?</p>
   </div>
   <br>
   <br>

   <form action="<?= $settings->submit_route ?>" method="post">
      {{ csrf_field() }}
      {{ method_field('delete') }}
      <?= isset($inputs) ? $inputs : '' ?>
      <a href="<?= $settings->cancel_route ?>" class="button is-link"><?= $settings->cancel_label ?></a>
      <button type="submit" class="button is-danger is-outlined is-borderless"><?= $settings->submit_label ?></button>
   </form>
</div>
