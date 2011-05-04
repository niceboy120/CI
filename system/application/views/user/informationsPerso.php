<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$infoUser= $this->session->userdata('InfoUser');

?>
    <div id="informationsperso">

            <form id="InformationsForm" action="">
                
                <p>
                    <label>الإســم الشخصي :</label>
                    <input id='prenom' name='prenom' type='text' value=' <?php echo $infoUser['prenom']; ?>' />
		</p>
                <p>
                    <label>الإسـم العائلي :</label>
                    <input id='nom' name='nom' type='text' value='<? echo $infoUser['nom']; ?>' />
					
                </p>
                <p>
                    <label>العنوان الإلكتروني :</label>
                    <input id='email' name='email' type='text' value=' <? echo $infoUser['email']; ?>' />
                </p>
                
                
                <p class="submit">
                    <input id="send" type="button" value="حفظ التغيير"/>
                    <span id="loader" class="loader" style="display:none;"></span>
					<span id="success_message" class="success"></span>
                </p>
	
            </form>
    </div>