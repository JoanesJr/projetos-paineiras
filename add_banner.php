<?php
    include "resources/header_admin.php";
?>

                    <div class="row">
                        
                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <div class="text-dark">
                                    <h2 class="text-center">Adicionar Banner</h2>
                                    <form action="app/add_banner.php" method="post" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="vaga" class="form-label">Nome:</label>
                                            <input type="text" required name="name" id="name" class="form-control">
                                        </div>
                                        <div class="mb-3">
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