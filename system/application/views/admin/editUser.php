<?php include "header1.php" ; ?>
<div id="content-wrap">

<!-- ici commence le contenu -->


<div id="main">				          
          
    <p align="center" style="font-size: 20px; color: #9000CC">تعديل معلومات المستعمل </p>


    <form id="formID" class="monForm" action="<?php echo base_url(); ?>admin/editUser" method="post">
              <fieldset>    
                <legend>تعديل معلومات المستعمل :
                </legend> 
		
                <p>
                <label for="id">
                <input type="hidden" name="id" value="<?php
                echo $user->id;
                ?>" >
                </label>
                </p>
                  <p><label for="nom"><span>الإسم العائلي :</span>
                &nbsp;&nbsp;           
                <input type="input" name="nom" value="<?php
                echo $user->nom;
                ?> ">
                </label></p> 
                <p class="erreur">
                <?php
                if($this->session->userdata('erreurnom')){
                echo $this->session->userdata('erreurnom');
                $this->session->set_userdata('erreurnom',null);
                }?>
                </p>
                 <p><label for="prenom"><span>الإسم الشخصي :</span>
                &nbsp;&nbsp;
                <input type="input" name="prenom" value="<?php
                echo $user->prenom;
                ?>">
                </label></p>
                <p class="erreur">
                <?php
                if($this->session->userdata('erreurprenom')){
                echo $this->session->userdata('erreurprenom');
                $this->session->set_userdata('erreurprenom',null);
                }?>
                </p>
                <p><label for="identite"><span>اسم الدخول :</span>
                &nbsp;&nbsp;
                <input type="input" name="identite" value="<?php
                echo $user->identite;
                ?>">
                </label></p>
                <p class="erreur">
                <?php
                if($this->session->userdata('erreuridentite')){
                echo $this->session->userdata('erreuridentite');
                $this->session->set_userdata('erreuridentite',null);
                }?>
                </p>
                <p><label for="passe"><span>الرمز السري :</span>
                &nbsp;&nbsp;
                <input type="password" name="passe" value="">
                </label></p>
                <p class="erreur">
                <?php
                if($this->session->userdata('erreurpasse')){
                echo $this->session->userdata('erreurpasse');
                $this->session->set_userdata('erreurpasse',null);
                }?>
                </p>
                <p><label for="email"><span>البريد الإلكتروني :</span>
                &nbsp;&nbsp;
                <input type="input" name="email" value="<?php
                echo $user->email;
                ?>">
                </label></p>
                <p class="erreur">
                <?php
                if($this->session->userdata('erreuremail')){
                echo $this->session->userdata('erreuremail');
                $this->session->set_userdata('erreuremail',null);
                }?>
                </p>
                <p><label for="matiere"><span>المادة :</span>
               <select id="matiere" name="matiere">
                <?php
					   foreach($matieres as $k1 => $list){
						   echo "<OPTION>";
						   echo $list['nom'];
						   echo "</OPTION>";
					   }
					   ?>
               </select>
                </label></p>
                <p dir="rtl"><label for="isadmin">
                        <span>مدير الموقع :</span>
                <input type="radio" name="isadmin" value="1" <?php
                if($user->is_admin==1)
                    echo 'checked';
                ?>> نعم
                <input type="radio" name="isadmin" value="0" <?php
                if($user->is_admin==0)
                    echo 'checked';
                ?>> لا
                </label>
                </p>
                               				
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