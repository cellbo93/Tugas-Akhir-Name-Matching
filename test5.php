<!--di file php.ini ditambahkan error_reporting = E_ALL & ~E_NOTICE -->
<html>
<head>
		
		  <meta charset="utf-8">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="bootstrap-3.3.7/dist/css/bootstrap.css" rel="stylesheet">
		<link href="bootstrap-3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="bootstrap-3.3.7/dist/js/bootstrap.js"></script>
		<!--<script src="bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
	body{
		background:#F5F5F5;
		text-align:justify;
	}
	#myInput{
		border-radius: 0px 0px 0px 0px;
	}
	#id{
		border-radius: 0px 0px 0px 0px;
	}
	#con{
		margin-top:50px;
		
	}
	embed{
		padding-top:50px;
	}
	h4{
		color:grey;
	}
	.scroll{
	  margin:auto;
	  width: 90%;
	  background: #F5F5F5;
	  padding: 10px;
	  overflow: scroll;
	  height: 450px;
	  
	 
	}
</style>
<body>

<div class="container" id="con">
  <center>
  <h4>Name Matching Arab</h4>
  
  <table width=20%; align=center;>
  <!--<tr>
	<td>-->
	<form method="post" action="test5_1.php">
	<input class="form-control" id="myInput" type="text" name="nama" placeholder="Gunakan Huruf Kapital diawal Kata...!" style="width:40%;" >
	<button type="submit" class="btn btn-primary" id="id" onclick="show();" style="width:40%;" >Search</button>
	</form>
	<!--</td>-->
  </table>
</div>
<script>
		$(document).ready(function(){
		  $("#Input").on("keyup", function() {
			var value = $(this).val().toLowerCase();
			$("#myList tr").filter(function() {
			  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
			//document.cookie("tes="+value);
			//document.getElementById("contoh").innerHTML=value;	
		  });
		});
		//function cek(){
		//		var k=value;
		//		document.form1.media.value=k;
		//}
		//function show(){ 
        //    a = document.getElementById("myInput").value; 
        //    window.location.href = "home.php?myvariable=" + a ; 
		//}
</script>
<script type="text/javascript" src="hilitor.js"></script>
<script type="text/javascript">
		function show(){ 
		//alert($("#myInput").val());
            a = document.getElementById("myInput").value; 
            window.location.href = "test3.php?myvariable=" + a ; 	
		}/*
		  var myHilitor2;
		  document.addEventListener("DOMContentLoaded", function(e) {
			myHilitor2 = new Hilitor("playground");
			myHilitor2.setMatchType("left");
			//console.log(myHilitor2.setMatchType("left"));
		  }, false);

		  document.getElementById("Input").addEventListener("keyup", function(e) {
			myHilitor2.apply(this.value);
			//console.log(myHilitor2.apply(this.value));
			
		  }, false);*/
		 

</script>
</body>
</html>