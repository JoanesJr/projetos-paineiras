<?php
include "resources/header_admin.php";

$id = $_GET['n'] ? $_GET['n'] : '';

$sqlUpdate = "SELECT * FROM jobs WHERE id = {$id}";

$returnUpdate = mysqli_query($connectDb, $sqlUpdate);

$returnArrayUpdate = mysqli_fetch_array($returnUpdate);
?>

<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12">
        <div class="text-dark">
            <h2 class="text-center">Editar Vaga</h2>
            <form action="app/edit_vaga.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="vaga" class="form-label">Vaga:</label>
                    <input type="text" required name="vaga" id="vaga" class="form-control" value="<?= $returnArrayUpdate['vaga']; ?>">
                </div>
                <div class="mb-3">
                    <label for="setor" class="form-label">Setor:</label>
                    <input type="text" required name="setor" id="setor" class="form-control" value="<?= $returnArrayUpdate['setor']; ?>">
                </div>
                <div class="mb-3">
                    <label for="setor" class="form-label">Assunto:</label>
                    <input type="text" required name="assunto" id="assunto" class="form-control" value="<?= $returnArrayUpdate['assunto']; ?>">
                </div>
                <div class="mb-3">
                    <label for="img" class="form-label">Imagem:</label>
                    <input type="file" name="img" id="img" class="form-control" value="<?= $returnArrayUpdate['arquivo']; ?>">
                </div>
                <p>Imagem Atual:</p>
                <div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xs-2 col-xxl-2">
                    <img src="upload/<?= $returnArrayUpdate['arquivo']; ?>" alt="imagem atual" class="img-thumbnail img-fluid">
                </div>

                <input type="text" name="id" id="id" style="display: none;" value="<?= $id; ?>">

                <div class="text-center">
                    <button type="submit" class="btn btn-outline-success btn-lg">Enviar</button>
                </div>


            </form>


            <?php
            include "resources/footer_admin.php";
            ?>