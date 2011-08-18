<?php include "header1.php" ; ?>
<div id="content-wrap">

<!-- ici commence le contenu -->


<div id="main">				          
          
    <p align="center" style="font-size: 20px; color: #9000CC">إضافة مادة جديدة  </p>


    <form id="formID" class="monForm" action="<?php echo base_url(); ?>admin/creerMatiere" method="post">
              <fieldset>    
                <legend>إضافة مادة جديدة :
                </legend> 
		
                <p><label for="nom"><span>اسم المادة :</span>
                &nbsp;&nbsp;           
                <input type="input" name="nom">
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