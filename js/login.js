document.addEventListener('DOMContentLoaded', ()=>{
    document.querySelector('form').addEventListener('submit', verifyData)
});

function verifyData(event){
    const form = document.querySelector('form');
    event.preventDefault();
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    let request = new XMLHttpRequest();
    request.open('GET', `./php/login.php?username=${username}&password=${password}`);
    request.onload = function(){
        console.log(this.responseText);
        switch(this.responseText){
            case '200':
                window.location.href = "./cronometro.php";
                break;
            case '102':
                swal({
                    tittle: "Ha habido un error",
                    text: "Contraseña incorrecta",
                    type: "warning"
                })
                break;
            case '101':
                swal({
                    tittle: "Ha habido un error",
                    text: "Usuario no existe",
                    type: "warning"
                })
                break;
            default:
                console.log("hola");
           
        }

    }
    request.send();
}