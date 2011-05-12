<?php echo $this->tinyMce; ?>
<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<p class="erreur">
    <?php
    if ($this->session->userdata('opAgenda')) {
        echo $this->session->userdata('opAgenda');
        $this->session->set_userdata('opAgenda', null);
    }
    ?>
</p>
<form  method="post" class="monForm" name="form1" action="<?php echo base_url(); ?>user/ajoutAgenda">
    <fieldset>
        <legend>إضافة حصة جديدة في دفتر النصوص :</legend>

        <label for="form_class"><span>القسم        :</span>
            &nbsp;
            
            <select id="form_class" name="classe">
                <OPTION value='none'>المرجو اختيار القسم....</OPTION>
                <?php
                foreach ($classesProf as $k1) {
                    echo "<OPTION value='" . $k1->id_classe . "'>";
                    echo $this->Classe_model->getClasseNom($k1->id_classe);
                    echo "</OPTION>";
                    
                }
                ?>
            </select>
        </label>
        <label for="form_jour"><span>اليوم        :</span>
            &nbsp;
            <select id="form_jour" name="jour">
                <?php
                $tab[1] = 'الإثنين';
                $tab[2] = 'الثلاثاء';
                $tab[3] = 'الأربعاء';
                $tab[4] = 'الخميس';
                $tab[5] = 'الجمعة';
                $tab[6] = 'السبت';

                for ($j = 1; $j < 7; $j++) {
                    echo "<OPTION value='" . $tab[$j] . "'>";
                    echo $tab[$j];
                    echo "</OPTION>";
                }
                ?>
            </select>
        </label>
        <label for="form_seance"><span>بداية الحصـــة     :</span>
            &nbsp;
            <select id="form_seance" name="heureDebut">

                <?php
                foreach ($plage as $k1 => $list) {
                    $heure_debut = $list['h1'] . "H" . $list['mn1'] . "mn";
                    echo "<OPTION value='" . $heure_debut . "'>";
                    echo $heure_debut;
                    echo "</OPTION>";
                }
                ?>
            </select>

        </label>
        <label for="form_seance"><span>نهاية الحصـــة     :</span>
            &nbsp;
            <select id="form_seance" name="heureFin">

                <?php
                foreach ($plage as $k1 => $list) {
                    $heure_fin = $list['h2'] . "H" . $list['mn2'] . "mn";
                    echo "<OPTION value='" . $heure_fin . "'>";
                    echo $heure_fin;
                    echo "</OPTION>";
                }
                ?>
            </select>

        </label>
        <label for="form_titreActivite"><span>عنوان الحصة:</span>
            &nbsp;
            <input type="text" id="titreActivite" name="titreActivite"></input>
        </label>
        <label for="form_typeActivite"><span>نوع الحصة:</span>
            &nbsp;
            <select id="form_typeActivite" name="idtypeActivite">

                <?php
                foreach ($typeactivite as $k1 => $list) {
                    echo "<OPTION value='   " . $list['id'] . "'>";
                    echo $list['nom'];
                    echo "</OPTION>";
                }
                ?>
            </select>
        </label>
        <label for="form_activite"><span>المحتوى:</span>
            &nbsp;

        </label>
        <div align="center"><textarea id="activite" name="activite" style="width:98%;"></textarea></div>
        <label for="form_travailAfaire"><span>عمل للإنجاز في المنزل :</span>
            &nbsp;

        </label>
        <div align="center"><textarea id="travailAfaire" name="travailAfaire" style="width:98%;"></textarea></div>
    
    <label for="form_remarque"><span>ملاحظات عامة:</span>
        &nbsp;

    </label>
    <div align="center"><textarea id="remarque" name="remarque" style="width:98%;"></textarea></div>
</fieldset>
<p>
    <input type="submit" name="submit" value="إضافة الحصة"/>
</p>
</form>