<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bacio Gelato</title>
    <?php
    require "./src/header/header.php"
    ?>
    <link rel="stylesheet" href="./src/reboot/reboot.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./src/log-user/log-user.css">
    <link rel="stylesheet" href="./src/products/products.css">
    <link rel="stylesheet" href="./src/footer/footer.css">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <header>
        <nav class="menu">
            <label for="menu">
                <img class="open" src="./assets/icons/icon_menu.png" alt="icon-menu">
                <img class="close" src="./assets/icons/icon_close.png" alt="icon-close">
            </label>
            <input type="checkbox" name="menu" id="menu" class="menu">
            <div class="brand">
                <div class="icon">
                    <img class="icon" src="/assets/icons/Deli-Cream.png" alt="icon">
                </div>
                <div class="brand-title">
                    <h1>Bacio Gelato</h1>
                </div>
            </div>
            <ul class="menu-dropdown">
                <li class="navigator"><a href="#title">Inicio</a></li>
                <li class="navigator"><a href="#products">Productos</a></li>
                <li class="navigator"><a href="#findus">Búscanos</a></li>
            </ul>
        </nav>
        <?php
        require "./src/log-user/log-user.php";
        echo $log_user;
        ?>
    </header>
    <main>
        <section class="title-container" id="title">
            <div class="title">
                <h2>Encuentra tú helado Favorito</h2>
            </div>
        </section>
        <section class="products" id="products">
            <h2>Nuestros Productos</h2>
            <?php require "./src/products/products.php" ?>
        </section>
        <section class="findus" id="findus">
            <div class="subtitle">
                <h2>Dirección</h2>
            </div>
            <div class="text">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d249.1835949310988!2d-79.87648533405303!3d-2.1774283253287474!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x902d6dcd61555555%3A0x4b04601204e13947!2sNitroworld%20Ice%20Cream%20Shop!5e0!3m2!1ses-419!2sec!4v1672259960900!5m2!1ses-419!2sec" width="600" height="450" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>
    </main>
    <?php require "./src/footer/footer.php" ?>
</body>

</html>