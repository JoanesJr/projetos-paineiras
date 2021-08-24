<?php
require_once "app/db.php";


$db = new db();
$connectDb = $db->connectDatabase();

$sql = "SELECT * FROM jobs ORDER BY datas DESC ";

$returnDb = mysqli_query($connectDb, $sql);
$numRows = mysqli_num_rows($returnDb);
?>
<div class="container">
    <div class="row text-center" id="scheudle">
        <div class="col-12">
            <h3 class="text-center">TRABALHE CONOSCO</h3>
        </div>

        <!-- busca dos dados do banco de dados mysqli e exibição dos mesmos -->
        <?php
        if ($numRows <= '0') {
        ?>
            <div class="item-scheudle col-12 col-sm-12 col-md-12 col-lg-12 col-xs-12 col-xxl-12">
                <h4 class="text-center">Oportunidade de Trabalho</h4>
                <div class="row">
                    <div class="col-12">
                        <span>Infelizmente não temos vagas no momento, volte em breve!</span>
                    </div>

                </div>
            <?php

        }

        while ($arrayReturnDb = mysqli_fetch_array($returnDb)) {
            $vacancy = $arrayReturnDb['vaga'];
            $sector = $arrayReturnDb['setor'];
            $file = $arrayReturnDb['arquivo'];
            ?>
                <div class="item-scheudle col-12 col-sm-12 col-md-6 col-lg-6 col-xs-6 col-xxl-6">
                    <h4 class="text-center">Oportunidade de Trabalho</h4>
                    <div class="row">
                        <div class="col-6">
                            <span class="">Função: <?= $vacancy; ?></span>
                        </div>
                        <div class="col-6">
                            <span class="">Setor: <?= $sector; ?></span>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12">
                            <img src="upload/<?= $file; ?>" alt="vaga de emprego" class="img-vaga">
                        </div>
                    </div>
                    <div class="d-none" id="idAjax" value="<?= $arrayReturnDb['id']; ?>"></div>
                    <a href="#" id="<?= $arrayReturnDb['id']; ?>" name="idVagaAjax" class="btn btn-lg btn-invite">Candidate-se</a>
                </div>

            <?php
        };
            ?>
            </div>
    </div>

    <script>
        $(document).ready(() => {
            $(".btn-invite").on('click', element => {
                let id = element.target.id
                $.ajax({
                    type: "get",
                    url: "contato.php",
                    data: id,

                    success: () => {
                        $("#contentAll").load("contato.php?n=" + id)
                    }
                })
            })

        })
    </script>