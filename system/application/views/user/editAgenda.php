<?php include "header1.php"; ?>
<div id="content-wrap">

    <!-- ici commence le contenu -->


    <div id="main">				          

        <p align="center" style="font-size: 20px; color: #9000CC"> تغيير معلومات الحصة</p>


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
                //echo $this->session->userdata('opAgenda');
                //$this->session->set_userdata('opAgenda', null);
            }
            ?>
        </p>

        <form  method="post" class="monForm" name="form1" action="<?php echo base_url(); ?>user/editA">
            <fieldset>
                <legend>تغيير معلومات الحصة :</legend>
                <p>
                <label for="id">
                <input type="hidden" name="id" value="<?php
                echo $id_agenda;
                ?>" >
                </label>
                </p>
                <p><label for="form_classA"><span>القسم        :</span>


                        <select id="form_classeA" name="classeA">
                            <option selected value="<?php echo $agenda['id_classe']; ?>"><?php echo $this->Classe_model->getClasseNom($agenda['id_classe']); ?></option>
                            <?php
                            foreach ($classesProf as $k1) {
                                echo "<OPTION value='" . $k1->id_classe . "'>";
                                echo $this->Classe_model->getClasseNom($k1->id_classe);
                                echo "</OPTION>";
                            }
                            ?>
                        </select>
                    </label></p>

                <div id="joursClasse"></div>
                <p><label for="form_dateseance"><span>تاريخ الحصة   :</span>

                        <input type="text" id="datepicker" name="datepicker" value="<?php echo $agenda['jour']; ?>"/>
                    </label>
                </p>

                <div id="heureSeance"></div>
                <p><label for="form_titreActivite"><span>عنوان الحصة:</span>

                        <input type="text" id="titreActivite" name="titreActivite" value='<?php echo $agenda['titreActivite']; ?>' />
                    </label></p>
                <p><label for="form_typeActivite"><span>نوع الحصة:</span>
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
                </p>
                <p><label for="form_activite"><span>المحتوى:</span>
                        &nbsp;

                    </label>
                <p align="center"><textarea id="activite" name="activite" style="width:98%;"><?php echo $agenda['activite']; ?></textarea></p></p>
                <p><label for="form_travailAfaire"><span>عمل للإنجاز في المنزل :</span>
                        &nbsp;

                    </label>
                <p align="center"><textarea id="travailAfaire" name="travailAfaire" style="width:98%;"><?php echo $agenda['travailAfaire']; ?></textarea></p></p>

                <p><label for="form_remarque"><span>ملاحظات عامة:</span>
                        &nbsp;

                    </label>
                <p align="center"><textarea id="remarque" name="remarque" style="width:98%;"><?php echo $agenda['remarque']; ?></textarea></p></p>
            </fieldset>
            <p>
                <input type="submit" name="submit" value="تغيير الحصة"/>
            </p>
        </form>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#form_classeA').change(function() {
 
                    var my_data={
                        id_classe : $('#form_classeA').val()
            
                    };
       
       
                    $.ajax({
                        url:"<?php echo site_url('user/ajaxsearchJours'); ?>",
                        type:"POST",
                        data:my_data,
                        success: function(msg){
                            $('#joursClasse').html(msg);
                
                        }
            
                    });
                });
    
            });
        </script>
        <form id="formID" class="monForm" action="<?php echo base_url(); ?>user/removeAgenda/<?php
                            echo $id_agenda;
                            ?>" method="post">
            <label for="id">
                <input type="hidden" name="id" value="<?php
        echo $id_emploi;
                            ?>" >
            </label>
            <p><input class="submit" type="submit" name="submit" value="حذف الحصة"></p>
            <p><?php echo anchor('user', 'العودة إلى صفحة التدبير'); ?></p>
        </form>
    </div>

    <!-- ici se termine le contenu -->

</div>
<?php include "footer.php"; ?>