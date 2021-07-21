<?php

  include "resources/header.php";

?>
  <div class="container">
        <div class="row" id="contact">
            <?php
              if (isset($_GET['1'])) {
            ?>
                  <div class="alert alert-danger text-center"role="alert">
                    <b>Falha no envio do email!</b>
                  </div>
              <?php
                }else if (isset($_GET['2'])) {
              ?>
                <div class="alert alert-success text-center" role="alert">
                  <b>E-mail enviado com sucesso!</b>
                </div>
              <?php
                };
              ?>

            
            

            <div class="col-12">
                <h3 class="text-center">Entre em Contato</h3>
            </div>
           
            <div class="col-12 col-sm-12 col-md-12 col-ld-12 col-xs-12 col-xxl-12">
                <form class="form-group" method="post" action="app/enviar_email.php" >
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Nome:</label>
                      <input type="text" class="form-control" required id="exampleInputName" name="name" aria-describedby="nameHelp">
                      <div id="emailHelp" class="form-text">Informe o seu nome.</div>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email:</label>
                      <input type="email" class="form-control" required id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="xxxx@gmail.com">
                      <div id="emailHelp" class="form-text">Informe um email válido.</div>
                    </div>
                    <label for="exampleInputTel" class="form-label">Telefone:</label>
                      <input type="tel" class="form-control" name="tel" required id="exampleInputTel" aria-describedby="telHelp" placeholder="(xx)xxxxx-xxxx">
                      <div id="telHelp" class="form-text">Informe um telefone válido.</div>

                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Assunto:</label>
                          <input type="text" class="form-control" required id="exampleInputName" name="title" aria-describedby="nameHelp">
                        <div id="emailHelp" class="form-text">Informe assunto do email.</div>
                    </div>

                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">Mensagem:</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="3"></textarea>
                      </div> <br>
                      <div class="text-center">
                        <button type="submit" class="btn btn-outline-primary">Enviar</button>
                      </div>
                    
                  </form>
            </div>
          </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script>
            setTimeout(function() {
             $('.alert').hide();
            }, 5000); // <-- time in milliseconds
        </script>
<?php
  
  include "resources/footer.php";
