<?php
include "../../config.php";
//define $error_msg='' in start.
$error_msg = '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./register.css">
    <link rel="stylesheet" href="../footer/footer.css">
</head>

<body>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <header>
        <div class="icon">
            <img class="icon" src="/assets/icons/Deli-Cream.png" alt="icon">
        </div>
        <div class="brand-title">
            <a href="../../index.php">
                <h1>Bacio Gelato</h1>
            </a>
        </div>
    </header>
    <main>
        <section class="register-container">
            <div class="title">
                <h2>Registro</h2>
            </div>
            <div class="formulario">
                <form action="" method="POST">
                    <div class="form-container">
                        <div class="form-group">
                            <input type="text" name="name" id="name" class="form-input" placeholder=" " required>
                            <label for="name" class="form-label">Nombre:</label>
                            <span class="form-line"></span>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-input" placeholder=" " required>
                            <label for="email" class="form-label">Email:</label>
                            <span class="form-line"></span>
                        </div>
                        <div class="form-group">
                            <input type="date" name="date" id="date" class="form-input" placeholder=" " required>
                            <label for="date" class="form-label">Fecha de Nacimiento:</label>
                            <span class="form-line"></span>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" id="password" class="form-input" placeholder=" " required>
                            <label for="password" class="form-label">Contraseña:</label>
                            <span class="form-line"></span>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password-confirm" id="password-confirm" class="form-input" placeholder=" " required>
                            <label for="password-confirm" class="form-label">Confirmar contraseña:</label>
                            <span class="form-line"></span>
                        </div>
                        <input type="submit" class="form-submit" name="btn-submit" value="Registrarse">
                    </div>
                </form>
            </div>
            <span>¿Tienes una cuenta? <a href="../login/login.php">Inicia sesión</a></span>
            <?php
            if (isset($_POST['btn-submit'])) {

                $name = $_POST['name'];
                $email = $_POST['email'];
                $date = $_POST['date'];
                $password = $_POST['password'];
                $password_confirm = $_POST['password-confirm'];

                try {

                    $query_email = mysqli_query($con, "select * from usuario where email='{$email}'");
                    $today = date("Y-m-d");
                    $max = date("Y-m-d", strtotime($today . "- 16 year"));
                    $min = date("Y-m-d", strtotime($today . "- 60 year"));

                    if (mysqli_num_rows($query_email) == 1) {
                        throw new Exception("Email en uso");
                    }
                    if ($date > $max or $date < $min) {
                        throw new Exception("Fecha invalida");
                    }
                    if ($password !== $password_confirm) {
                        throw new Exception("Las contraseñas no son identicas");
                    }

                    mysqli_query($con, "insert into usuario values(null, '{$name}', '{$email}', '{$password}', '{$date}')");

                    $query = mysqli_query($con, "select * from usuario where email='{$email}'");

                    if (mysqli_num_rows($query) == 1) {
                        $error_msg = "Registro Exitoso";
                    } else {
                        $error_msg = "Fallo del servidor en el registro";
                    }
                } catch (Exception $e) {
                    $error_msg = "{$e->getMessage()}";
                }
                if (empty($error_msg) == false) {
                    echo "<script type=\"text/javascript\">
                    swal(\"\",\"{$error_msg}.\", \"error\");
                    </script>";
                }
                if ($error_msg == "Registro Exitoso") {
                    echo "<script type=\"text/javascript\">
                    swal(\"\",\"{$error_msg}.\",\"success\")
                    .then(() => {
                        location.href = \"/src/login/login.php\";
                    });
                    </script>";
                }
            }
            ?>
        </section>
    </main>
    <?php require "../footer/footer.php" ?>
</body>

</html>