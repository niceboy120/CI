
<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<form  method="post" class="monForm" name="form1" action="<?php echo base_url(); ?>user/ajoutAgenda">
    <fieldset>
        <legend>إضافة حصة جديدة في دفتر النصوص :</legend>

        <label for="form_class"><span>القسم        :</span>
            &nbsp;
            <select id="form_class" name="classe">
                <?php
                foreach ($classes as $k1 => $list) {
                    echo "<OPTION value='" . $list['id'] . "'>";
                    echo $list['nom'];
                    echo "</OPTION>";
                }
                ?>
            </select>
        </label>
        <label for="form_jour"><span>اليوم        :</span>
            &nbsp;
            <select id="form_jour" name="jour">
                <?php
                $tab[1] = 'الإثنين'; $tab[2] = 'الثلاثاء';$tab[3] = 'الأربعاء'; $tab[4] = 'الخميس'; $tab[5] = 'الجمعة'; $tab[6] = 'السبت';
                
                for ($j = 1; $j < 7; $j++) {
                    echo "<OPTION value='" . $tab[$j] . "'>";
                    echo $tab[$j];
                    echo "</OPTION>";
                }
                ?>
            </select>
        </label>
        <label for="form_seance"><span>الحصـــة     :</span>
            &nbsp;
            <select id="form_seance" name="seance">

                <?php
                foreach ($plage as $k1 => $list) {
                    $heure_debut = $list['h1'] . "H" . $list['mn1'] . "mn";
                    $heure_fin = $list['h2'] . "H" . $list['mn2'] . "mn";
                    echo "<OPTION value='" . $list['id'] . "'>";
                    echo "من " . $heure_debut . " إلى " . $heure_fin;
                    echo "</OPTION>";
                }
                ?>
            </select>

        </label>
        <label for="form_titreActivite"><span>عنوان الحصة:</span>
            &nbsp;
            <input type="text" id="titreActivite"></input>
        </label>
        <label for="form_typeActivite"><span>نوع الحصة:</span>
            &nbsp;
             <select id="form_typeActivite" name="typeActivite">

                <?php
                foreach ($typeActivite as $k1 => $list) {
                    echo "<OPTION value='" . $list['nom'] . "'>";
                    echo "</OPTION>";
                }
                ?>
            </select>
        </label>
        <label for="form_activite"><span>المحتوى:</span>
            &nbsp;
        </label>
        <br />
            <textarea id="activite"  style="width:98%"></textarea>
    </fieldset>
    <p>
        <input type="submit" name="submit" value="إضافة الحصة"/>
    </p>
</form>