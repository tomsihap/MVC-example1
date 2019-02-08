<?php ob_start(); ?>

<h1>Voir un emprunteur</h1>
<form action="<?= url('emprunteurs/save') ?>" method="post">

    <input type="hidden" name="id" value="<?= isset($emprunteur) ? $emprunteur->id() : '' ?>">
    <input class="form-control" type="text" name="prenom" placeholder="prenom" value="<?= isset($emprunteur) ? $emprunteur->prenom() : '' ?>">
    <input class="form-control" type="text" name="nom" placeholder="nom" value="<?= isset($emprunteur) ? $emprunteur->nom() : '' ?>">

    <button class="btn btn-primary" type="submit">Editer un emprunteur</button>

    <?php if (isset($emprunteur)) : ?>
        <a href="<?= url('emprunteurs/delete/' . $emprunteur->id()) ?>" class="btn btn-danger delete" type="submit">Supprimer l'emprunteur</a>
    <?php endif; ?>

</form>

<?php $content = ob_get_clean(); ?>

<?php view('template', compact('content')); ?>