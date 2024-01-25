<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aclonica&family=Lemon&display=swap" rel="stylesheet">
    <script src="<?= base_url()?>jquery-3.7.1.min.js"></script>
    <title>Página de usuario</title>
    <link rel="shortcut icon" href="<?= base_url() ?>SwapSpot_ico.png" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url() ?>css/UserPage.css">
</head>
<body>
    <main>
        <h1>SwapSpot</h1>
         <p id="sessionClose"><u>Cerrar sesión</u></p>
    </main>
    <article>
        <div class="flex">
            <div class="content uno">
                <a href="<?=base_url()?>Compras"><h1>Ver articulos</h1></a>
            </div>
            <div class="content dos">
            <a href="<?=base_url()?>NewProducto"><h1>Añadir nuevos elementos</h1></a>
            </div>
        </div>
    </article>
</body>
<script>
    $("#sessionClose").on("click",function () {
        window.location.href="<?= base_url() ?>"
    });
</script>
</html>