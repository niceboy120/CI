<?php include "header1.php" ; ?>
<div id="content-wrap">

<!-- ici commence le contenu -->


<div id="main">

 <div id="tabs">
	<ul>
		<li><a href="#tabs-1">الإعدادات الشخصية</a></li>
                <li><a href="#tabs-2">ملء دفتر النصوص</a></li>
		<li><a href="#tabs-3">مشاهدة - طباعة دفتر النصوص</a></li>
		<li><a href="#tabs-4">كتابة جدول الحصص</a></li>
                <li><a href="#tabs-5">تدبير أنواع الأنشطة</a></li>
                <li><a href="#tabs-6">الإتصال بالمسؤول عن الموقع</a></li>
	</ul>
     <div id="tabs-1">
       <?php $this->load->view('user/informationsPerso'); ?>
     </div>
     <div id="tabs-2">
     
     </div>
     <div id="tabs-3">
        <?php $this->load->view('user/afficherCahier'); ?>
     </div>
     <div id="tabs-4">
        
         <?php
             $this->load->view('user/afficherEmploi');
         ?>
         

     </div>
    <div id="tabs-5">

    </div>
     <div id="tabs-6">
        <div id="contact">
            <h1>الإتصـــال بنـــا:</h1>
            <form id="ContactForm" action="">
                <p>
                    <label>الإســــم :</label>
                    <input id="name" name="name" class="inplaceError" maxlength="120" type="text" autocomplete="off"/>
					<span class="error" style="display:none;"></span>
                </p>
                <p>
                    <label>البريد الإلكتروني :</label>
                    <input id="email" name="email" class="inplaceError" maxlength="120" type="text" autocomplete="off"/>
					<span class="error" style="display:none;"></span>
                </p>
                <p>
                    <label>الموقع <span>(اختياري)</span></label>
                    <input id="website" name="website" class="inplaceError" maxlength="120" type="text" autocomplete="off"/>
                </p>
                <p>
                    <label>النـــص :<br /> <span>مسموح ب300 حرف</span></label>
                    <textarea id="message" name="message" class="inplaceError" cols="6" rows="5" autocomplete="off"></textarea>
					<span class="error" style="display:none;"></span>
                </p>
                <p class="submit">
                    <input id="send" type="button" value="Submit"/>
                    <span id="loader" class="loader" style="display:none;"></span>
					<span id="success_message" class="success"></span>
                </p>
				<input id="newcontact" name="newcontact" type="hidden" value="1"></input>
            </form>
        </div>
         <div class="envelope">
            <img id="envelope" src="images/envelope.png" alt="envelope" width="246" height="175" style="display:none;"/>
        </div>
        <div><a class="back" href="http://tympanus.net/codrops"></a></div>
     </div>
 </div>
    <p  class="Style741"><?php echo anchor('user/logout', 'الخروج');?></p>
</div>

<!-- ici se termine le contenu -->

</div>
<?php include "footer.php" ; ?>

