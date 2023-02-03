const titulo = document.getElementById("titulo");
function calcular(){
    var a = document.getElementById("v1").value,
    b = document.getElementById("v2").value;
    var r = a*b;
    document.getElementById("horas_semestre").innerText = r;
    document.getElementById("v3").value = r;
    return r;
}
function calcular2(){
    var e1 = document.getElementById("e1").value,
    e2 = document.getElementById("e2").value;
    var x = e1*e2;
    document.getElementById("horas_semestreedit").innerText = x;
    document.getElementById("e3").value = x;
    return x;
}
var resultado=calcular();

var resultado2=calcular2();

