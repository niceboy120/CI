<label for="form_seance"><span>بداية الحصـــة     :</span>
    &nbsp;
    <select id="form_seance" name="heureDebut">

        <?php
        foreach ($seances as $k1) {
            echo "<OPTION value='" . $k1->heure_debut . "'>";
            echo $k1->heure_debut;
            echo "</OPTION>";
        }
        ?>
    </select>

</label>
<label for="form_seance"><span>نهاية الحصـــة     :</span>
    &nbsp;
    <select id="form_seance" name="heureFin">

        <?php
        foreach ($seance as $k1) {
            echo "<OPTION value='" . $k1->heure_fin . "'>";
            echo $k1->heure_fin;
            echo "</OPTION>";
        }
        ?>
    </select>

</label>