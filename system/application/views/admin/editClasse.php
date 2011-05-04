<?php include "header1.php" ; ?>
<div id="content-wrap">

<!-- ici commence le contenu -->


<div id="main">				          
          
    <p align="center" style="font-size: 20px; color: #9000CC">تعديل معلومات المستعمل </p>


    <form id="formID" class="monForm" action="<?php echo base_url(); ?>admin/editClasse" method="post">
              <fieldset>    
                <legend>تعديل معلومات القسم :
                </legend> 
		
                <p>
                <label for="id">
                <input type="hidden" name="id" value="<?php
                echo $cla->id;
                ?>" >
                </label>
                </p>
                  <p><label for="nom"><span>إسم القسم  :</span>
                &nbsp;&nbsp;           
                <input type="input" name="nom" value="<?php
                echo $cla->nom;
                ?> ">
                </label></p> 
                
                               				
                </fieldset>         
                <p>        
                  <input class="submit" type="submit" name="submit" value="تأكيد">
                </p>
                <p><?php echo anchor('admin', 'العودة إلى صفحة التدبير');?></p>
          </form>
    
</div>

<!-- ici se termine le contenu -->

</div>
<?php include "footer.php"; ?>