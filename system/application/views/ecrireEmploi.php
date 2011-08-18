<?php include "header1.php" ; ?>
<div id="content-wrap">

<!-- ici commence le contenu -->


<div id="main">
 <table width="95%" border="0" align="center" cellpadding="0" cellspacing="5" >
    <tr>
              <td></td>
              <td> الإثنين</td>
              <td> الثلاثاء</td>
              <td>الأربعاء</td>
              <td>الخميس</td>
              <td>الجمعة</td>
              <td>السبت</td>
          </tr>
          <tr>
              <?php 
              foreach($emploi as $k1 ){ 
		  echo $k1['id_classe'];
		  }
              
              ?>
              <td> calcul</td>
              <td> 2</td>
          </tr>
 </table>

</div>

<!-- ici se termine le contenu -->

</div>
<?php include "footer.php"; ?>
