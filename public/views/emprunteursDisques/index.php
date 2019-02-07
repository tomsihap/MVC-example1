<?php ob_start(); ?>

<h1>Liste des prêts</h1>
<a href="<?=url('/prets/add')?>">Ajouter</a>
<ul>

<?php foreach($prets as $pret) : ?>

    <li>
    <?= $pret->disque()->artiste() ?> (<?= $pret->disque()->titre() ?>) - <?= $pret->emprunteur()->prenom() ?> <?= $pret->emprunteur()->nom() ?> (<a href="<?=url('/prets/delete/' . $pret->id())?>">supprimer</a>)</li>

<?php endforeach; ?>

</ul>

<?php $content = ob_get_clean(); ?>
<?php view('template', compact('content')); ?>