
function getParameterByName(name, url) 
	{
		if (!url) url = window.location.href;
		name = name.replace(/[\[\]]/g, "\\$&");
		var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)", "i"),
			results = regex.exec(url);
		if (!results) return null;
		if (!results[2]) return '';
		return decodeURIComponent(results[2].replace(/\+/g, " "));
	}
	
/*<script src="../controllers/js/script.js" type="text/javascript"></script>

	<script type="text/javascript">
	var x = getParameterByName("var");
	document.getElementById("formR").action = "../controllers/ModifyProductHandling.php?var=" + x;
	</script>*/