<?php
    include "../../config.php";
    if(empty($_POST)){
        echo "<!DOCTYPE html>
        <html lang=\"es\">
        <head>
            <meta charset=\"UTF-8\">
            <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
            <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
            <title>Error</title>
            <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
            <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>
            <link href=\"https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap\" rel=\"stylesheet\">
            <style>body{font-family:\"Raleway\", sans-serif;}</style>
        </head>
        <body>
        <script src=\"https://unpkg.com/sweetalert/dist/sweetalert.min.js\"></script>
        <script type=\"text/javascript\">
        swal(\"Error\",\"Ninguno de los productos fue seleccionado\",\"error\")
        .then(() => {
            location.href = \"/index.php\";
        });
        </script>
        </body>
        </html>";
    } else {
        // DATOS PARA EL PDF
        $name = $_SESSION['name'];

        $result = mysqli_query($con, "select email from usuario where nombre ='{$name}'");
        $email = mysqli_fetch_array($result, MYSQLI_NUM);

        $taste = $_POST['taste'];

        if(isset($_POST['complement'])) {
            $complement = $_POST['complement'];
        } else {
            $complement = "ninguno";
        }
        if(isset($_POST['pack'])) {
            $pack = $_POST['pack'];
        } else {
            $pack = "cono";
        }
        $tastes = [
            "chocolate" => 1.00,
            "vainilla" => 1.00,
            "frambuesa" => 1.00,
            "frambuesa" => 1.00,
            "mango" => 1.00,
            "frutilla" => 1.00,
            "limon" => 1.00,
        ];
        $complements = [
            "pepitas de chocolate" => 0.30,
            "nueces" => 0.30,
            "gomitas" => 0.35,
            "ninguno" => 0,
        ];
        $packs = [
            "vaso mediano" => 0.50,
            "cono" => 0.75,
        ];

        $price_taste = $tastes["{$taste}"];
        $price_complement = $complements["{$complement}"];
        $price_pack = $packs["{$pack}"];
        $total_price = $price_taste + $price_complement + $price_pack;

        $text_price_taste = sprintf("%.2f",$price_taste);
        $text_price_complement = sprintf("%.2f",$price_complement);
        $text_price_pack = sprintf("%.2f",$price_pack);
        $text_total = sprintf("%.2f", $total_price);

        $today = date("Y-m-d");

        $text_taste = "Helado con sabor a {$taste}";

        if ($complement == "ninguno") {
            $text_complement = "Ningún complemento";
        } else {
            $text_complement = "Complemento de {$complement}";
        }

        $text_pack = "Empaque de {$pack}";

        // DOCUMENTO PDF
        require('../../fpdf/fpdf.php');
        $pdf = new FPDF('LANDSCAPE','mm','A5',true);
        $pdf ->AddPage();
        $pdf ->SetFont('Arial','B',24);
        $pdf -> Cell(190,10,'Bacio Gelato',0,1, 'C');
        $pdf ->Image('../../assets/icons/Deli-Cream.png', 180, 3, 15, 0, 'png');
        $pdf -> SetLineWidth(1);
        $pdf -> SetDrawColor(130,195,236);
        $pdf -> Line(10, 20, 200, 20);
        $pdf -> SetDrawColor(87,53,142);
        $pdf -> Line(10, 21, 200, 21);
        
        $pdf -> SetLineWidth(0.1);
        $pdf -> SetDrawColor(0,0,0);

        $pdf ->Ln(5);
        $pdf ->SetFont('Arial','B',20);
        $pdf ->Cell(30, 10, 'Pedido:',0,0,'C');
        $pdf ->SetFont('Arial','',16);
        $pdf ->Cell(90, 10, '#1',0,0,'L');
        $pdf ->SetFont('Arial','B',18);
        $pdf ->Cell(30, 10, 'Fecha:',0,0,'C');
        $pdf ->SetFont('Arial','',16);
        $pdf ->Cell(40, 10, $today,0,1,'L');
        
        $pdf -> Ln(5);
        $pdf ->SetFont('Arial','B',18);
        $pdf -> Cell(190,10,'Datos del Cliente',0,1,'L');
        
        $pdf -> SetLineWidth(0.6);
        $pdf -> SetDrawColor(0,0,0);
        $pdf -> Line(10, 48, 65, 48);
        
        $pdf -> Ln(5);
        $pdf ->SetFont('Arial','B',16);
        $pdf -> Cell(25,10,'Nombre:',0,0);
        $pdf ->SetFont('Arial','',14);
        $pdf -> Cell(60,10,$name,0,0,'C');
        $pdf ->SetFont('Arial','B',16);
        $pdf -> Cell(25,10,'Email:',0,0);
        $pdf ->SetFont('Arial','',14);
        $pdf -> Cell(80,10,$email[0],0,1,'C');

        $pdf -> SetLineWidth(0.6);
        $pdf -> SetDrawColor(88,88,88);
        $pdf -> Line(35, 64, 95, 64);
        $pdf -> Line(115, 64, 200, 64);
        
        $pdf -> Ln();
        $pdf ->SetFont('Arial','B',16);
        $pdf -> Cell(150,10,'Productos',0,0,"C");
        $pdf -> Cell(40,10,'Precio',0,1,"C");
        
        $pdf ->SetFont('Arial','',14);
        $pdf -> Cell(150,10,$text_taste,0,0,"L", false);
        $pdf -> Cell(40,10,"\${$text_price_taste}",0,1,"R", false);

        $pdf ->SetFont('Arial','',14);
        $pdf -> Cell(150,10,$text_complement,0,0,"L", false);
        $pdf -> Cell(40,10,"\${$text_price_complement}",0,1,"R", false);

        $pdf ->SetFont('Arial','',14);
        $pdf -> Cell(150,10,$text_pack,0,0,"L", false);
        $pdf -> Cell(40,10,"\${$text_price_pack}",0,1,"R", false);

        $pdf ->SetX(-90);
        $pdf ->SetFont('Arial','B',16);
        $pdf -> Cell(40,10,'Total',0,0,"C", false);
        $pdf ->SetFont('Arial','',14);
        $pdf -> Cell(40,10,"\${$text_total}",0,1,"R", false);

        $pdf -> SetDrawColor(130,195,236);
        $pdf -> SetLineWidth(1);
        $pdf -> Line(10, 75, 200, 75);
        $pdf -> Line(10, 85, 200, 85);
        $pdf -> Line(10, 115, 200, 115);
        $pdf -> Line(160, 85, 160, 125);

        $pdf -> Output("I", "Pedido - {$name}.pdf");
    }
?>