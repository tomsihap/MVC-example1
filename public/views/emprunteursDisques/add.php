<?php ob_start(); ?>

<h1>Ajout d'un prêt</h1>

<form action="<?= url('prets/save') ?>" method="post">

    <select class="form-control" name="id_emprunteur" id="">
        <?php foreach($emprunteurs as $e) : ?>
            <option value="<?= $e->id() ?>"><?= $e->prenom() ?> <?= $e->nom() ?></option>
        <?php endforeach; ?>
    </select>

    <select class="form-control" name="id_disque" id="">
        <?php foreach($disques as $d) : ?>
            <option value="<?= $d->id() ?>"><?= $d->artiste() ?> - <?= $d->titre() ?></option>
        <?php endforeach; ?>
    </select>


    <button class="btn btn-primary" type="submit">Créer un prêt</button>

</form>


<?php $content = ob_get_clean(); ?>

<?php view('template', compact('content')); ?>