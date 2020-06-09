let cadea = "";
cadea ="<table class='table table-striped'><thead><tr class='danger'><th class='text-center'>Tabla de multiplicar del 7</th><th class='text-center'>Tabla de sumar del 8</th><th class='text-center'>Tabla de dividir del 9</th></tr></thead>";
        
cadea= cadea +"<tbody><tr class='success'><td class='text-center'>";

let i;
for(i=0; i<=10; i++){
    cadea=cadea+"7 X "+i+" = "+7*i+"<br/>";
}

cadea=cadea+"</td><td class='text-center'>";


let j = 0;

while(j<=10){
    cadea=cadea+"8 + "+j+" = "+(8+j)+"<br>";
    j++;
}

cadea=cadea+"</td><td class='text-center'>";
let k=0;
do{
    cadea=cadea+"9 / "+k+" = "+(9/k)+"</br>";
    k++;
}while (k<=10);

cadea=cadea+"</td></tr></tbody></table>";

document.getElementById("01").innerHTML=cadea;

let cadea2 = "<h3><b>OPERACIONES CON DESPLAZAMIENTO DE BITS</b></h3><br>";

cadea2=cadea2+"<p>125 / 8 = "+(125>>3)+"</p><br>";

cadea2 = cadea2+"<p>40 x 4 = "+(40<<2)+"</p><br>";

cadea2 = cadea2+"<p>25 / 2 = "+(25>>1)+"</p><br>";

cadea2 = cadea2+"<p>10 x 16 = "+(10<<4)+"</p><br>";

document.getElementById("02").innerHTML=cadea2;


