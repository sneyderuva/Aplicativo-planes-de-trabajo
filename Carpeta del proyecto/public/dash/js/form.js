const titulo = document.getElementById("titulo");
function calcular(){
    var a = document.getElementById("v1").value,
    b = document.getElementById("v2").value;
    var r = a*b;
    document.getElementById("horas_semestre").innerText = r;
    document.getElementById("v3").value = r;
    return r;
}

const resultado=calcular();

