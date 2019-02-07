<?php ob_start(); ?>

<h1>Ajout d'un emprunteur</h1>

<form action="<?= url('emprunteurs/save') ?>" method="post">

    <input class="form-control" type="text" name="prenom" placeholder="prenom">
    <input class="form-control" type="text" name="nom" placeholder="nom">

    <button class="btn btn-primary" type="submit">Créer un emprunteur</button>

</form>


<?php $content = ob_get_clean(); ?>

<?php view('template', compact('content')); ?>