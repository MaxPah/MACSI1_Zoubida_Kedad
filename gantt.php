
<style type="text/css">
	.contain {
		width: 800px;
		margin: 0 auto;
	}
	table th:first-child {
		width: 150px;
	}
</style>
		<div class="contain">
			<div class="gantt"></div> 				
		</div>
	
	<script src="js/jquery.min.js"></script> <!-- Tout Marche -->
	<script src="js/jquery.fn.gantt.js"></script> <!-- Modal Marche -->
	<script src="http://taitems.github.com/UX-Lab/core/js/prettify.js"></script> <!-- Tout Marche -->
	
	<link href="css/style.css" type="text/css" rel="stylesheet"> <!-- Rien Marche -->
	<link href="http://taitems.github.com/UX-Lab/core/css/prettify.css" rel="stylesheet" type="text/css"> <!-- Gantt Marche-->
	<meta http-equiv="X-UA-Compatible" content="IE=Edge;chrome=1"> <!-- Gantt -->

<script type="text/javascript">
	$(function() {	
		
		info = recupereInfosGantt();
		
		"use strict";
		$(".gantt").gantt({
			source: info,
			navigate: "scroll",
			maxScale: "hours",
			itemsPerPage: 25,
		});
	});
	
	
	function recupereInfosGantt(){
	var info=new Array();
		var monFichier="infosgantt.php";
		donnees = file(monFichier);
		var lignes=donnees.split("/");
		for(var i=0;i<lignes.length-1;i++) {
				var data = lignes[i].split("*");
				
					tmp={
					name: data[0],
					/*desc: data[1],*/
					values: [{
						from: data[3],
						to: data[4],
						label: '<a href="infoTache.php?idT='+data[5]+'">'+data[2]+'</a>',
						customClass: "ganttBlue"
						}]
					};
				info[i]=tmp;
		}
		return info;
		
	}
	function file(fichier)
	{
	 if(window.XMLHttpRequest) // FIREFOX
		  xhr_object = new XMLHttpRequest();
	 else if(window.ActiveXObject) // IE
		  xhr_object = new ActiveXObject("Microsoft.XMLHTTP");
	 else
		  return(false);
	 xhr_object.open("GET", fichier, false);
	 xhr_object.send(null);
	 if(xhr_object.readyState == 4) return(xhr_object.responseText);
	 else return(false);
	 }
</script>