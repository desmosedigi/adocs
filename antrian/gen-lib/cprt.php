<!-- 
<link href="gen-css/result/result.css" rel="stylesheet" type="text/css">
-->
<link href="./gen-css/slay.css" rel="stylesheet" type="text/css">
<link href="./gen-css/snav.css" rel="stylesheet" type="text/css">
<link href="./gen-css/stbl.css" rel="stylesheet" type="text/css">
<link href="./gen-css/sgrd.css" rel="stylesheet" type="text/css">
<link href="./gen-css/sfrm.css" rel="stylesheet" type="text/css">
<link href="./gen-css/sbut.css" rel="stylesheet" type="text/css">
<link href="./gen-css/scus.css" rel="stylesheet" type="text/css">
<link href="./gen-css/sfot.css" rel="stylesheet" type="text/css">
<link href="./gen-css/sdtp.css" rel="stylesheet">
<script type="text/javascript" src="gen-jss/jlax.js"></script><!--  -->
<script type="text/javascript" src="gen-jss/jlay.js"></script><!-- Layout -->
<script type="text/javascript" src="gen-jss/jsrc.js"></script><!-- Search -->
<script type="text/javascript" src="gen-jss/jmit.js"></script><!-- Submit -->
<!--<script type="text/javascript" src="my.js"></script>-->
<script language="JavaScript" src="gen-jss/jdtp.js"></script><!-- Date Picker -->
<!-- 
<script language="JavaScript" src="gen-js/calendar/ts_picker.js"></script>
<script type="text/javascript" src="gen-js/timeparse/timeparse.js"></script>
<script language="javascript" src="gen-js/format/numeric.js"></script> -->

<script type="text/javascript">
$(document).ready(function () {
	$('body').layout({ applyDefaultStyles: true });
});

var loadedobjects=""
var rootdomain="http://"+window.location.hostname

function ajaxnav(url, containerid){
	var page_request = false
	var obj=document.getElementById("childnavigate");
	if (window.XMLHttpRequest) // if Mozilla, Safari etc
		page_request = new XMLHttpRequest()
	else if (window.ActiveXObject){ // if IE
		try {
			page_request = new ActiveXObject("Msxml2.XMLHTTP")
		} 
		catch (e){
			try{
				page_request = new ActiveXObject("Microsoft.XMLHTTP")
			}
			catch (e){}
		}
	}
	else
	return false
	page_request.onreadystatechange=function(){
		loadpage(page_request, containerid)
	}
	page_request.open('GET', url, true)
	page_request.onreadystatechange = function(){
		if (page_request.readyState == 4 && page_request.status == 200 ) {
			obj.innerHTML = page_request.responseText;
		}
		else{
			obj.innerHTML = "<div align ='left'><img src='waiting.gif' alt='Loading' /></div>";
		}
	}
	page_request.send(null)
}

function ajaxmnu(url, containerid){
	var page_request = false
	var obj=document.getElementById("leftmenu");
	if (window.XMLHttpRequest) // if Mozilla, Safari etc
		page_request = new XMLHttpRequest()
	else if (window.ActiveXObject){ // if IE
		try {
			page_request = new ActiveXObject("Msxml2.XMLHTTP")
		} 
		catch (e){
			try{
				page_request = new ActiveXObject("Microsoft.XMLHTTP")
			}
			catch (e){}
		}
	}
	else
	return false
	page_request.onreadystatechange=function(){
		loadpage(page_request, containerid)
	}
	page_request.open('GET', url, true)
	page_request.onreadystatechange = function(){
		if (page_request.readyState == 4 && page_request.status == 200 ) {
			obj.innerHTML = page_request.responseText;
		}
		else{
			obj.innerHTML = "<div align ='left'><img src='waiting.gif' alt='Loading' /></div>";
		}
	}
	page_request.send(null)
}

function ajaxcenter(url, containerid){
	var page_request = false
	var obj=document.getElementById("centercolumn");
	if (window.XMLHttpRequest) // if Mozilla, Safari etc
		page_request = new XMLHttpRequest()
	else if (window.ActiveXObject){ // if IE
		try {
			page_request = new ActiveXObject("Msxml2.XMLHTTP")
		} 
		catch (e){
			try{
				page_request = new ActiveXObject("Microsoft.XMLHTTP")
			}
			catch (e){}
		}
	}
	else
	return false
	page_request.onreadystatechange=function(){
		loadpage(page_request, containerid)
	}
	page_request.open('GET', url, true)
	page_request.onreadystatechange = function(){
		if (page_request.readyState == 4 && page_request.status == 200 ) {
			obj.innerHTML = page_request.responseText;
		}
		else{
			obj.innerHTML = "<br><br><div align ='center'><img src='waiting.gif' alt='Loading' /></div>";
		}
	}
	page_request.send(null)
}

