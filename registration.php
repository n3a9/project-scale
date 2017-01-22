<html>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/3.6.6/firebase.js"></script>
    <script src="creds/creds.js"></script>
    <script>firebase.initializeApp(config);</script>
    <script src="https://cdn.firebase.com/libs/firebaseui/1.0.0/firebaseui.js"></script>
    <link type="text/css" rel="stylesheet" href="https://cdn.firebase.com/libs/firebaseui/1.0.0/firebaseui.css" />

<script>
$(document).ready(function(){
		
		firebase.auth().onAuthStateChanged(function(user2) { 
			if (user2) {
				
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
				xmlhttp.open("GET","upload_account_data.php?uid="+user2.uid+"&username="+user2.displayName+"&email="+user2.email+"&photourl="+user2.photoURL,true);
				xmlhttp.send();
				
				var date = new Date();
				date.setTime(date.getTime() + (3600000));
				var expires = "; expires="+date.toGMTString();
				document.cookie = "uid"+"="+user2.uid+expires+"; path=/";
				$(location).attr('href', 'main_page.php')
			}
		  });
	
});
</script>
<div id="register"></div>
</html>