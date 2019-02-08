<?php ob_start(); ?>

<h1>Voir un disque</h1>
<form action="<?= url('disques/save') ?>" method="post">

    <input type="hidden" name="id" value="<?= isset($disque) ? $disque->id() : '' ?>">
    <input class="form-control" type="text" name="titre" placeholder="titre" value="<?= isset($disque) ? $disque->titre() : '' ?>">
    <input class="form-control" type="text" name="artiste" placeholder="artiste" value="<?= isset($disque) ? $disque->artiste() : '' ?>">

    <button class="btn btn-primary" type="submit">Editer un disque</button>

    <?php if (isset($disque)) : ?>
        <a href="<?= url('disques/delete/' . $disque->id()) ?>" class="btn btn-danger delete" type="submit">Supprimer le disque</a>
    <?php endif; ?>
    

</form>


<?php $content = ob_get_clean(); ?>

<?php view('template', compact('content')); ?>