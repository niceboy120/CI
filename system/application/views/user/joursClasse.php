<label for="form_jour"><span>اليوم        :</span>
    &nbsp;
    <select id="form_jour" name="jour" >
        <OPTION value='none'>المرجو اختيار يوم الحصة....</OPTION>
        <?php foreach ($jours as $jour): ?>
            <OPTION value='<?php echo $jour->jour_semaine; ?>'><?php echo $jour->jour_semaine; ?></OPTION>
        <?php endforeach ?>
    </select>
</label>

<script language="Javascript">
$(document).ready(function() {
    $('#form_jour').change(function() {
 
        var my_data1={
            joursemaine : $('#form_jour').val(),
            id_classe : $('#form_classe').val()
            
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