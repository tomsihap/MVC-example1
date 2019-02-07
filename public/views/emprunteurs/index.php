<?php ob_start(); ?>

<h1>Liste des emprunteurs</h1>
<a href="<?=url('/emprunteurs/add')?>">Ajouter</a>

<ul>

<?php foreach($emprunteurs as $emprunteur) : ?>

    <li><?= $emprunteur->prenom() ?> <?= $emprunteur->nom() ?></li>

<?php endforeach; ?>

</ul>

<?php $content = ob_get_clean(); ?>
<?php view('template', compact('content')); ?>