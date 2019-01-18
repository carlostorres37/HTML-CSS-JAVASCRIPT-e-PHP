function addBola() {
	var bola = document.createElement("div");
	bola.setAttribute("class", "bola");

	var p1 = Math.floor(Math.random() * 500);
	var p2 = Math.floor(Math.random() * 500);

    if(p1 > 1){ var cor = "background-color:#9400D3;";}
	if(p1 > 50){ var cor = "background-color:red;";}
	if(p1 > 100){ var cor = "background-color:green;";}
	if(p1 > 150){ var cor = "background-color:yellow;";}
	if(p1 > 200){ var cor = "background-color:blue;";}
	if(p1 > 250){ var cor = "background-color:#FF4500;";}
	if(p1 > 300){ var cor = "background-color:#FF00FF;";}
	if(p1 > 350){ var cor = "background-color:#00E5EE;";}
	if(p1 > 400){ var cor = "background-color:#B4EEB4;";}
	if(p1 > 450){ var cor = "background-color:#8B4C39;";}

    bola.setAttribute("style", "left:" + p1 + "px; top:" + p2 + "px;" + cor + "box-shadow: 1px 2px 1px #111;");
    bola.setAttribute("onclick", "estourar(this)");
   
    document.body.appendChild(bola);
    
}

function estourar(elemento){
	document.body.removeChild(elemento);
}
function iniciar(){
	setInterval(addBola, 1000);
}