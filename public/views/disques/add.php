<?php ob_start(); ?>

<h1>Ajout d'un disque</h1>

<form action="<?= url('disques/save') ?>" method="post">

    <input class="form-control" type="text" name="titre" placeholder="titre">
    <input class="form-control" type="text" name="artiste" placeholder="artiste">

    <button class="btn btn-primary" type="submit">Créer un disque</button>

</form>


<?php $content = ob_get_clean(); ?>

<?php view('template', compact('content')); ?>