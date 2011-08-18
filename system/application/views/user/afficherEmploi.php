<center>
    <p class="erreur">
        <?php
        if ($this->session->userdata('opEmploi')) {
            echo $this->session->userdata('opEmploi');
            $this->session->set_userdata('opEmploi', null);
        }
        ?>
    </p>
    <p style="color: #993988; font-size: 2em; font-weight: bold;">المرجو الضغط على الحصة لتغييرها أو حذفها</p>
    <table width="90%" align="center" cellpadding="0" cellspacing="0" class="lire_bordure">
        <tr class="lire_cellule_4">
            <td ><div align="center"></div></td>
            <td >الإثنين</td>
            <td >الثلاثاء</td>
            <td >الأربعاء</td>
            <td >الخميس</td>
            <td >الجمعة</td>
            <td >السبت</td>
        </tr>
        <?php $tab[1] = 'الإثنين';
        $tab[2] = 'الثلاثاء';
        $tab[3] = 'الأربعاء';
        $tab[4] = 'الخميس';
        $tab[5] = 'الجمعة';
        $tab[6] = 'السبت';
        for ($x = 1; $x <= count($plage); $x++) { ?>
            <tr>
                <td bgcolor="#FFFFFF" class="detail"><div align="center"><?php echo $x; ?></div></td>
                    <?php for ($i = 1; $i < 7; $i++) { ?>
                    <td bgcolor="#FFFFFF" class="detail" ><?php
                $nb_cell = 0;
                for ($t = 0; $t < count($emploi); $t++) {
                    if (($emploi[$t]['jour_semaine'] == $tab[$i]) && ($emploi[$t]['id_plage'] == $x )) {
                        $nb_cell++;
                        $emploi[$t]['couleur_cellule'] = '#98fb98';
                        $emploi[$t]['couleur_police'] = '#000000';
                                ?>
                                <div onClick="MM_goToURL('window','<?php echo base_url(); ?>user/editEmploi/<?php echo $emploi[$t]['id']; ?>');return document.MM_returnValue" style="cursor:pointer">
                                    <?php
                                    echo '<style>.raised' . $x . $i . ' .top, .raised' . $x . $i . ' .bottom {display:block; background:transparent; font-size:1px;}
                                    .raised' . $x . $i . ' .b1, .raised' . $x . $i . ' .b2, .raised' . $x . $i . ' .b3, .raised' . $x . $i . ' .b4, .raised' . $x . $i . ' .b1b, .raised' . $x . $i . ' .b2b, .raised' . $x . $i . ' .b3b, .raised' . $x . $i . ' .b4b {display:block; overflow:hidden;}
                                    .raised' . $x . $i . ' .b1, .raised' . $x . $i . ' .b2, .raised' . $x . $i . ' .b3, .raised' . $x . $i . ' .b1b, .raised' . $x . $i . ' .b2b, .raised' . $x . $i . ' .b3b {height:1px;}
                                    .raised' . $x . $i . ' .b2 {background:' . $emploi[$t]['couleur_cellule'] . '; border-left:1px solid #fff; border-right:1px solid #eee;}
                                    .raised' . $x . $i . ' .b3 {background:' . $emploi[$t]['couleur_cellule'] . '; border-left:1px solid #fff; border-right:1px solid #ddd;}
                                    .raised' . $x . $i . ' .b4 {background:' . $emploi[$t]['couleur_cellule'] . '; border-left:1px solid #fff; border-right:1px solid #aaa;}
                                    .raised' . $x . $i . ' .b4b {background:' . $emploi[$t]['couleur_cellule'] . '; border-left:1px solid #eee; border-right:1px solid #999;}
                                    .raised' . $x . $i . ' .b3b {background:' . $emploi[$t]['couleur_cellule'] . '; border-left:1px solid #ddd; border-right:1px solid #999;}
                                    .raised' . $x . $i . ' .b2b {background:' . $emploi[$t]['couleur_cellule'] . '; border-left:1px solid #aaa; border-right:1px solid #999;}
                                    .raised' . $x . $i . ' .boxcontent {background:' . $emploi[$t]['couleur_cellule'] . ';}
                                    .raised' . $x . $i . ' .b1 {margin:0 5px; background:#fff;}
                                    .raised' . $x . $i . ' .b2, .raised' . $x . $i . ' .b2b {margin:0 3px; border-width:0 2px;}
                                    .raised' . $x . $i . ' .b3, .raised' . $x . $i . ' .b3b {margin:0 2px;}
                                    .raised' . $x . $i . ' .b4, .raised' . $x . $i . ' .b4b {height:2px; margin:0 1px;}
                                    .raised' . $x . $i . ' .b1b {margin:0 5px; background:#999;}
                                    .raised' . $x . $i . ' .boxcontent {display:block;  background:' . $emploi[$t]['couleur_cellule'] . '; border-left:1px solid #fff; border-right:1px solid #999;}

                                    </style>';
                                    echo '<div class="raised' . $x . $i . '" ><b class="top"><b class="b1"></b><b class="b2"></b><b class="b3"></b><b class="b4"></b></b><div class="boxcontent">';
                                    echo '<strong>&nbsp;' . $emploi[$t]['heure_debut'] . '</strong> - ' . $emploi[$t]['heure_fin'];
                                    echo '<br />&nbsp;<span style="color:' . $emploi[$t]['couleur_police'] . '">';
                                    echo '</span>';
                                    echo '&nbsp;' . $this->Classe_model->getClasseNom($emploi[$t]['id_classe']) . '<br /></div><b class="bottom"><b class="b4b"></b><b class="b3b"></b><b class="b2b"></b><b class="b1b"></b></b></div>';
                                }
                                ?></div><?php }
            } ?>    </td>

            </tr><?php } ?>

    </table>
</center>


<form  method="post" class="monForm" name="form1" action="<?php echo base_url(); ?>user/ajoutEmploi">
    <fieldset>
        <legend>إضافة حصة جديدة :</legend>

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
    </fieldset>
    <p>
        <input type="submit" name="submit" value="إضافة الحصة الدراسية"/>
    </p>
</form>
