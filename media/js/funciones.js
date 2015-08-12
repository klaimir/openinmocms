// Para el control de cambios guardados o no
modificado=false;

// Funcion para mostrar / ocultar campos de formulario
function mostrar_ocultar_campo(id) 
{
	if(document.getElementById(id).style.display=='inline')
	{
		document.getElementById(id).style.display='none';
		document.getElementById(id).value='';
	}
	else
	{
		document.getElementById(id).style.display='inline';
	}
}

// Cambiado propiedades al mostrar y ocultar la capa
function ocultar_mostrar_capa(id)
{
	if(document.getElementById(id).style.visibility=='hidden')
	{
		document.getElementById(id).style.visibility='visible';
		document.getElementById(id).style.height='auto';
	}
	else
	{
		document.getElementById(id).style.visibility='hidden';
		document.getElementById(id).style.height='1px';
	}
}

function muestra_reloj()
{ 
	momentoActual = new Date();
	hora = momentoActual.getHours();
	minuto = momentoActual.getMinutes();
	segundo = momentoActual.getSeconds(); 
	if (hora < 10)
		hora = "0" + hora;
	if (minuto < 10)
		minuto = "0" + minuto;
	if (segundo < 10)
		segundo = "0" + segundo;
	horaImprimible = hora + ":" + minuto + ":" + segundo + "&nbsp;";
	document.getElementById('reloj').innerHTML = horaImprimible;
	setTimeout("muestra_reloj()",1000);
}

function muestra_fecha()
{
	var mydate=new Date();
	var year=mydate.getYear();
	if (year < 1000)
	year+=1900;
	var day=mydate.getDay();
	var month=mydate.getMonth();
	var daym=mydate.getDate();
	if (daym<10)
	daym="0"+daym;
	var dayarray=new Array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
	var montharray=new Array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	fechaImprimible = dayarray[day] + " " + daym + " de " + montharray[month] + " de " + year;
	document.getElementById('fecha_actual').innerHTML = fechaImprimible;
}

