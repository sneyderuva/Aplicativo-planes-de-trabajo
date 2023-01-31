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
    var a = document.getElementById("e1").value,
    b = document.getElementById("e2").value;
    var r = a*b;
    document.getElementById("horas_semestreedit").innerText = r;
    document.getElementById("e3").value = r;
    return r;
}
const resultado=calcular();