function ajaxleft(url, containerid){
	var page_request = false
	var obj=document.getElementById("leftcolumn");
	if (window.XMLHttpRequest) // if Mozilla, Safari etc
		page_request = new XMLHttpRequest()
	else if (window.ActiveXObject){ // if IE
		try {
			page_request = new ActiveXObject("Msxml2.XMLHTTP")
		} 
		catch (e){
			try{
				page_request = new ActiveXObject("Microsoft.XMLHTTP")
			}
			catch (e){}
		}
	}
	else
	return false
	page_request.onreadystatechange=function(){
		loadpage(page_request, containerid)
	}
	page_request.open('GET', url, true)
	page_request.onreadystatechange = function(){
		if (page_request.readyState == 4 && page_request.status == 200 ) {
			obj.innerHTML = page_request.responseText;
		}
		else{
			obj.innerHTML = "<div align ='left'><img src='waiting.gif' alt='Loading' /></div>";
		}
	}
	page_request.send(null)
}
function ajaxleft_top(url, containerid){
	var page_request = false
	var obj=document.getElementById("leftcolumn_top");
	if (window.XMLHttpRequest) // if Mozilla, Safari etc
		page_request = new XMLHttpRequest()
	else if (window.ActiveXObject){ // if IE
		try {
			page_request = new ActiveXObject("Msxml2.XMLHTTP")
		} 
		catch (e){
			try{
				page_request = new ActiveXObject("Microsoft.XMLHTTP")
			}
			catch (e){}
		}
	}
	else
	return false
	page_request.onreadystatechange=function(){
		loadpage(page_request, containerid)
	}
	page_request.open('GET', url, true)
	page_request.onreadystatechange = function(){
		if (page_request.readyState == 4 && page_request.status == 200 ) {
			obj.innerHTML = page_request.responseText;
		}
		else{
			obj.innerHTML = "<div align ='left'><img src='waiting.gif' alt='Loading' /></div>";
		}
	}
	page_request.send(null)
}

