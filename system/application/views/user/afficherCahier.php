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
            <th>القسم</th>
            <th>التاريخ</th>
            <th>المحتوى</th>
            <th>ملاحظات</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // 
        
        for ($t = 0; $t < count($agendaProf); $t++) {
            ?>
            <tr>
                <td><?php echo $this->Classe_model->getClasseNom($agendaProf[$t]['id_classe']) ?></td>
                <td><?php echo $agendaProf[$t]['jour']; ?></td>
                <td><?php echo $agendaProf[$t]['activite'] ?></td>
                <td><?php echo $agendaProf[$t]['remarque'] ?></td>                

            </tr>
            <?php
        }
        
        ?>
    </tbody>
</table>
