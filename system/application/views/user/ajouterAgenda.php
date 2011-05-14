<?php echo $this->tinyMce; ?>
<script> 
	$(function() {
		$( "#datepicker" ).datepicker({
                            dateFormat: 'yy-mm-dd'
                });
                
                jQuery.datepicker.setDefaults(jQuery.datepicker.regional['fr']);
	});
        
</script>

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
            
            <select id="form_classe" name="classe">
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
        
        <div id="joursClasse"></div>
        <label for="form_dateseance"><span>تاريخ الحصة        :</span>
            &nbsp;
            <input type="text" id="datepicker" name="datepicker"></input>
        </label>
        
        
        <div id="heureSeance"></div>
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


<script language="Javascript">
$(document).ready(function() {
    $('#form_classe').change(function() {
 
        var my_data={
            id_classe : $('#form_classe').val()
            
        };
       
       
        $.ajax({
            url:"<?php echo site_url('user/ajaxsearchJours');?>",
            type:"POST",
            data:my_data,
            success: function(msg){
                $('#joursClasse').html(msg);
                
            }
            
        });
    });
    
});
</script>

