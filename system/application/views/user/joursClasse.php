<label for="form_jour"><span>اليوم        :</span>
    &nbsp;
    <select id="form_jour" name="jour">
        <OPTION value='none'>المرجو اختيار يوم الحصة....</OPTION>
        <?php foreach ($jours as $jour): ?>
            <OPTION value='<?php echo $jour->jour_semaine; ?>'><?php echo $jour->jour_semaine; ?></OPTION>
        <?php endforeach ?>
    </select>
</label>