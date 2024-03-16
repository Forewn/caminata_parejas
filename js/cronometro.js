const descalificarBtn = document.querySelector(".eliminar");
const bodyElement = document.body;

descalificarBtn.addEventListener("click", descalificarTiempo);
bodyElement.addEventListener("keydown", function(event) {
    if (event.key === "Escape") {
        descalificarTiempo();
    }
});

function descalificarTiempo() {
    const numeroPareja = document.querySelector('input[type="number"]').value;
    
    if (numeroPareja.trim() === "") {
        alert("Por favor, ingresa el número de pareja antes de descalificar");
        return;
    }

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "./php/descalificar.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Enviar los datos al servidor
    const tiempoActual = `${hr}:${min}:${sec}.${ms}`;
    xhr.send(`numeroPareja=${numeroPareja}&tiempo=${tiempoActual}`);


    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.responseText);
            // Limpiar el contenido del campo de entrada después de descalificar
            document.querySelector('input[type="number"]').value = "";
        }
    };
}


function registrarTiempo() 
{
    // Obtener el número de pareja (puedes obtenerlo de algún input o donde sea que lo tengas)
    const numeroPareja = document.querySelector('input[type="number"]').value;

    // Verificar que haya un número de pareja ingresado
    if (numeroPareja.trim() === "") {
        alert("Por favor, ingresa el número de pareja antes de registrar el tiempo.");
        return;
    }

    // Realizar la petición AJAX
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "./php/guardar_tiempo.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Enviar los datos al servidor
    const tiempoActual = `${hr}:${min}:${sec}.${ms}`;
    xhr.send(`numeroPareja=${numeroPareja}&tiempo=${tiempoActual}`);

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            console.log(xhr.responseText);
            // Limpiar el contenido del campo de entrada después de registrar
            document.querySelector('input[type="number"]').value = "";
        }
    };
}

// Agregar un evento de teclado al campo de entrada
const inputNumeroPareja = document.querySelector('input[type="number"]');
inputNumeroPareja.addEventListener("keyup", function(event) {
    // Verificar si la tecla presionada es "Enter" (código 13)
    if (event.key === "Enter") {
        registrarTiempo();
    }
});


let hr = min = sec = ms = "0" + 0, startTimer;

const startBtn = document.querySelector(".start"), 
 stopBtn = document.querySelector(".stop"),
 resetBtn =  document.querySelector(".reset");

startBtn.addEventListener("click", start);
stopBtn.addEventListener("click", stop);
resetBtn.addEventListener("click", reset);

function start()
{
    startBtn.classList.add("active");
    stopBtn.classList.remove("stopActive");
    

    startTimer = setInterval(() => 
    {
        ms++;
        ms = ms < 10 ? "0" + ms :ms;
        if (ms==100)
        {
            sec++;
            sec = sec < 10 ? "0" + sec : sec;
            ms = "0" + 0;
        }
        if (sec==60)
        {
            min++;
            min = min < 10 ? "0" + min : min;
            sec = "0" + 0;
        }
        if (min==60)
        {
            hr++;
            hr = hr < 10 ? "0" + hr : hr;
            min = "0" + 0;
        }
       
            putValue();
    },10);
}

function stop()
{
    startBtn.classList.remove("active");
    stopBtn.classList.remove("stopActive");
    clearInterval(startTimer);
}

function reset()
{
    startBtn.classList.remove("active");
    stopBtn.classList.remove("stopActive");
    clearInterval(startTimer);
    ht = min = sec = ms = "0" + 0;
    putValue();
}

function putValue()
{
   document.querySelector('.millisecond').innerHTML=ms;

   document.querySelector('.second').innerHTML=sec;
   document.querySelector('.minute').innerHTML=min;
   document.querySelector('.hour').innerHTML=hr;
}

