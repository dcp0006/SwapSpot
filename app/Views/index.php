<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aclonica&family=Lemon&display=swap" rel="stylesheet">
    <script src="<?= base_url()?>jquery-3.7.1.min.js"></script>
    <title>HOME</title>
    <link rel="shortcut icon" href="<?= base_url() ?>SwapSpot_ico.png" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url() ?>css/indexCss.css">
</head>
<body>
    <main>
        <h1>SwapSpot</h1>
    </main>
    <article>
        <div class="flex">
            <div class="uno">
                <form action="<?= base_url()?>UserPage" id="loginForm">
                    <label for="">User</label>
                    <input type="text" name="userLog" id="userLog">
                    <label>Password</label>
                    <input type="password" name="passwordLog" id="passwordLog">
                    <div id="controles">
                        <input type="submit" value="Login">
                        <input type="reset" value="Borrar Datos">
                    </div>
                </form>
            </div>
            <div class="content dos">
                <button onclick="mostrarPopup()" value="mostrar" id="boton">Registrar usuario</button>
                <dialog id="miPopup">
                <form action="<?= base_url() ?>Register" id="registerForm" method="get">
                    <label for="">User</label>
                    <input type="text" name="userId" id="userId" required data-tooltip="usuario">
                    <label>Password</label>
                    <input type="password" name="password" id="userPass" required>
                    <label>Repeat Password</label>
                    <input type="password" name="passwordConfirm" id="passwordConfirm" required>
                    <div>
                        <input type="submit" value="Register">
                    </div>
                </form>
                </dialog>
                <p>El usuario debe tener minimo una letra y ser menor o igual a 20 caracteres</p>
                <p>La contraseña no debe ser mayor de 20 caracteres</p>
            </div>
        </div>
    </article>
    <footer>

    </footer>
<script>
          var miPopup = document.getElementById("miPopup");
       function mostrarPopup() {
  
    miPopup.style.width = "400px";  
    miPopup.style.height = "300px"; 
    miPopup.style.position = "absolute";
    miPopup.style.top = "30%";
    miPopup.style.left = "46%";

    // Muestra el pop-up
    miPopup.showModal();
    }
    <?php

    $jsonString = json_encode($user);
    echo "var jsArray = " . $jsonString . ";";
    ?>
    var loged = false;
    document.getElementById("loginForm").addEventListener("submit", function (event) {
        event.preventDefault();
        for(let i = 0; i < jsArray.length ; i++)
        {
            if(jsArray[i].nombre == $("#userLog").val())
            {
                console.log("El usuario existe");
                
               if(jsArray[i].contrasenna == $("#passwordLog").val())
               {
                 console.log("La contraseña es correcta");
                 loged = true;
               }   
            }

        }
        loged? document.getElementById("loginForm").submit() : alert("El usuario o la contraseña son incorrectos");
    });

    document.getElementById("registerForm").addEventListener("submit", function (event) {
        event.preventDefault();
        let created=false;
        for(let i = 0; i < jsArray.length ; i++)
        {
            if(jsArray[i].nombre == $("#userId").val())
            {
                console.log("El usuario existe");
                created=true;
            }
        }
        var usuariosForma = /[A-Z]*[a-zA-Z]+[A-Z]*/;
        if(!(usuariosForma.exec($("#userId").val()) && $("#userId").val().length <= 20) || created )
            alert("El usuario no cumple con los requisitos");
        else if($("#userPass").val() != $("#passwordConfirm").val()) 
                alert("las contraseñas no coinciden");
        else if( $("#userPass").val().length > 20 )
                alert("la contraseña no debe ser mayor de 20 caracteres");
        else
        {
            document.getElementById("registerForm").submit();
        }
            
        
    });
</script>
</body>
</html>