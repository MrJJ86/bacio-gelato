<?php
include "../../config.php";
//define $error_msg='' in start.
$error_msg = '';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./login.css">
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
        <section class="login-container">
            <div class="title">
                <h2>Login</h2>
            </div>
            <div class="formulario">
                <form action="" method="POST">
                    <div class="form-container">
                        <div class="form-group">
                            <input type="text" name="name" id="name" class="form-input" placeholder=" ">
                            <label for="name" class="form-label">Nombre:</label>
                            <span class="form-line"></span>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" id="password" class="form-input" placeholder=" ">
                            <label for="password" class="form-label">Contraseña:</label>
                            <span class="form-line"></span>
                        </div>
                        <input type="submit" class="form-submit" name="btn-submit" value="Enviar">
                    </div>
                </form>
            </div>
            <span>¿No tienes una cuenta? <a href="../register/register.php">Regitrate Aquí</a></span>
            <?php
            if (isset($_POST['btn-submit'])) {
                $username = mysqli_real_escape_string($con, $_POST['name']);
                $password = mysqli_real_escape_string($con, $_POST['password']);

                $UserData = array();

                if ($username != "" && $password != "") {
                    $result = mysqli_query($con, "select * from usuario where nombre='" . $username . "' and contrasena='" . $password . "'");
                    //Fetch userdata from result.
                    $UserData = mysqli_fetch_array($result);
                    // Check userdata is empty or not.
                    if (!empty($UserData)) {
                        $error_msg = "Ingreso Exitoso";
                        $_SESSION['name'] = $username;
                    } else {
                        // Set error messages
                        $error_msg = "Nombre o contraseña invalidos";
                    }
                }
            }
            if (empty($error_msg) == false) {
                echo "<script type=\"text/javascript\">
                swal(\"\",\"{$error_msg}.\", \"error\")
                </script>";
            }
            if ($error_msg == "Ingreso Exitoso") {
                echo "<script type=\"text/javascript\">
                swal(\"\",\"{$error_msg}.\",\"success\")
                .then(() => {
                    location.href = \"/index.php\";
                });
                </script>";
            }
            ?>
        </section>
    </main>
    <?php require "../footer/footer.php" ?>
</body>

</html>