function nuevoAjax()
{ 
	/* Crea el objeto AJAX. Esta funcion es generica para cualquier utilidad de este tipo, por
	lo que se puede copiar tal como esta aqui */
	var xmlhttp=false;
	try
	{
		// Creacion del objeto AJAX para navegadores no IE
		xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
	}
	catch(e)
	{
		try
		{
			// Creacion del objet AJAX para IE
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		catch(E)
		{
			if (!xmlhttp && typeof XMLHttpRequest!='undefined') xmlhttp=new XMLHttpRequest();
		}
	}
	return xmlhttp; 
}

<!-- Código para cargar la lista de regiones asociados a una provincia usando AJAX -->
function carga_regiones(provincia,elegido,fichero) 
{		
	// Si no se declara fichero, entonces se indica por defecto la siguiente interfaz
	if(!fichero){var fichero="regiones";}
	
	var strURL=fichero+".php?provincia="+provincia+"&elegido="+elegido+"&nocache=" + Math.random();
	var req = nuevoAjax();
	
	if (req)
	{
		req.onreadystatechange = function() {
			if (req.readyState == 4) 
			{
				// only if "OK"
				if (req.status == 200) 
				{						
					document.getElementById('regiondiv').innerHTML=req.responseText;						
				} 
				else
				{
					alert("There was a problem while using XMLHTTP:\n" + req.statusText);
				}
			}				
		}			
		req.open("GET", strURL, true);
		req.send(null);
	}		
}

<!-- Código para cargar la lista de regiones asociados a una provincia usando AJAX -->
function carga_regiones_inmueble(provincia,elegido,fichero) 
{		
	// Si no se declara fichero, entonces se indica por defecto la siguiente interfaz
	if(!fichero){var fichero="regiones_inmueble";}
	
	var strURL=fichero+".php?provincia="+provincia+"&elegido="+elegido+"&nocache=" + Math.random();
	var req = nuevoAjax();
	
	if (req)
	{
		req.onreadystatechange = function() {
			if (req.readyState == 4) 
			{
				// only if "OK"
				if (req.status == 200) 
				{						
					document.getElementById('regiondiv').innerHTML=req.responseText;						
				} 
				else
				{
					alert("There was a problem while using XMLHTTP:\n" + req.statusText);
				}
			}				
		}			
		req.open("GET", strURL, true);
		req.send(null);
	}		
}

<!-- Código para cargar la lista de regiones asociados a una provincia de un agente usando AJAX -->
function carga_regiones_agente(provincia,elegido,fichero) 
{		
	// Si no se declara fichero, entonces se indica por defecto la siguiente interfaz
	if(!fichero){var fichero="regiones_agente";}
	
	var strURL=fichero+".php?provincia="+provincia+"&elegido="+elegido+"&nocache=" + Math.random();
	var req = nuevoAjax();
	
	if (req)
	{
		req.onreadystatechange = function() {
			if (req.readyState == 4) 
			{
				// only if "OK"
				if (req.status == 200) 
				{						
					document.getElementById('regiondiv').innerHTML=req.responseText;						
				} 
				else
				{
					alert("There was a problem while using XMLHTTP:\n" + req.statusText);
				}
			}				
		}			
		req.open("GET", strURL, true);
		req.send(null);
	}		
}

<!-- Código para cargar la lista de poblaciones asociados a una region usando AJAX -->
function carga_poblaciones(region,elegido,fichero) 
{		
	// Si no se declara fichero, entonces se indica por defecto la siguiente interfaz
	if(!fichero){var fichero="poblaciones";}
	
	var strURL=fichero+".php?region="+region+"&elegido="+elegido+"&nocache=" + Math.random();
	var req = nuevoAjax();
	
	if (req)
	{
		req.onreadystatechange = function() {
			if (req.readyState == 4) 
			{
				// only if "OK"
				if (req.status == 200) 
				{						
					document.getElementById('poblaciondiv').innerHTML=req.responseText;						
				} 
				else
				{
					alert("There was a problem while using XMLHTTP:\n" + req.statusText);
				}
			}				
		}			
		req.open("GET", strURL, true);
		req.send(null);
	}		
}

<!-- Código para cargar la lista de poblaciones asociados a una region usando AJAX -->
function carga_poblaciones_cliente(provincia,elegido,fichero) 
{		
	// Si no se declara fichero, entonces se indica por defecto la siguiente interfaz
	if(!fichero){var fichero="poblaciones_cliente";}
	
	var strURL=fichero+".php?provincia="+provincia+"&elegido="+elegido+"&nocache=" + Math.random();
	var req = nuevoAjax();
	
	if (req)
	{
		req.onreadystatechange = function() {
			if (req.readyState == 4) 
			{
				// only if "OK"
				if (req.status == 200) 
				{						
					document.getElementById('poblaciondivcliente').innerHTML=req.responseText;						
				} 
				else
				{
					alert("There was a problem while using XMLHTTP:\n" + req.statusText);
				}
			}				
		}			
		req.open("GET", strURL, true);
		req.send(null);
	}		
}

<!-- Código para cargar la lista de poblaciones asociados a una region usando AJAX -->
function carga_poblaciones_inmueble(region,elegido,fichero) 
{		
	// Si no se declara fichero, entonces se indica por defecto la siguiente interfaz
	if(!fichero){var fichero="poblaciones_inmueble";}
	
	var strURL=fichero+".php?region="+region+"&elegido="+elegido+"&nocache=" + Math.random();
	var req = nuevoAjax();
	
	if (req)
	{
		req.onreadystatechange = function() {
			if (req.readyState == 4) 
			{
				// only if "OK"
				if (req.status == 200) 
				{						
					document.getElementById('poblaciondiv').innerHTML=req.responseText;						
				} 
				else
				{
					alert("There was a problem while using XMLHTTP:\n" + req.statusText);
				}
			}				
		}			
		req.open("GET", strURL, true);
		req.send(null);
	}		
}

<!-- Código para cargar la lista de poblaciones asociados a una region de un agente usando AJAX -->
function carga_poblaciones_agente(region,elegido,fichero) 
{		
	// Si no se declara fichero, entonces se indica por defecto la siguiente interfaz
	if(!fichero){var fichero="poblaciones_agente";}
	
	var strURL=fichero+".php?region="+region+"&elegido="+elegido+"&nocache=" + Math.random();
	var req = nuevoAjax();
	
	if (req)
	{
		req.onreadystatechange = function() {
			if (req.readyState == 4) 
			{
				// only if "OK"
				if (req.status == 200) 
				{						
					document.getElementById('poblaciondiv').innerHTML=req.responseText;						
				} 
				else
				{
					alert("There was a problem while using XMLHTTP:\n" + req.statusText);
				}
			}				
		}			
		req.open("GET", strURL, true);
		req.send(null);
	}		
}

<!-- Código para cargar la lista de zonas asociados a una poblacion usando AJAX -->
function carga_zonas(poblacion,elegido,fichero) 
{		
	// Si no se declara fichero, entonces se indica por defecto la siguiente interfaz
	if(!fichero){var fichero="zonas";}
	
	var strURL=fichero+".php?poblacion="+poblacion+"&elegido="+elegido+"&nocache=" + Math.random();
	var req = nuevoAjax();
	
	if (req)
	{
		req.onreadystatechange = function() {
			if (req.readyState == 4) 
			{
				// only if "OK"
				if (req.status == 200) 
				{						
					document.getElementById('zonadiv').innerHTML=req.responseText;						
				} 
				else
				{
					alert("There was a problem while using XMLHTTP:\n" + req.statusText);
				}
			}				
		}			
		req.open("GET", strURL, true);
		req.send(null);
	}		
}

function solamenteNumero(e)
{
   if (e.which)
      {
      if(e.which!=46 && e.which!=8 && e.wich!=9 && (e.which<48 || e.which>57))
      return false;
      }
   else if(e.keyCode)
      {
      if(e.keyCode!=46 && e.keyCode!=8 && e.keyCode!=9 && (e.keyCode<48 || e.keyCode>57))
      return false;
      }
   return true;
}

/* Variables para controlar el tamaño en incremento de la página */
var original= .80;
incremento = 0;
tamano = 0;

/* 	C&oacute;digo para aumentar el tamaño del texto. */
function aumentar () 
{
	incremento+=.25;
	tamano = original + incremento;
	document.getElementById("contenedor").style.fontSize = tamano + "em";
}

/* 	C&oacute;digo para reducir el tamaño del texto. */
function reducir () 
{
	incremento-=.25;
	tamano = original + incremento;
	document.getElementById("contenedor").style.fontSize = tamano + "em";
}

/* 	C&oacute;digo para restaurar el tamaño del texto a su valor original. */
function restaurar () 
{
	document.getElementById("contenedor").style.fontSize = original + "em";
	tamano = 0;
	incremento = 0;
}

/* 	C&oacute;digo para establecer un tamaño del texto concreto. */
function establecer(tamano) 
{
	if (tamano!=0) 
	{
		document.getElementById("contenedor").style.fontSize = tamano + "em";
	}
}