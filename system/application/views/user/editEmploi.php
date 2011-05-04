<?php include "header1.php" ; ?>
<div id="content-wrap">

<!-- ici commence le contenu -->


<div id="main">				          
          
    <p align="center" style="font-size: 20px; color: #9000CC">تعديل معلومات الحصة</p>


    <form id="formID" class="monForm" action="<?php echo base_url(); ?>user/editE" method="post">
              <fieldset>    
                <legend>تعديل معلومات الحصة :
                </legend> 
		
                <p>
                <label for="id">
                <input type="hidden" name="id" value="<?php
                echo $id_emploi;
                ?>" >
                </label>
                </p>
                <label for="form_class"><span>القسم        :</span>
                &nbsp;
                <select id="form_class" name="classe">
                       <?php
					foreach($classes as $k1 => $list){
						   echo "<OPTION value='".$list['id']."'>";
						   echo $list['nom'];
						   echo "</OPTION>";
					   }
					   ?>
                </select>
                </label>
                <label for="form_jour"><span>اليوم        :</span>
                &nbsp;
                <?php $tab[1]='الإثنين';$tab[2]='الثلاثاء';$tab[3]='الأربعاء';$tab[4]='الخميس';$tab[5]='الجمعة';$tab[6]='السبت';
                ?>
                <select id="form_jour" name="jour">
                       <?php
					for($j=1;$j<7;$j++){
						   echo "<OPTION value='".$tab[$j]."'>";
						   echo $tab[$j];
						   echo "</OPTION>";
					   }
					   ?>
                </select>
                </label>
                <label for="form_seance"><span>الحصـــة     :</span>
                &nbsp;
                <select id="form_seance" name="seance">

                     <?php
			foreach($plage as $k1 => $list){
                            $heure_debut=$list['h1']."H".$list['mn1']."mn";
                            $heure_fin=$list['h2']."H".$list['mn2']."mn";
			   echo "<OPTION value='".$list['id']."'>";
			   echo "من ".$heure_debut." إلى ".$heure_fin;
			   echo "</OPTION>";
			}
			?>
                </select>

		</label>
                               				
                </fieldset>         
                <p>        
                  <input class="submit" type="submit" name="submit" value="تأكيد">
                </p>
                
          </form>
    <form id="formID" class="monForm" action="<?php echo base_url(); ?>user/removeEmploi/<?php
                echo $id_emploi;
                ?>" method="post">
        <label for="id">
                <input type="hidden" name="id" value="<?php
                echo $id_emploi;
                ?>" >
        </label>
        <p><input class="submit" type="submit" name="submit" value="حذف الحصة"></p>
        <p><?php echo anchor('user', 'العودة إلى صفحة التدبير');?></p>
    </form>
</div>

<!-- ici se termine le contenu -->

</div>
<?php include "footer.php"; ?>