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


<?php 
    $agendaProf = $this->Agenda_model->getAgendaProf($infoUser['id']);
    $config['base_url'] = base_url().'/user/page/';
    $config['total_rows'] = count($agendaProf)*60;
    $config['per_page'] = '20';
    $config['first_link'] = 'الأول';
    $config['last_link'] = 'الأخير';
    $this->pagination->initialize($config); 
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
        
        for($i=0;$i<25;$i++)
        {
        for ($t = 0; $t < count($agendaProf); $t++) {
            ?>
            <tr>
                <td><?php echo $this->Classe_model->getClasseNom($agendaProf[$t]['id_classe']) ?></td>
                <td><?php echo $agendaProf[$t]['jour']; ?></td>
                <td><?php echo $agendaProf[$t]['activite'] ?></td>
                <td><?php echo $agendaProf[$t]['remarque'] ?></td>                

            </tr>
            <?php
        }}
        
        ?>
    </tbody>
</table>
