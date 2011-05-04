<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
 <head>    
    <meta name="Description" content="Information architecture, Web Design, Web Standards." />    
    <meta name="Keywords" content="your, keywords" />    
    <meta name="Distribution" content="Global" />    
    <meta name="Author" content="Youness BOUTYOUR - niceboy120@gmail.com" />    
    <meta name="Robots" content="index,follow" /> 
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />	
	<link rel="stylesheet" type="text/css" href='<?php echo base_url();?>system/css/MonFormStyle.css' />
        <link rel="stylesheet" type="text/css" href='<?php echo base_url();?>system/css/tablecahier.css' />
	<link rel="stylesheet" type="text/css" href='<?php echo base_url();?>system/css/cahier.css' />
        <link rel="stylesheet" type="text/css" href='<?php echo base_url();?>system/css/custom-theme/jquery-ui-1.8.1.custom.css' />
        <link rel="stylesheet" href='<?php echo base_url();?>system/css/validationEngine.jquery.css' type="text/css" media="screen" charset="utf-8" />
        <script src='<?php echo base_url();?>system/js/jquery-1.5.1.min.js' type="text/javascript"></script>
        <script src='<?php echo base_url();?>system/js/jquery-ui-1.8.12.custom.min.js' type="text/javascript"></script>
        <script src="j<?php echo base_url();?>system/js/jquery.contact.js" type="text/javascript"></script>
        <script src='<?php echo base_url();?>system/js/jquery.dataTables.min.js' type="text/javascript"></script>
      
        <script type="text/javascript">
	$(function() {
		$("#tabs").tabs();
	});
	</script>
        <script language="JavaScript" type="text/JavaScript">

var xhr = null;
function getXhr()
{
     if(window.XMLHttpRequest)xhr = new XMLHttpRequest();
else if(window.ActiveXObject)
  {
  try{
     xhr = new ActiveXObject("Msxml2.XMLHTTP");
     } catch (e)
     {
     xhr = new ActiveXObject("Microsoft.XMLHTTP");
     }
  }
else
  {
  alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest...");
  xhr = false;
  }
}


function ShowRegroupement(){
				getXhr();
				// On définit ce qu'on va faire quand on aura la réponse
				xhr.onreadystatechange = function(){
					// On ne fait quelque chose que si on a tout reçu et que le serveur est ok
					if(xhr.readyState == 4 && xhr.status == 200){
						leselect = xhr.responseText;
						// On se sert de innerHTML pour rajouter les options a la liste
						document.getElementById('gic_ID').innerHTML = leselect;
					}
				}

				// Ici on va voir comment faire du post
				xhr.open("POST","ajax_regroupement.php",true);
				// ne pas oublier ça pour le post
				xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
				// ne pas oublier de poster les arguments
				// ici, l'id de l'auteur
				sel = document.getElementById('classe');
				classe = sel.options[sel.selectedIndex].value;
				xhr.send("Classe="+classe);
			}

function ShowPlages(){
				getXhr();
				// On définit ce qu'on va faire quand on aura la réponse
				xhr.onreadystatechange = function(){
					// On ne fait quelque chose que si on a tout reçu et que le serveur est ok
					if(xhr.readyState == 4 && xhr.status == 200){
						leselect = xhr.responseText;
						// On se sert de innerHTML pour rajouter les options a la liste
						document.getElementById('plages').innerHTML = leselect;
					}
				}

				// Ici on va voir comment faire du post
				xhr.open("POST","ajax_plages.php",true);
				// ne pas oublier ça pour le post
				xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
				// ne pas oublier de poster les arguments
				// ici, l'id de l'auteur
				sel = document.getElementById('heure');
				ID_plage = sel.options[sel.selectedIndex].value;
				xhr.send("ID_plage="+ID_plage);
			}



function MM_reloadPage(init) {  //reloads the window if Nav4 resized

  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {

    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}

  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();

}

MM_reloadPage(true);


function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}


function confirmation(ref,jour_del,heure_del)
{
  if (confirm("Voulez-vous supprimer réellement cette plage horaire du "+jour_del+" "+heure_del+ " ?")) { // Clic sur OK
    MM_goToURL('window','emploi_supprime_verif.php?ID_emploi='+ref+'&affiche=2');
       }
}


function MM_popupMsg(msg) { //v1.0
  alert(msg);
}

</script>
<script type="text/javascript">
window.onload = function()
{
 fctLoad();
}
window.onscroll = function()
{
 fctShow();
}
window.onresize = function()
{
 fctShow();
}
</script>
<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('#cahiertable').dataTable({
                                    "oLanguage":{ "sProcessing":   "جاري التحميل...",
                                                    "sLengthMenu":   "أظهر مدخلات _MENU_",
                                                    "sZeroRecords":  "لم يُعثر على أية سجلات",
                                                    "sInfo":         "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                                                    "sInfoEmpty":    "يعرض 0 إلى 0 من أصل 0 سجلّ",
                                                    "sInfoFiltered": "(منتقاة من مجموع _MAX_ مدخل)",
                                                    "sInfoPostFix":  "",
                                                    "sSearch":       "ابحث:",
                                                    "sUrl":          "",
                                                    "oPaginate": {
                                                            "sFirst":    "الأول",
                                                            "sPrevious": "السابق",
                                                            "sNext":     "التالي",
                                                            "sLast":     "الأخير"
                                                            }
                                                    },
                                     "bJQueryUI": true,
                                     "sPaginationType": "full_numbers"
                                              } );
                                        
			} );
		</script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>system/js/calendrier.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>system/js/CP_Class.js"></script>

<style type="text/css">
.detail {
	font-size: 9px;
	background-color: #FFFFFF;
	text-align:left;
	color: #000066;
	border: 1px solid #CCCCCC;
	border-collapse:collapse;
	font-family: Verdana, Arial, Helvetica, sans-serif;
    vertical-align: top;
}


.curseur_aide { cursor: help; }

</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>system/css/colorpicker.css" />
<link href="<?php echo base_url();?>system/css/arrondis.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>system/css/info_bulles.css" rel="stylesheet" type="text/css" />
	<title>دفتــر النصــوص </title>
</head>     
<body>

<div id="wrap">	
<div id="header"> 
<h1 id="logo-text"> 
     
دفتــر النصــوص الإلكتروني        
</h1>		 			         
<p id="slogan">جميعا من أجل مدرسة النجــاح         
 </p>
</div>
	
		<div  id="menu">
			<ul>
				<li id="current">الرئيسية</li>
				</ul>
		</div>
