function SomenteNumero(e){
    var tecla=(window.event)?event.keyCode:e.which;   
    if((tecla>47 && tecla<58)) return true;
    else{
    	if (tecla==8 || tecla==0) return true;
	else  return false;
    }
}


function makeDate(id){
	obj = document.getElementById(id);
	vl = obj.value;
	l = vl.toString().length;
	switch(l){
		case 2:
			obj.value = vl + "/";
		break;
		case 5:
			obj.value = vl + "/";
		break;
	}
}

function makeHora(id){
	obj = document.getElementById(id);
	vl = obj.value;
	l = vl.toString().length;
	switch(l){
		case 2:
			obj.value = vl + ":";
		break;
		
	}
}