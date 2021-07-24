<?php
    include "resources/header_admin.php";
?>

                    <div class="row">
                        
                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="text-dark">
                                    <h2 class="text-center">Adicionar Vaga</h2>
                                    <form action="app/add_vaga.php" method="post" class="form-group" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="vaga" class="form-label">Vaga:</label>
                                            <input type="text" required name="vaga" id="vaga" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="setor" class="form-label">Setor:</label>
                                            <input type="text" required name="setor" id="setor" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="setor" class="form-label">Assunto:</label>
                                            <input type="text" required name="assunto" id="assunto" class="form-control">
                                        </div>
                                        <div class="mb-3 form-group">
                                            <label for="img" class="form-label">Imagem:</label>
                                            <input type="file" required name="img" id="img" class="form-control">
                                        </div>

                                        <div class="text-center">
                                        <button type="submit" class="btn btn-outline-success btn-lg">Enviar</button>
                                        </div>
                                    </form>
                                    

<?php
    include "resources/footer_admin.php";
?>