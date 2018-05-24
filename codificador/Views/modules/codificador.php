
<!DOCTYPE html>
<html>
<head>
	<title>Registrar - Alumno</title>
</head>
<body>
	<h1>CONVERTIDOR Y CODIFICADOR DE CODIGOS EN LINEA</h1>
	<h2>PROGRAMADOR: Osiel Gomez Flores</h2>
	
	<form method="post" action="views/modules/codificador.php">
		<div>
			Binario:     <input type="text" placeholder="valor" name="txtBinario"><input type="radio" name="rd" id="rd1">
			<br><br>
			Octal:       <input type="text" placeholder="valr" name="txtOctal"><input type="radio" name="rd" id="rd2">
			<br><br>
			Decimal:     <input type="text" placeholder="valor" name="txtDecimal"><input type="radio" name="rd" id="rd3">
			<br><br>
			Hexadecimal: <input type="text" placeholder="valor" name="txtHexadecimal"><input type="radio" name="rd" id="rd4">
			<br><br>
		</div>
		<input type="submit" value="CODIFICAR" onclick="checar();">
	</form>

	<h1>--------------------------------RESULTADOS------------------------------</h1>
	<div name="div1" id="div1">
		
	</div>
</body>
</html>
<?php
?>

<script type="text/javascript">
      
      var binario = document.getElementById("rd1");
      var octal = document.getElementById("rd2");
      var decimal = document.getElementById("rd3");
      var hexadecimal = document.getElementById("rd4");

      var valorBi = document.getElementById("txtBinario").value;
      var valorOc = document.getElementById("txtOctal").value;
      var valorDe = document.getElementById("txtDecimal").value;
      var valorHe = document.getElementById("txtHexadecimal").value;

      var contenedor = document.getElementById("div1");
      var br = document.createElement("br");

		function checar()
		{
			alert("Gola");
			var in1 = document.createElement("input");
			in1.setAttribute("style", "width:100px;");
		    in1.setAttribute("disabled", "");
		    in1.name = "DecimalBinario";
		    var dec_bin = $_POST['txtDecimal'];
		    var val = dec_bin.toString(2);
		    in1.setAttribute("value", dec_bin);
		    contenedor.appendChild(in1);
		}
    </script>






