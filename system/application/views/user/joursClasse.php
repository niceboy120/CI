<label for="form_jour"><span>اليوم        :</span>
    &nbsp;
    <select id="form_jour" name="jour">
        <?php foreach ($jours as $jour): ?>
            <OPTION<?= $jour->nom ?>><?= $jour->nom?></OPTION>
        <?php endforeach ?>
    </select>
</label>