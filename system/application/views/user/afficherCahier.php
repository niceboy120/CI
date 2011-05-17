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
        //$this->session->set_userdata('opAgenda', null);
    }
    ?>
</p>


<?php 
     
    echo "<div align='center' direction='rtl'>".$this->pagination->create_links()."</div>"; 
?>
<table  id="mytable" width="100%" class="lire_bordure" >
    <thead>
        <tr >
            <th width="6%">القسم</th>
            <th width="10%">التاريخ</th>
            <th>المحتوى</th>
            <th width="15%">ملاحظات</th>
            <?php 
            if($this->session->userdata('isuser')==1)
            {
                echo "<th width='10%' colspan='2'>عمليات</th>";
            }
            ?>
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
                <?php 
                    if($this->session->userdata('isuser')==1)
                    {
                        echo "<td class='edit' width='5%'><a href='user/editAgenda/".$agendaProf[$t]['id']."'><img src='".base_url()."system/images/edit.gif'></img></a></td>";
                        echo "<td class='remove' width='5%'><a href='user/removeAgenda/".$agendaProf[$t]['id']."'><img src='".base_url()."system/images/remove.gif'></img></a></td>";
                    }
                ?>

            </tr>
            <?php
        }
        
        ?>
    </tbody>
</table>