function ajaxleft_bottom(url, containerid){
	var page_request = false
	var obj=document.getElementById("leftcolumn_bottom");
	if (window.XMLHttpRequest) // if Mozilla, Safari etc
		page_request = new XMLHttpRequest()
	else if (window.ActiveXObject){ // if IE
		try {
			page_request = new ActiveXObject("Msxml2.XMLHTTP")
		} 
		catch (e){
			try{
				page_request = new ActiveXObject("Microsoft.XMLHTTP")
			}
			catch (e){}
		}
	}
	else
	return false
	page_request.onreadystatechange=function(){
		loadpage(page_request, containerid)
	}
	page_request.open('GET', url, true)
	page_request.onreadystatechange = function(){
		if (page_request.readyState == 4 && page_request.status == 200 ) {
			obj.innerHTML = page_request.responseText;
		}
		else{
			obj.innerHTML = "<div align ='left'><img src='waiting.gif' alt='Loading' /></div>";
		}
	}
	page_request.send(null)
}
/*
function getClass(url,containerid,key){
	var obj=document.getElementById("classification");
	var url=url+'?con=1&key='+key;
	
	xmlhttp1.open("GET", url);
	
	xmlhttp1.onreadystatechange = function() {
		if ( xmlhttp1.readyState == 4 && xmlhttp1.status == 200 ) {
			obj.innerHTML = xmlhttp1.responseText;
		} else {
			obj.innerHTML = "<div align ='left'><img src='waiting.gif' alt='Loading' /></div>";
		}
	}
	xmlhttp1.send(null);
}
*/
function getCom(url,container_id,key_id_1,key_id_2,key_id_3,key_id_4,key_id_5) { /*variabel maksimal berisi 3 variabel*/
	if (window.XMLHttpRequest) {
		xmlhttp3 = new XMLHttpRequest();
	} 
	else { 
		xmlhttp3 = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp3.onreadystatechange=function() {
		if (xmlhttp3.readyState==4 && xmlhttp3.status==200) {
			document.getElementById(container_id).innerHTML=xmlhttp3.responseText;
		}
	}
	xmlhttp3.open("GET",url+"?key_id_1="+key_id_1+"&key_id_2="+key_id_2+"&key_id_3="+key_id_3+"&key_id_4="+key_id_4+"&key_id_5="+key_id_5,true);
	xmlhttp3.send();
}

function getObject(url,containerid,key){
	var obj=document.getElementById("objective");
	var url=url+'?con=1&key='+key;
	
	xmlhttp2.open("GET", url);
	
	xmlhttp2.onreadystatechange = function() {
		if ( xmlhttp2.readyState == 4 && xmlhttp2.status == 200 ) {
			obj.innerHTML = xmlhttp2.responseText;
		} else {
			obj.innerHTML = "<div align ='left'><img src='waiting.gif' alt='Loading' /></div>";
		}
	}
	xmlhttp2.send(null);
}

function ajaxchange(url, containerid){
	var page_request = false
	var obj=document.getElementById("bottomcolumn");
	if (window.XMLHttpRequest) // if Mozilla, Safari etc
		page_request = new XMLHttpRequest()
	else if (window.ActiveXObject){ // if IE
		try {
			page_request = new ActiveXObject("Msxml2.XMLHTTP")
		} 
		catch (e){
			try{
				page_request = new ActiveXObject("Microsoft.XMLHTTP")
			}
			catch (e){}
		}
	}
	else
	return false
	page_request.onreadystatechange=function(){
		loadpage(page_request, containerid)
	}
	page_request.open('GET', url, true)
	page_request.onreadystatechange = function(){
		if (page_request.readyState == 4 && page_request.status == 200 ) {
			obj.innerHTML = page_request.responseText;
		}
		else{
			obj.innerHTML = "<div align ='left'><img src='waiting.gif' alt='Loading' /></div>";
		}
	}
	page_request.send(null)
}

function loadpage(page_request, containerid){
	if (page_request.readyState == 4 && (page_request.status==200 || window.location.href.indexOf("http")==-1))
	document.getElementById(containerid).innerHTML=page_request.responseText
}

function loadobjs(){
	if (!document.getElementById)
	return
	for (i=0; i<arguments.length; i++){
		var file=arguments[i]
		var fileref=""
		if (loadedobjects.indexOf(file)==-1){ //Check to see if this object has not already been added to page before proceeding
			if (file.indexOf(".js")!=-1){ //If object is a js file
				fileref=document.createElement('script')
				fileref.setAttribute("type","text/javascript");
				fileref.setAttribute("src", file);
			}
			else if (file.indexOf(".css")!=-1){ //If object is a css file
				fileref=document.createElement("link")
				fileref.setAttribute("rel", "stylesheet");
				fileref.setAttribute("type", "text/css");
				fileref.setAttribute("href", file);
			}
		}
		if (fileref!=""){
			document.getElementsByTagName("head").item(0).appendChild(fileref)
			loadedobjects+=file+" " //Remember this object as being already added to page
		}
	}
}

//cari tabel
function cari(url,key,idx,idy){
	var obj=document.getElementById("pencarian");
	var url=url+'?con=1&idx='+idx+'&idy='+idy+'&key='+key;
	
	xmlhttp.open("GET", url);
	
	xmlhttp.onreadystatechange = function() {
		if ( xmlhttp.readyState == 4 && xmlhttp.status == 200 ) {
			obj.innerHTML = xmlhttp.responseText;
		} else {
			obj.innerHTML = "<div align ='left'><img src='waiting.gif' alt='Loading' /></div>";
		}
	}
	xmlhttp.send(null);
}

//cari tabel
function cari2(url,key,idx,idy){
	var obj=document.getElementById("pencarian");
	var url=url+'&con=1&idx='+idx+'&idy='+idy+'&key='+key;
	
	xmlhttp.open("GET", url);
	
	xmlhttp.onreadystatechange = function() {
		if ( xmlhttp.readyState == 4 && xmlhttp.status == 200 ) {
			obj.innerHTML = xmlhttp.responseText;
		} else {
			obj.innerHTML = "<div align ='left'><img src='waiting.gif' alt='Loading' /></div>";
		}
	}
	xmlhttp.send(null);
}

//cari tabel
function cari_cat(url,key,catid){
	var obj=document.getElementById("pencarian");
	var url=url+'?con=1&key='+key+'&catid='+catid;
	
	xmlhttp.open("GET", url);
	
	xmlhttp.onreadystatechange = function() {
		if ( xmlhttp.readyState == 4 && xmlhttp.status == 200 ) {
			obj.innerHTML = xmlhttp.responseText;
		} else {
			obj.innerHTML = "<div align ='left'><img src='waiting.gif' alt='Loading' /></div>";
		}
	}
	xmlhttp.send(null);
}

//cari tabel
function carif(url,keyid){
	var obj=document.getElementById("carif");
	var url=url+'?con=1&keyid='+keyid;
	
	xmlhttp.open("GET", url);
	
	xmlhttp.onreadystatechange = function() {
		if ( xmlhttp.readyState == 4 && xmlhttp.status == 200 ) {
			obj.innerHTML = xmlhttp.responseText;
		} else {
			obj.innerHTML = "<div align ='left'><img src='waiting.gif' alt='Loading' /></div>";
		}
	}
	xmlhttp.send(null);
}

//cari history
function history(url,keydate,keywell){
	var obj=document.getElementById("idhistory");
	var url=url+'&con=1&keywell='+keywell+'&keydate='+keydate;
	
	xmlhttp.open("GET", url);
	
	xmlhttp.onreadystatechange = function() {
		if ( xmlhttp.readyState == 4 && xmlhttp.status == 200 ) {
			obj.innerHTML = xmlhttp.responseText;
		} else {
			obj.innerHTML = "<div align ='left'><img src='waiting.gif' alt='Loading' /></div>";
		}
	}
	xmlhttp.send(null);
}

//cari history
function detail(url,hisid){
	var obj=document.getElementById("iddetail");
	var url=url+'&hisid='+hisid;

	xmlhttp.open("GET", url);
	
	xmlhttp.onreadystatechange = function() {
		if ( xmlhttp.readyState == 4 && xmlhttp.status == 200 ) {
			obj.innerHTML = xmlhttp.responseText;
		} else {
			obj.innerHTML = "<div align ='left'><img src='waiting.gif' alt='Loading' /></div>";
		}
	}
	xmlhttp.send(null);
}

/*function submitForm(form){
    $(form).ajaxSubmit({	  
	  success: function(response){ // jika proses pada server selesai
	  	if(response.indexOf('Succeeded') > -1){ // jika response mengandung kata "Sukses"
		 alert(response);
		 //$(form).clearForm(); // mengosongkan semua inputan
		 //$(form).back(); // mengosongkan semua inputan
		}else alert('Error: '+response);
	  }
	}); /// end ajax submit
  	return false; // untuk mencegah form mengirim langung data ke proses.php
   }*/
	//=== START SUBMIT ===//
	function submitForm(form, url, containerid){
		var page_request = false
		page_request.innerHTML = "<br><br><div align ='center'><img src='waiting.gif' alt='Loading' /></div>";
		$(form).ajaxSubmit({	  
			success: function(response){ // jika proses pada server selesai
			if(response.indexOf('Succeeded') > -1){ // jika response mengandung kata "Sukses"
				alert(response);
			 	//$(form).clearForm(); // mengosongkan semua inputan
			 	//$(form).back(); // mengosongkan semua inputan
				if (window.XMLHttpRequest) // if Mozilla, Safari etc
					page_request = new XMLHttpRequest()
				else if (window.ActiveXObject){ // if IE
					try{
						page_request = new ActiveXObject("Msxml2.XMLHTTP")
					} 
					catch (e){
						try{
							page_request = new ActiveXObject("Microsoft.XMLHTTP")
						}
						catch (e){}
					}
				}
				else
				return false
				
				page_request.onreadystatechange=function(){
					loadpage(page_request, containerid);
				}
				page_request.open('GET', url, true)
				page_request.send(null)
			}
			else
				alert('Error: '+response);
		  	}
		}); /// end ajax submit
		return false; // untuk mencegah form mengirim langung data ke proses.php
   	}
	//=== END SUBMIT ===//
	
	//=== START FORMAT ANGKA ===//
	// thousand separates a digit-only string using commas
	// by element:  onkeyup = "ThousandSeparate(this)"
	// by ID:       onkeyup = "ThousandSeparate('txt1','lbl1')"
	function ThousandSeparate()
	{
		if (arguments.length == 1)
		{
			var V = arguments[0].value;
			V = V.replace(/,/g,'');
			var R = new RegExp('(-?[0-9]+)([0-9]{3})'); 
			while(R.test(V))
			{
				V = V.replace(R, '$1,$2');
			}
			arguments[0].value = V;
		}
		else  if ( arguments.length == 2)
		{
			var V = document.getElementById(arguments[0]).value;
			var R = new RegExp('(-?[0-9]+)([0-9]{3})'); 
			while(R.test(V))
			{
				V = V.replace(R, '$1,$2');
			}
			document.getElementById(arguments[1]).innerHTML = V;
		}
		else return false;
	}
	//=== END FORMAT ANGKA ===//
	
	//=== START LABEL KABUR PADA TEXTBOX SEARCH ===//
	function inputFocus(i){
		if(i.value==i.defaultValue){ i.value=""; i.style.color="#000"; }
	}
	function inputBlur(i){
		if(i.value==""){ i.value=i.defaultValue; i.style.color="#888"; }
	}
	//==== END LABEL KABUR PADA TEXTBOX SEARCH ===//
</script>