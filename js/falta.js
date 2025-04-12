document.addEventListener('DOMContentLoaded', function() {
    
    document.getElementById('formularioParejas').addEventListener('submit', enviarDatos);
});

function enviarDatos(e) {
    e.preventDefault(); 
    let request = new XMLHttpRequest();
    if(document.getElementById('numPareja').value != "" && document.getElementById('numFaltas').value != ""){
        let content = formarData();
        request.open('POST', './php/sumarFalta.php');
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
        request.onload = function(){
            alert(this.responseText);
        }
        request.send(content);
        alert('Datos enviados.');
    }
    else{
        alert("Está enviando datos en blanco")
    }
}

function formarData(){
    var string = "";
    string += `numPareja=`
    string += document.getElementById(`numPareja`).value
    string += "&";
    string += `numFaltas=`;
    string += document.getElementById(`numFaltas`).value;
    return string;
}