<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$infoUser = $this->session->userdata('InfoUser');
?>

<p class="erreur">
    <?php
    if ($this->session->userdata('opAgenda')) {
        echo $this->session->userdata('opAgenda');
        $this->session->set_userdata('opAgenda', null);
    }
    ?>
</p>

<table class="display" id="cahiertable" width="100%">
    <thead>
        <tr>
            <th  style="font-size: 12px;text-align:center; vertical-align: middle;">التاريخ</th>
            <th style="text-align:center; vertical-align: middle;">المحتوى</th>
            <th style="text-align:center; vertical-align: middle;">ملاحظات</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Row 1 Data 1</td>
            <td>Row 1 Data 2</td>
            <td>etc</td>
        </tr>
        <tr>
            <td>Row 2 Data 1</td>
            <td>Row 2 Data 2</td>
            <td>etc</td>
        </tr>
    </tbody>
</table>

<center>               
    <table width="90%" align="center" cellpadding="0" cellspacing="0" class="lire_bordure">
        <tr class="lire_cellule_4">
            <td>القسم</td>
            <td>التاريخ</td>
            <td>المحتوى</td>
            <td>ملاحظات</td>
        </tr>
        <?php
       // 
       // $agendaProf = $this->Cahier_model->getAgendaProf($infoUser['id']);
        //for ($t = 0; $t < count($agendaProf); $t++) {
            ?>
            <tr>
                <td><?php //echo $this->Classe_model->getClasseNom($agendaProf[$t]['id_classe']) ?></td>
                <td></td>
                <td></td>
                <td></td>                

            </tr>
            <?php
       //}
        ?>

    </table>
</center>
