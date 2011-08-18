<?php include "header.php" ; ?>
<div id="content-wrap">

<!-- ici commence le contenu -->
<div id="sidebar">

	<p>دفتر النصوص الإلكتروني هو مشروع للأستاذ يونس بوطيور يهدف من خلاله المساهمة في تحسين جودة التعلمات و التعلم من خلال مد جميع الأطراف المتدخلة في العملية التربوية ببوابة معلوماتية لتفقد الواجبات المنزلية للتلاميذ من طرف الاباء و كذلك تتبع ما أنجز داخل الفصل من طرف المؤطرين التربويين.</p>
</div>

<div id="main">

		   <form class="monForm" action= "<?php echo base_url(); ?>cahier/index" method='post'>
            <fieldset>
              <legend>المواد الخاصة بالقسم :
              </legend>


				<label for="form_class"><span>المــادة :</span>
                &nbsp;&nbsp;
                 
              <select id="form_class" name="matiere">
                      <?php
                            
                             foreach($matieres['m'] as $k1 => $list){
				echo "<OPTION>";
				 echo ($list->nom);
                                 echo "</OPTION>";
                                 //print_r($list[$i]->nom);
                                
                                 
                                 //print_r( $matieres['m']);
                                 
                                }
                       ?>
                 </select> 

				</label>

               <p align='center'><strong>من فضلك، اختر المادة</strong></p>
               <p align='center'><a href="<?php echo base_url(); ?>classe"><strong>العودة لاختيار قسم اخـر</strong></a></p>
              </fieldset>
              <p><input type="submit" name="consulter" value="تأكيد"/> </p>
</form>

</div>

<!-- ici se termine le contenu -->

</div>
<?php include "footer.php"; ?>
