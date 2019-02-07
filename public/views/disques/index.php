<?php ob_start(); ?>

<h1>Liste des disques</h1>
<a href="<?=url('/disques/add')?>">Ajouter</a>
<ul>

<?php foreach($disques as $disque) : ?>

    <li><a href="<?= url('disques/' . $disque->id()); ?>"><?= $disque->artiste() ?>: <?= $disque->titre() ?></a></li>

<?php endforeach; ?>

</ul>

<?php $content = ob_get_clean(); ?>
<?php view('template', compact('content')); ?>