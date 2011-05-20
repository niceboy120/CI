<?php include "header1.php"; ?>
<div id="content-wrap">

    <!-- ici commence le contenu -->


    <div id="main">

        <div id="tabs">
            <ul>
                <li><a href="#tabs-1">تدبير مستعملي الموقع </a></li>
                <li><a href="#tabs-2">تدبير الأقسام</a></li>
                <li><a href="#tabs-3">تدبير المواد</a></li>
                <li><a href="#tabs-4">تدبير الأنشطة</a></li>
                <li><a href="#tabs-5">تدبير جداول الحصص</a></li>
            </ul>
            <div id="tabs-1">
                <p>
                <p class="erreur">
                    <?php
                    if ($this->session->userdata('opUser')) {
                        echo $this->session->userdata('opUser');
                        $this->session->set_userdata('opUser', null);
                    }
                    ?>
                </p>
                <li><?php echo anchor('admin/ajouterUser', 'إضافة مستعمل جديد'); ?></li>
                </p>
                <center>
                    <table id="users">
                        <tr>
                            <th>الرقم</th>
                            <th>الإسم العائلي</th>
                            <th>الإسم الشخصي</th>
                            <th>اسم الدخول</th>
                            <th>البريد الإلكتروني</th>
                            <th>المادة </th>
                            <th>الصلاحيات</th>
                            <th colspan="2">العمليات</th>
                        </tr>
                        <?php
                        $fct = array(1 => 'مدير موقع', 0 => 'أستاذ');
                        foreach ($users as $k1 => $list) {
                            echo "<tr>";
                            echo "<td>" . $list['id'] . "</td>";
                            echo "<td>" . $list['nom'] . "</td>";
                            echo "<td>" . $list['prenom'] . "</td>";
                            echo "<td>" . $list['identite'] . "</td>";
                            echo "<td>" . $list['email'] . "</td>";
                            echo "<td>" . $this->Matiere_model->getMatiereByID($list['id_matiere'])->nom . "</td>";
                            echo "<td>" . $fct[$list['is_admin']] . "</td>";
                            echo "<td class='edit'><a href='admin/editU/" . $list['id'] . "'><img src='" . base_url() . "system/images/edit.gif'></img></a></td>";
                            echo "<td class='remove'><a href='admin/removeUser/" . $list['id'] . "'><img src='" . base_url() . "system/images/remove.gif'></img></a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </table></center>
            </div>
            <div id="tabs-2">
                <p>
                <p class="erreur">
                    <?php
                    if ($this->session->userdata('opClasse')) {
                        echo $this->session->userdata('opClasse');
                        $this->session->set_userdata('opClasse', null);
                    }
                    ?>
                </p>
                <li><?php echo anchor('admin/ajouterClasse', 'إضافة قسم جديد'); ?></li>
                </p>
                <center>
                    <table id="users">
                        <tr>
                            <th>الرقم</th>
                            <th>الإسم </th>
                            <th colspan="2">العمليات</th>
                        </tr>
                        <?php
                        foreach ($cla as $k1 => $list) {
                            echo "<tr>";
                            echo "<td>" . $list['id'] . "</td>";
                            echo "<td>" . $list['nom'] . "</td>";
                            echo "<td class='edit'><a href='admin/editC/" . $list['id'] . "'><img src='" . base_url() . "system/images/edit.gif'></img></a></td>";
                            echo "<td class='remove'><a href='admin/removeClasse/" . $list['id'] . "'><img src='" . base_url() . "system/images/remove.gif'></img></a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </table></center>
            </div>
            <div id="tabs-3">
                <p>
                <p class="erreur">
                    <?php
                    if ($this->session->userdata('opMat')) {
                        echo $this->session->userdata('opMat');
                        $this->session->set_userdata('opMat', null);
                    }
                    ?>
                </p>

                <li><?php echo anchor('admin/ajouterMatiere', 'إضافة مادة جديدة'); ?></li>
                </p>
                <center>
                    <table id="users">
                        <tr>
                            <th>الرقم</th>
                            <th>الإسم </th>
                            <th colspan="2">العمليات</th>
                        </tr>
                        <?php
                        foreach ($mat as $k1 => $list) {
                            echo "<tr>";
                            echo "<td>" . $list['id'] . "</td>";
                            echo "<td>" . $list['nom'] . "</td>";
                            echo "<td class='edit'><a href='admin/editM/" . $list['id'] . "'><img src='" . base_url() . "system/images/edit.gif'></img></a></td>";
                            echo "<td class='remove'><a href='admin/removeMatiere/" . $list['id'] . "'><img src='" . base_url() . "system/images/remove.gif'></img></a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </table></center>
            </div>

            <div id="tabs-4">

            </div>

            <div id="tabs-5">
                <p>
                <p class="erreur">
<?php
if ($this->session->userdata('opEmploi')) {
    echo $this->session->userdata('opEmploi');
    $this->session->set_userdata('opEmploi', null);
}
?>
                </p>

                <li><?php echo anchor('admin/ajouterEmploi', 'إضافة جدول حصص'); ?></li>
                </p>
                <center>
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
for ($x = 1; $x < 10; $x++) { ?>
                            <tr>
                                <td bgcolor="#FFFFFF" class="detail"><div align="center"><?php echo $x; ?></div></td>
    <?php for ($i = 1; $i < 7; $i++) { ?>

                                </tr><?php }
} ?>

                    </table>
                </center>
            </div>
        </div>
        <p  class="Style741"><?php echo anchor('user/logout', 'الخروج'); ?></p>


    </div>

    <!-- ici se termine le contenu -->

</div>
<?php include "footer.php"; ?>
