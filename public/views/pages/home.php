<?php ob_start(); ?>

Bienvenue sur le site de prêts !

<?php $content = ob_get_clean(); ?>

<?php view('template', compact('content')); ?>