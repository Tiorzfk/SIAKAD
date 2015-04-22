var ajaxRequest;
function getAjax() //fungsi cek apakah web browser mendukung AJAX
{
	try
	{
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
	}
	catch (e)
	{
		// Internet Explorer Browsers
		try
		{
			ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch (e) 
		{
			try
			{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch (e)
			{
				// Something went wrong
				alert("Your browser broke!");
				return false;
			}
		}
	}
}
$("#b").click(function(){
	$("form").toggle("hide");
 })
$("#a").click(function(){
	$("table").toggle("hide");
 })

var ajaxgw;
 function ambildata(id_siswa){     
 ajaxgw = buatajax();     
 var url="ambilfoto.php";    
 url=url+"?id="+id_siswa;     
 url=url+"&sid="+Math.random();     
 ajaxgw.onreadystatechange=stateChanged;     
 ajaxgw.open("GET",url,true);     
 ajaxgw.send(null); 
 }  
 function ambilyah(id_siswa){     
 ajaxku = buatajax();     
 var url="ambilkelas.php";    
 url=url+"?q="+id_siswa;     
 url=url+"&sid="+Math.random();     
 ajaxku.onreadystatechange=stateChanged;     
 ajaxku.open("GET",url,true);     
 ajaxku.send(null); 
 }
 function ambilsk(id_siswa){     
 ajaxsk = buatajax();     
 var url="ambilsk.php";    
 url=url+"?q="+id_siswa;     
 url=url+"&sid="+Math.random();     
 ajaxsk.onreadystatechange=stateChanged;     
 ajaxsk.open("GET",url,true);     
 ajaxsk.send(null); 
 }
 
function buatajax(){     
if (window.XMLHttpRequest){         
return new XMLHttpRequest();     
}    
 if (window.ActiveXObject){         
 return new ActiveXObject("Microsoft.XMLHTTP");     
 }    
 return null; 
 }  
 
function stateChanged(){
var data;     
if (ajaxku.readyState==4){         
data=ajaxku.responseText;        
if(data.length>0){             
document.getElementById("kelas").value = data         
}else{             
document.getElementById("kelas").value = "";         
}     
}    
if (ajaxgw.readyState==4){         
data=ajaxgw.responseText;        
if(data.length>0){             
document.getElementById("tio").innerHTML=data      
}else{             
document.getElementById("tio")= "";         
}  
}
if (ajaxsk.readyState==4){         
data=ajaxsk.responseText;        
if(data.length>0){             
document.getElementById("sk").innerHTML=data      
}else{             
document.getElementById("sk")= "";         
}  
}

 }





