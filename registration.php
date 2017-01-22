<html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>

var uid = 22;
var username = "lorenz";
var email = "lorenzo@ucdavis.edu";
var photourl = "profile.jpg";

</script>

<script>
$(document).ready(function(){
	
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("results").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","upload_account_data.php?uid="+uid+"&username="+username+"&email="+email+"&photourl="+photourl,true);
        xmlhttp.send();
		
		$(location).attr('href', 'main_page.php')
	
});
</script>
<div id="register"></div>
</html>