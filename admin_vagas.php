<?php
    include "resources/header_admin.php";

    if (isset($_GET['code'])) {
        $code = $_GET['code'];
    }

?>
                    <!-- Content Row -->
                    <!-- Content Row -->
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4 text-center">
                        <h1 class="h3 mb-0 text-gray-800">Listagem de Vagas de Emprego</h1>
                    </div>

                    <div class="buttons col-12 text-right">
                        <a class="btn btn-outline-primary" href="add_vaga.php"><i class="fas fa-plus">Adicionar Vaga</i></a>
                    </div>
                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12 col-lg-12">
                            <?php
                                if(isset($code) and $code =="1") {
                            ?>
                            <div class="alert alert-success text-center" role="alert">
                                Cadastro realizado com sucesso!
                            </div>
                            <?php
                            }else if(isset($code) and $code == "2") {
                            ?>
                            <div class="alert alert-danger text-center" role="alert">
                                Ocorreu um erro ao tentar realizar o cadastro!
                            </div>

                            <?php
                            }else if(isset($code) and $code == "3") {
                            ?>
                                <div class="alert alert-success text-center" role="alert">
                                    Alteração realizada com sucesso!
                                </div>
    
                            <?php
                                }else if(isset($code) and $code == "4") {
                                    ?>
                                        <div class="alert alert-danger text-center" role="alert">
                                            Ocorreu um erro ao tentar realizar a alteração!
                                        </div>
            
                                    <?php
                                        }else if(isset($code) and $code == "5") {
                                            ?>
                                                <div class="alert alert-success text-center" role="alert">
                                                    Exclusão realizada com sucesso!
                                                </div>
                    
                                            <?php
                                                }else if(isset($code) and $code == "6") {
                                                    ?>
                                                        <div class="alert alert-danger text-center" role="alert">
                                                            Ocorreu um erro ao tentar excluir o item!
                                                        </div>
                            
                                                    <?php
                                                        }
                            ?>
                            <div class="card shadow mb-4">
                            <table class="table table-dark table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <td>Função</td>
                                        <td>Setor</td>
                                        <td>Data de Cadastro</td>
                                        <td>Ações</td>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        while($arrayReturnDb = mysqli_fetch_array($returnDb)) {
                                    ?>
                                    <tr class="table-active text-center">
                                        <td><?= $arrayReturnDb['vaga']; ?></td>
                                        <td><?= $arrayReturnDb['setor']; ?></td>
                                        <td><?= date("d/m/Y", strtotime($arrayReturnDb['datas'])); ?></td>
                                        <td class="text-center">
                                            <a href="#" class="btn btn-outline-primary"><i class="far fa-eye"></i></a>
                                            <a href="edit_vaga.php?n=<?= $arrayReturnDb['id']; ?>" class="btn btn-outline-warning"><i class="far fa-edit"></i></a>
                                            <a href="app/delete_vaga.php?n=<?= $arrayReturnDb['id']; ?>" class="btn btn-outline-danger"><i class="far fa-trash-alt"></i></a>


                                        </td>
                                    </tr>
                                    <?php
                                        }
                                    ?>
                                    
                                </tbody>
                            </table>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>                        
<script>
    setTimeout(function(){
        $('.alert').hide();
    }, 3000);
</script>
<?php
    include "resources/footer_admin.php";
?>