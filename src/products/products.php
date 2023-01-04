<!-- <?php
        include "../../config.php";
        ?> -->
<div class="tabs">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="taste-tab" data-bs-toggle="tab" data-bs-target="#taste-tab-pane" type="button" role="tab" aria-controls="taste-tab-pane" aria-selected="true">Sabores</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="complement-tab" data-bs-toggle="tab" data-bs-target="#complement-tab-pane" type="button" role="tab" aria-controls="complement-tab-pane" aria-selected="false">Complementos</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="package-tab" data-bs-toggle="tab" data-bs-target="#package-tab-pane" type="button" role="tab" aria-controls="package-tab-pane" aria-selected="false">Empaque</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <form action="/src/pdf_creator/pdf.php" method="POST">
            <div class="tab-pane fade show active" id="taste-tab-pane" role="tabpanel" aria-labelledby="taste-tab" tabindex="0">
                <ul class="taste-container">
                    <li class="taste-list">
                        <input type="radio" id="chocolate" name="taste" value="chocolate">
                        <label class="chocolate" for="chocolate">
                            <img src="../../assets/images/choco.png" alt="chocolate">
                            <span>Chocolate</span>
                            <span>$1.00</span>
                        </label>
                    </li>
                    <li class="taste-list">
                        <input type="radio" id="vainilla" name="taste" value="vainilla">
                        <label class="vainilla" for="vainilla">
                            <img src="../../assets/images/vainilla.png" alt="vainilla">
                            <span>Vainilla</span>
                            <span>$1.00</span>
                        </label>
                    </li>
                    <li class="taste-list">
                        <input type="radio" id="frambuesa" name="taste" value="frambuesa">
                        <label class="frambuesa" for="frambuesa">
                            <img src="../../assets/images/raspberry.png" alt="frambuesa">
                            <span>Frambuesa</span>
                            <span>$1.00</span>
                        </label>
                    </li>
                    <li class="taste-list">
                        <input type="radio" id="mango" name="taste" value="mango">
                        <label class="mango" for="mango">
                            <img src="../../assets/images/mango.png" alt="mango">
                            <span>Mango</span>
                            <span>$1.00</span>
                        </label>
                    </li>
                    <li class="taste-list">
                        <input type="radio" id="frutilla" name="taste" value="frutilla">
                        <label class="frutilla" for="frutilla">
                            <img src="../../assets/images/frutilla.png" alt="frutilla">
                            <span>Frutilla</span>
                            <span>$1.00</span>
                        </label>
                    </li>
                    <li class="taste">
                        <input type="radio" id="limon" name="taste" value="limon">
                        <label class="limon" for="limon">
                            <img src="../../assets/images/limon.png" alt="limon">
                            <span>Limón</span>
                            <span>$1.00</span>
                        </label>
                    </li>
                </ul>
            </div>
            <div class="tab-pane fade" id="complement-tab-pane" role="tabpanel" aria-labelledby="complement-tab" tabindex="0">
                <ul class="complement-container">
                    <li class="complement-list">
                        <input type="radio" id="pepitas" name="complement" value="pepitas de chocolate">
                        <label class="pepitas" for="pepitas">
                            <img src="../../assets/images/pepitas.png" alt="pepitas-de-chocolate">
                            <span>Pepitas de</span>
                            <span>chocolate</span>
                        </label>
                    </li>
                    <li class="complement-list">
                        <input type="radio" id="nueces" name="complement" value="nueces">
                        <label class="nueces" for="nueces">
                            <img src="../../assets/images/nueces.png" alt="nueces">
                            <span>nueces</span>
                            <span></span>
                        </label>
                    </li>
                    <li class="complement-list">
                        <input type="radio" id="gomitas" name="complement" value="gomitas">
                        <label class="gomitas" for="gomitas">
                            <img src="../../assets/images/gomitas.png" alt="gomitas">
                            <span>Gomitas</span>
                            <span></span>
                        </label>
                    </li>
                    <li class="complement-list">
                        <input type="radio" id="nothing" name="complement" value="ninguno">
                        <label class="nothing" for="nothing">
                            <span>Ninguno</span>
                        </label>
                    </li>
                </ul>
            </div>
            <div class="tab-pane fade" id="package-tab-pane" role="tabpanel" aria-labelledby="package-tab" tabindex="0">
                <ul class="pack-container">
                    <li class="pack-list">
                        <input type="radio" id="vaso" name="pack" value="vaso mediano">
                        <label class="vaso" for="vaso">
                            <img src="../../assets/images/vaso-helado.png" alt="vaso mediano">
                            <span>Vaso</span>
                            <span>Mediano</span>
                        </label>
                    </li>
                    <li class="pack-list">
                        <input type="radio" id="cono" name="pack" value="cono">
                        <label class="cono" for="cono">
                            <img src="../../assets/images/cono-helado.png" alt="cono">
                            <span>Cono</span>
                            <span></span>
                        </label>
                    </li>
                </ul>
            </div>
            <?php
            if (isset($_SESSION['name'])) {
                echo "<div class=\"submit-container\">
                <input type=\"submit\" value=\"Pedir\">
            </div>";
            }else {
                echo "<div class=\"submit-container\">
                <input type=\"button\" value=\"Pedir\" onclick=\"noSession()\">
            </div>";
            }
            ?>
        </form>
    </div>
    <script type="text/javascript">
        document.getElementById("complement-tab-pane").classList.add("none");
        document.getElementById("package-tab-pane").classList.add("none");

        let btn_taste = document.getElementById("taste-tab");
        console.log(btn_taste);
        btn_taste.addEventListener("click", () => {
            document.getElementById("taste-tab-pane").classList.remove("none");
            document.getElementById("complement-tab-pane").classList.add("none");
            document.getElementById("package-tab-pane").classList.add("none");
        });
        let btn_complement = document.getElementById("complement-tab");
        console.log(btn_complement);
        btn_complement.addEventListener("click", () => {
            document.getElementById("taste-tab-pane").classList.add("none");
            document.getElementById("complement-tab-pane").classList.remove("none");
            document.getElementById("package-tab-pane").classList.add("none");
        });
        let btn_pack = document.getElementById("package-tab");
        console.log(btn_pack);
        btn_pack.addEventListener("click", () => {
            document.getElementById("taste-tab-pane").classList.add("none");
            document.getElementById("complement-tab-pane").classList.add("none");
            document.getElementById("package-tab-pane").classList.remove("none");
        });

        function noSession() {
            swal("Pedido Invalido", "No ha iniciado Sesión", "error");
        }
    </script>
</div>