<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$infoUser = $this->session->userdata('InfoUser');
?>



<?php 
     
    echo "<div align='center' direction='rtl'>".$this->pagination->create_links()."</div>"; 
?>
<table  id="mytable" width="100%" class="lire_bordure" >
    <thead>
        <tr >
            <th width="6%">القسم</th>
            <th width="10%">التاريخ</th>
            <th width="64%">المحتوى</th>
            <th width="20%">ملاحظات</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // 
        
        for ($t = 0; $t < count($agendaProf); $t++) {
            ?>
            <tr>
                <td align="center"><?php echo $this->Classe_model->getClasseNom($agendaProf[$t]['id_classe']) ?></td>
                <td align="center"><?php echo nomDate($agendaProf[$t]['jour'])."<br />". $agendaProf[$t]['jour']; ?><br /><span>من <br /><?php echo $agendaProf[$t]['heureDebut']."<br />";?>  إلى<?php echo "<br />".$agendaProf[$t]['heureFin'];?>  </span></td>
                <td><?php echo $agendaProf[$t]['activite'] ?></td>
                <td><?php echo $agendaProf[$t]['remarque'] ?></td>                

            </tr>
            <?php
        }
        
        ?>
    </tbody>
</table>
