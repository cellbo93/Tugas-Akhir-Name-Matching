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
  
  <table width=20%; align=center; >
  <!--<tr>
	<td>-->
	<form method="post" action="test5_1.php">
	<input class="form-control" id="myInput" name="nama" type="text" placeholder="Gunakan Huruf Kapital diawal Kata...!" style="width:40%;" >
	<button type="submit" class="btn btn-primary" id="id" onclick="show();" style="width:40%;" >Search</button>
	</form>
	<!--</td>-->
	<?php 
	//$myphpvariable = isset($_GET['myvariable']) ? $_GET['myvariable'] : '';
	$s=$_POST['nama'];
	$myphpvariable=$s;
	if($myphpvariable=='' || $s==null){
		//echo "<input id='Input' type='hidden' value='".$myphpvariable."' >";
		//echo "<p>not found</p>";
	}else{
		echo "<br><br><input id='Input' type='text' value='".$myphpvariable."' >";
		//echo "<p id='b'> = ";
        //echo soundex($myphpvariable)."</p>";
	}
		 
		
	?>
	<div id="output">
	</div>
 
  </table> 
  </center>
</div>
 <br>
  <br>
<div class="scroll">
	<div class="container" id="con1">
		<center>
		<?php
			echo '<table class="table table-bordered table-striped"  style="text-align:justify;">';
			echo '<thead><tr><th><center>No</center></th><th><center>Isi Hadist</center></th><th><center>kemiripannya</center></th></tr></thead>';
			$dir=scandir("file");
			$i = 1;
			$a = count($dir)-2;
			$nilai=1;
			$nilai1=1;
			$n=0;
			$j=0;
			$k=0;
			$m=0;
			$o=0;
			$p=0;
			while($i <=$a)
			{
				/*
					echo "<tbody id='myList'>";
					echo "<tr>";
					echo "<td>".$i."</td>";
					echo "<td id='input'>";
					echo readfile("file/$i.txt");
					echo "</td>";
					echo "<td>";
					*/
					//mulai untuk perhitungannya
					$string = file("file/$i.txt");
					$jenistanda = array(',', '!', '?', '.', ':',';', '-','"','(',')','[',']', "'");
					$hapustanda = str_replace($jenistanda,'',$string);
					foreach($hapustanda as $v){
					$PecahStr = explode(" ", $v);
						for ( $c = 0; $c < count( $PecahStr ); $c++ ) {
							$pembagi=max(strlen($PecahStr[$c]), strlen($myphpvariable ));
							if($pembagi==null){
								echo "";
							}else{
								$similarity=1-(levenshtein($PecahStr[$c], $myphpvariable )/$pembagi);
								//$hasil=1-(1-(levenshtein($PecahStr[$c], $myphpvariable )/$pembagi));
								$uppercase = preg_match('@[A-Z]@', $PecahStr[$c]);
								if($uppercase==TRUE){
									if($myphpvariable==""){
										echo "";
									}else{
										if($similarity>=0.8 ){
											echo "<tbody id='myList'>";
											echo "<tr>";
											echo "<td>".$i."</td>";
											echo "<td id='input'>";
											echo readfile("file/$i.txt");
											echo "</td>";
											echo "<td>";
											echo $PecahStr[$c] . " = ".$myphpvariable . " , levenstein similarity = ".$similarity."<br /><br />";
											$k=$n+=1;
										}elseif($similarity<=0.3){
											//echo $PecahStr[$c] . " = ".$myphpvariable . " , levenstein similarity = ".$similarity."<br /><br />";
											$p=$o+=1;
										}else{
											//echo $PecahStr[$c] . " = ".$myphpvariable . " , levenstein similarity = ".$similarity."<br /><br />";
											$m=$j+=1;
										}
									}
									
								}
								
							}
						}
					}
					echo "</td>";
					echo "</tr>";
					echo "</tbody>";
				$i++;
			}
			echo "</table>";
					if($m==null){
						$jml=$k+$p+0;
					}elseif($k==null){
						$jml=0+$m+$p;
					}elseif($p==null){
						$jml=0+$k+$m;
					}else{
						$jml=$k+$m+$p;
					}
					
					echo "jml true = ".$k."<br/>";
					echo "jml data = ".$jml."<br/>";
					
					if($k==null && $jml==null){
						echo "Akurasi = 0<br/>";
					}else{
						echo "Akurasi = ".$k/$jml."<br/>";
					}
					
					echo "True Positif = ".$k."<br/>";
					echo "False Positif = ".$m."<br/>";
					echo "False Negative = ".$p."<br/>";
					if($k==null && $m==null || $k==null && $p==null){
						echo "Precision = 0<br/>";
						echo "Recall = 0<br/>";
					}else{
						echo "Precision = ".$k/($k+$m)."<br/>";
						echo "Recall = ".$k/($k+$p)."<br/>";
					}
					/*
					if($k==null && $p==null){
						echo "Recall = 0<br/>";
					}else{
						echo "Recall = ".$k/($k+$p)."<br/>";
					}
					
					*/
					//echo "Precision = ".$k/($k+$m)
					
		?>
		</center>
	</div>
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
		//function show(){ 
		//alert($("#myInput").val());
          //  a = document.getElementById("myInput").value; 
           // window.location.href = "test5_1.php?myvariable=" + a ; 	
		//}/*
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