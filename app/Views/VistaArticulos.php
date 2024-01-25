<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aclonica&family=Lemon&display=swap" rel="stylesheet">
    <script src="<?= base_url()?>jquery-3.7.1.min.js"></script>
    <title>Articulos</title>
    <link rel="shortcut icon" href="<?= base_url() ?>SwapSpot_ico.png" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url() ?>css/VistaArticulos.css">
</head>
<body>
    <main>
         <h1 id="titulo">SwapSpot</h1>
         <nav>
        <form action="<?=base_url()?>NewProducto" id="Buscador" >
             <h2>Buscador</h2>
             <input type="text" placeholder="Introduce tu busqueda" name="busqueda" id="busqueda">
             <input type="submit" value="Buscar"> 
             <input type="button" value="Limpiar" id="Limpiar"> 
             <label id="sessionClose"><u>Volver a pagina de usuario</u></label>     
        </form>
        </nav>
    </main>
    <article id="container">
    </article>
<script>
        $("#sessionClose").on("click",function () {
        window.location.href="<?= base_url() ?>UserPage"
    });
        <?php
        $jsonString = json_encode($articles);
        echo "var jsArray = " . $jsonString . ";";
        ?>
        function rellenar() {
            for (let i = 0; i < jsArray.length; i++) {
                        let newItem = document.createElement("div");
                        let image = document.createElement("img");
                        let name = document.createElement("h2");
                        let desc = document.createElement("p");
                        let price = document.createElement("p");
                        newItem.id=i;
                        newItem.style.backgroundColor="white";
                        newItem.style.marginBottom="10px"
                        newItem.style.border="solid 2px";
                        image.src="../public/uploads/" + jsArray[i].image;
                        image.style.width="350px";
                        image.style.height="300px";
                        image.style.margin="0";
                        image.style.border="solid 1px";
                        name.innerHTML = jsArray[i].nombre;
                        name.style.maxWidth = "350px";
                        desc.innerHTML = jsArray[i].descripcion;
                        desc.style.maxWidth = "350px";
                        desc.style.overflowX = "hidden";
                        desc.style.overflowY = "scroll";
                        desc.style.wordWrap =" break-word";
                        desc.style.margin="0";
                        desc.style.padding="0 10%";
                        desc.style.border="solid 1px";
                        price.innerHTML=jsArray[i].precio + "€";
                        price.style.fontSize="2rem";
                        document.getElementById("container").appendChild(newItem);
                        document.getElementById(i).appendChild(image);
                        document.getElementById(i).appendChild(name);
                        document.getElementById(i).appendChild(desc);
                        document.getElementById(i).appendChild(price);
                    }
        };
        $(document).ready(function(){
            rellenar();
        });
        document.getElementById("Buscador").addEventListener("submit",function(event){
            event.preventDefault();
            let padre = document.getElementById("container");
            while (padre.firstElementChild) {
                padre.removeChild(padre.firstElementChild);
            };
               let i = 0;
               let fallos = 0;
                while ( i < jsArray.length)
                {
                    if(jsArray[i].nombre == $("#busqueda").val())
                    {
                        let newItem = document.createElement("div");
                        let image = document.createElement("img");
                        let name = document.createElement("h2");
                        let desc = document.createElement("p");
                        let price = document.createElement("p");
                        newItem.id=i;
                        newItem.style.backgroundColor="white";
                        newItem.style.marginBottom="10px"
                        image.src="../public/uploads/" + jsArray[i].image;
                        image.style.width="350px";
                        image.style.height="300px";
                        image.style.margin="0";
                        name.innerHTML = jsArray[i].nombre;
                        name.style.maxWidth = "350px";
                        desc.innerHTML = jsArray[i].descripcion;
                        desc.style.maxWidth = "350px";
                        desc.style.overflowX = "hidden";
                        desc.style.overflowY = "scroll";
                        desc.style.wordWrap =" break-word";
                        price.innerHTML=jsArray[i].precio;
                        document.getElementById("container").appendChild(newItem);
                        document.getElementById(i).appendChild(image);
                        document.getElementById(i).appendChild(name);
                        document.getElementById(i).appendChild(desc);
                        document.getElementById(i).appendChild(price);
                        
                    }
                    else
                    {
                        fallos ++;
                    }
                    i++;
                }
                if(fallos == jsArray.length ||  $("#busqueda").val() == "")
                {
                    if(!$("#busqueda").val() == "") alert("No se encontro el resultado");
                   
                    setTimeout(() => {
                        
                       rellenar();
                    
                    }, 500);
                }

                $("#Limpiar").click(function () {
                    let padre = document.getElementById("container");
                    while (padre.firstElementChild) {
                        padre.removeChild(padre.firstElementChild);
                    }; 
                    $("#busqueda").val("");
                    setTimeout(() => {
                        rellenar();
                    }, 100);
                });
        });
</script>
</body>
</html>
