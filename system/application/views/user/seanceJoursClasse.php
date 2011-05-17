<label for="form_seanceDebut"><span>بداية الحصـــة     :</span>
    &nbsp;
    <select id="form_seanceDebut" name="heureDebut">

        <?php
        foreach ($seances as $k1) {
            echo "<OPTION value='" . $k1->heure_debut . "'>";
            echo $k1->heure_debut;
            echo "</OPTION>";
        }
        ?>
    </select>

</label>
<label for="form_seanceFin"><span>نهاية الحصـــة     :</span>
    &nbsp;
    <select id="form_seanceFin" name="heureFin">

        <?php
        foreach ($seances as $k1) {
            echo "<OPTION value='" . $k1->heure_fin . "'>";
            echo $k1->heure_fin;
            echo "</OPTION>";
        }
        ?>
    </select>

</label>

