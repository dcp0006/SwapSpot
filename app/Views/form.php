<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aclonica&family=Lemon&display=swap" rel="stylesheet">
    <script src="<?= base_url()?>jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>css/formCss.css">
    <title>Registrar articulos</title>
    <link rel="shortcut icon" href="<?= base_url() ?>SwapSpot_ico.png" type="image/x-icon">
</head>
<body>
    <main>
        <h1>SwapSpot</h1>
        <p id="sessionClose"><u>Volver a pagina de usuario</u></p>
    </main>
    <article>
        <form action="<?= base_url() ?>RegisterArticle" id="registerArticle" enctype="multipart/form-data" method="post">
            <label for="name">Nombre del producto</label>
            <input type="text" name="ProductName" id="ProductName" placeholder="Name" required>
            <label for="description">Descripción del producto</label>
            <textarea name="ProductDescription" id="ProductDescription" cols="30" rows="10" required></textarea>
            <label for="number">Precio</label>
            <input type="text" name="ProductPrice" id="ProductPrice" required>
            <p>El precio debe estar con . antes de los centimos</p>
            <input type="file" name="ProductImage" id="ProductImage" class="form-control"  accept="image/*"  required>
            <div id="controles">
                <input type="submit" value="Guardar articulo">
                <input type="reset" value="Limpiar">
            </div>
        </form>
    </article>
    <script>
        $("#sessionClose").on("click",function () {
        window.location.href="<?= base_url() ?>UserPage"
    });
        document.getElementById("registerArticle").addEventListener("submit", function (event) {
        event.preventDefault();
        
        var articulosForma = /[A-Z]*[a-zA-Z]+[A-Z]*/;
        var precio = /[0-9]*[0-9]+[0-9]*/;
        if(!articulosForma.exec($("#ProductName").val()))
            alert("El nombre del articulo no cumple con los requisitos");
        else if(!articulosForma.exec($("#ProductDescription").val()) )
            alert("La descripcion del articulo no cumple con los requisitos");
        else if(!precio.exec($("#ProductPrice").val()) )
            alert("El precio no pueden ser letras");
        else
        {
            console.log($("#ProductName").val());
            console.log($("#ProductDescription").val());
            console.log($("#ProductPrice").val());
            console.log($("#ProductImage").val());
            document.getElementById("registerArticle").submit();
        }
            
        
    });
    </script>
</body>
</html>