<label for="form_jourA"><span>اليوم        :</span>
    &nbsp;
    <select id="form_jourA" name="jourA" >
        <OPTION value='none'>المرجو اختيار يوم الحصة....</OPTION>
        <?php foreach ($jours as $jour): ?>
            <OPTION value='<?php echo $jour->jour_semaine; ?>'><?php echo $jour->jour_semaine; ?></OPTION>
        <?php endforeach ?>
    </select>
</label>

<script type="text/javascript">
$(document).ready(function() {
    $('#form_jourA').change(function() {
 
        var my_data1={
            joursemaine : $('#form_jourA').val(),
            id_classe : $('#form_classeA').val()
            
        };
        //alert(my_data1['joursemaine']);
       
       
        $.ajax({
            url:"<?php echo site_url('user/ajaxsearchHeures');?>",
            type:"POST",
            data:my_data1,
            success: function(msg){
                $('#heureSeance').html(msg);
                
            }
            
        });
    });
});
</script>