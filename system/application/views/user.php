<?php include "header1.php" ; ?>
<div id="content-wrap">

<!-- ici commence le contenu -->


<div id="main">

   <p>&nbsp;</p>
   <p align="center" dir="rtl"><font size="15"><a href="">ملء دفتر النصوص</a></font></p>
  <br />
  <table width="95%" border="0" align="center" cellpadding="0" cellspacing="5" >
    <tr>
      <td width="50%"><div align="left" class="Style6">تثبيث و إعداد </div></td>
      <td><div align="left" class="Style6">العمل</div></td>
    </tr>
    <tr>
      <td valign="top" ><br />
        <p class="Style74"><a href="imprimer_menu.php">مشاهدة - طباعة دفتر النصوص</a></p>
	<p class="Style74"><a href="liste_documents.php">لائحة ملفاتي المرسلة في المرفقات</a></p>
        <p class="Style74"><a href="progression.php">تدبير الجذاذات</a></p>
        <p class="Style74">&nbsp;</p>
        <p  class="Style74"><?php echo anchor('user/logout', 'الخروج');?></p>
      </td>
        <td width="50%" valign="top"><br>
        <p class="Style74"  dir="rtl"><a href="emploi.php?affiche=1">كتابة جدول الحصص</a></p>
        <p class="Style74"  dir="rtl"><a href="type_activite_ajout.php">تدبير أنواع الأنشطة</a></p>
        <p class="Style74" dir="rtl"><a href="exportationCSV.php">استيراد دفتر النصوص</a> </p>
        <p class="Style74" dir="rtl"><a href="contact_admin.php">الإتصال بالمسؤول عن الموقع</a> </p></td>
      
    </tr>
  </table>

</div>

<!-- ici se termine le contenu -->

</div>
<?php include "footer.php"; ?>
