<!DOCTYPE html>
<html>
<head>
	<title>CRUDE WEBAPP</title>


<script type="text/javascript">

	
showaddpost();


showdata();

setInterval(showdata, 3000);	

setInterval(msgremove, 4000);	



function showaddpost(){


	var obj;

	if (window.XMLHttpRequest) {
obj = new XMLHttpRequest()

	}

	else{

obj = new ActiveXObject("Microsoft.XMLHTTP")

	}

obj.onreadystatechange = function(){

if (obj.readyState == 4 && obj.status == 200) {

	document.getElementById('showform').innerHTML = obj.responseText
			
			}




}


obj.open("POST","formprocess.php")
		obj.setRequestHeader("content-type","application/X-www-form-urlencoded");
		obj.send("action=showform");

}


function addpost(){

// alert("1");
// return 1;	

var posttitles=document.getElementById("posttitle").value
var postsumm=document.getElementById("postsum").value
var postdesc=document.getElementById("postdes").value



if (posttitle==""||postsumm==""||postdesc=="") {
document.getElementById("message").innerHTML="<h1 style='color:red'>ALL FIELDS ARE REQUIRED....!</h1>"
 return 1
}

	var obj;

	if (window.XMLHttpRequest) {
obj = new XMLHttpRequest()

	}

	else{

obj = new ActiveXObject("Microsoft.XMLHTTP")

	}

obj.onreadystatechange = function(){

if (obj.readyState == 4 && obj.status == 200) {

	document.getElementById('message').innerHTML = obj.responseText


			
			}

			if (obj.responseText=="<h1 style='color:green' > POST ADDED SUCCESSFULLY</h1>") {
cancel()
showdata();


	}

}


obj.open("POST","formprocess.php")
obj.setRequestHeader("content-type","application/X-www-form-urlencoded");

obj.send("action=addpost&posttitles="+posttitles+"&postsumm="+postsumm+"&postdesc="+postdesc);
		

}




function showdata(){


	var obj;

	if (window.XMLHttpRequest) {
obj = new XMLHttpRequest()

	}

	else{

obj = new ActiveXObject("Microsoft.XMLHTTP")

	}

obj.onreadystatechange = function(){

if (obj.readyState == 4 && obj.status == 200) {

	document.getElementById('showdata').innerHTML = obj.responseText
			
			}

}


obj.open("POST","formprocess.php")
		obj.setRequestHeader("content-type","application/X-www-form-urlencoded");
		obj.send("action=showdata");

}


function del(id){

$flag=confirm("DO YOU REALLY WANT TO DELETE THIS  RECORD")

if ($flag==false) {

return 1

}


// alert("1")
// return 1
var obj;

	if (window.XMLHttpRequest) {
obj = new XMLHttpRequest()

	}

	else{

obj = new ActiveXObject("Microsoft.XMLHTTP")

	}

obj.onreadystatechange = function(){

if (obj.readyState == 4 && obj.status == 200) {

	document.getElementById('message').innerHTML = obj.responseText
			
			}

if (obj.responseText=="<h1 style='color:green' > RECORD DELETED  SUCCESSFULLY</h1>") {
showdata()
	}

}


obj.open("POST","formprocess.php")
		obj.setRequestHeader("content-type","application/X-www-form-urlencoded");
		obj.send("action=deletedata&pid="+id);




}



function edit(id){

var obj;

	if (window.XMLHttpRequest) {
obj = new XMLHttpRequest()

	}

	else{

obj = new ActiveXObject("Microsoft.XMLHTTP")

	}

obj.onreadystatechange = function(){

if (obj.readyState == 4 && obj.status == 200) {


	document.getElementById('showform').innerHTML = obj.responseText
			
			}


}


obj.open("POST","formprocess.php")
		obj.setRequestHeader("content-type","application/X-www-form-urlencoded");
		obj.send("action=editdata&peid="+id);


}


function update(id){
  
 // alert("working")
 // return 1 

	var name=document.getElementById('posttitleu').value

	var psum=document.getElementById('postsumu').value

	var pdesc=document.getElementById('postdesu').value

var obj;

	if (window.XMLHttpRequest) {
obj = new XMLHttpRequest()

	}

	else{

obj = new ActiveXObject("Microsoft.XMLHTTP")

	}

obj.onreadystatechange = function(){

if (obj.readyState == 4 && obj.status == 200) {


	document.getElementById('message').innerHTML = obj.responseText

	
	}




if (obj.responseText=="<h1 style='color:green' > DATA UPDATED SUCCESSFULLY</h1>") {
showaddpost()
showdata()
	}



}


obj.open("POST","formprocess.php")
		obj.setRequestHeader("content-type","application/X-www-form-urlencoded");

obj.send("action=updatedata&puid="+id+"&psname="+name+"&pssum="+psum+"&psdesc="+pdesc);

		// obj.send("action=updatedata&puid="+id);


}

function msgremove(){

	document.getElementById('message').innerHTML=""
}


function searchdata(){


// alert("helloe");
// return 1

var data= document.getElementById('search').value

var obj;

	if (window.XMLHttpRequest) {
obj = new XMLHttpRequest()

	}

	else{

obj = new ActiveXObject("Microsoft.XMLHTTP")

	}

obj.onreadystatechange = function(){

if (obj.readyState == 4 && obj.status == 200) {


	document.getElementById('showsearch').innerHTML = obj.responseText

	
	}



}


obj.open("POST","formprocess.php")
obj.setRequestHeader("content-type","application/X-www-form-urlencoded");

obj.send("action=searchdata&sdata="+data);

}


function cancel(){

document.getElementById('posttitle').value=""

document.getElementById('postsum').value=""

document.getElementById('postdes').value=""
}



function cancel2(){

document.getElementById('posttitleu').value=""

document.getElementById('postsumu').value=""

document.getElementById('postdesu').value=""
}


function X(){

document.getElementById('showsearch').innerHTML=""

}

</script>



</head>
<body style="background-color: yellow;">

	
<div id="showform"></div>
<div id="message"></div>
<br>
<div id="showsearch"></div>
<br>
<div id="showdata"></div>

</body>
</html>