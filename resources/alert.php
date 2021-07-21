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
                                                        }else if(isset($code) and $code == "7") {
                                                            ?>
                                                                <div class="alert alert-success text-center" role="alert">
                                                                    Operação realizada com sucesso!
                                                                </div>
                                    
                                                            <?php
                                                                }else if(isset($code) and $code == "8") {
                                                                    ?>
                                                                        <div class="alert alert-danger text-center" role="alert">
                                                                            Ocorreu um erro na operação!
                                                                        </div>
                                            
                                                                    <?php
                                                                        }
                                                                                
                            ?>