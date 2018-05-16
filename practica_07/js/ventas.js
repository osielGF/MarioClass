var fecha = document.getElementById('fecha');
var fechahoy = new Date();
var anio = fechahoy.getFullYear();
var mes = fechahoy.getMonth()+1;
var dia = fechahoy.getDate();
if(dia<10) 
{
  dia = '0'+dia
} 
if(mes<10) 
{
  mes = '0'+mes
} 
fechahoy = anio + '-' + mes + '-' + dia;
fecha.setAttribute("value",fechahoy);
var pagoTotal = 0;
var contador = 0;
var lugar = document.getElementById("aqui");
var inputTotal = document.getElementById("txtTotal");
function add()
{
  var cantidad = document.getElementById("cantidad").value;
  if(cantidad != "" && cantidad != 0)
  {
    var opciones = document.getElementById("lista_productos");
    var elegida = opciones.options[opciones.selectedIndex].text;
    var separados = elegida.split("$");
    var salto = document.createElement("br");
    var inputNom = document.createElement("input");
    var inputCant = document.createElement("input");
    var inputPre = document.createElement("input");
    var pNom = separados[0];//nombres
    var pPrice = separados[1];//precios
    contador++;
    inputNom.setAttribute("value", pNom);
    inputNom.setAttribute("disabled", "");
    inputNom.name = "prod" + contador;
    inputPre.setAttribute("value",pPrice);
    inputPre.setAttribute("disabled", "");
    inputPre.name = "precio" + contador;
    inputCant.setAttribute("value", cantidad);
    inputCant.setAttribute("disabled", "");
    inputCant.name = "cant" + contador;
    lugar.appendChild(salto);
    lugar.appendChild(inputNom);
    lugar.appendChild(inputPre);
    lugar.appendChild(inputCant);
    pagoTotal = pagoTotal + (pPrice*cantidad);
    inputTotal.setAttribute("value",pagoTotal);
  }
}