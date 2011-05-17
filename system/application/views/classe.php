<?php include "header.php"; ?>
<div id="content-wrap">

    <!-- ici commence le contenu -->
    <div id="sidebar">

        <p>دفتر النصوص الإلكتروني هو مشروع للأستاذ يونس بوطيور يهدف من خلاله المساهمة في تحسين جودة التعلمات و التعلم من خلال مد جميع الأطراف المتدخلة في العملية التربوية ببوابة معلوماتية لتفقد الواجبات المنزلية للتلاميذ من طرف الاباء و كذلك تتبع ما أنجز داخل الفصل من طرف المؤطرين التربويين.</p>
    </div>

    <div id="main">				          

        <form class="monForm" action= "<?php echo base_url(); ?>matiere" method='post'>
            <fieldset>        
                <legend>مساحة الاباء و الأمهات و التلاميذ: 
                </legend>        

                <label for="form_class"><span>القسم        :</span>
                    &nbsp;&nbsp;        
                    <select id="form_class" name="classe"> 
                        <option value="none">المرجو اختيار القسم....</option>
                        <?php
                        foreach ($classes as $k1 => $list) {
                            echo "<OPTION>";
                            echo $list['nom'];
                            echo "</OPTION>";
                        }
                        ?>                    
                    </select> 

                </label> 


                <p align='center'><strong> من فضلك, اِخـتر القسم</strong></p>
            </fieldset>
            <p><input type="submit" name="consulter" value="تأكيد"/> </p> 
        </form>
        <form class="monForm" action="<?php echo base_url(); ?>user" method="post">
            <fieldset>    
                <legend>مساحة الأساتذة و المسؤولين الإداريين :
                </legend> 

                <p> 

                    <label for="form_utilisateur"><span>اسم المستخدم :</span>
                        &nbsp;&nbsp;           
                        <select id="form_utilisateur" name="identite">
                            <option value="none">المرجو اختيار اسم المستخدم....</option>
                            <?php
                            foreach ($users as $k1 => $list) {
                                echo "<OPTION>";
                                echo $list['identite'];
                                echo "</OPTION>";
                            }
                            ?> 


                        </select> 
                    </label> 

                </p> 
                <p>            
                    <label for="form_passe"><span>الرمز السري :</span>
                        &nbsp;
                        <input type="password" id="form_passe" name="passe" autocomplete="off" />
                    </label>                            
                </p>
                <p class="erreur"> <?php
                            if ($this->session->userdata('erreur')) {
                                echo $this->session->userdata('erreur');
                                $this->session->set_userdata('erreur', null);
                            }
                            ?></p>
                <p align='center'><strong>من فضلك, اختر اسم المستخدم و الرمز السري</strong></p>				
            </fieldset>         
            <p>        
                <input type="submit" name="submit" value="تأكيد"/>    
            </p>
        </form>				 			         
    </div>

    <!-- ici se termine le contenu -->

</div>
<?php include "footer.php"; ?>
