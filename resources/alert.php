<?php
if (isset($_GET['code'])) {
    $code = $_GET['code'];

    switch ($code) {
        case 1: ?>
            <div class="alert alert-success text-center" role="alert">
                Cadastro realizado com sucesso!
            </div> <?php
                    break;
                case 2: ?>
            <div class="alert alert-danger text-center" role="alert">
                Ocorreu um erro ao tentar realizar o cadastro!
            </div> <?php
                    break;
                case 3: ?>
            <div class="alert alert-success text-center" role="alert">
                Alteração realizada com sucesso!
            </div> <?php
                    break;
                case 4: ?>
            <div class="alert alert-danger text-center" role="alert">
                Ocorreu um erro ao tentar realizar a alteração!
            </div> <?php
                    break;
                case 5: ?>
            <div class="alert alert-success text-center" role="alert">
                Exclusão realizada com sucesso!
            </div> <?php
                    break;
                case 6: ?>
            <div class="alert alert-danger text-center" role="alert">
                Ocorreu um erro ao tentar excluir o item!
            </div> <?php
                    break;
                case 7: ?>
            <div class="alert alert-success text-center" role="alert">
                Operação realizada com sucesso!
            </div> <?php
                    break;
                case 8: ?>
            <div class="alert alert-danger text-center" role="alert">
                Ocorreu um erro na operação!
            </div> <?php
                    break;
                case 9: ?>
            <div class="alert alert-danger text-center" role="alert">
                Preencha todos os campos!
            </div> <?php
                    break;
                case 10: ?>
            <div class="alert alert-danger text-center" role="alert">
                Preencha todos os campos!
            </div> <?php
                    break;
                case 11: ?>
            <div class="alert alert-success text-center" role="alert">
                Email enviado com sucesso!
            </div> <?php
                    break;
            }
        }
