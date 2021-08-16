<?php
  require_once "app/db.php";

  if (isset($_GET['n'])) {
    
    $vaga = $_GET['n'];

    $db = new db();
    $connectDb = $db->connectDatabase();

    $sqlVaga = "SELECT * FROM jobs WHERE id = '{$vaga}'";
    $sendSql = mysqli_query($connectDb, $sqlVaga);
    $returDbVaga = mysqli_fetch_array($sendSql);
    $nameVaga = $returDbVaga['assunto'];
}

?>
  <div class="container">
        <div class="row" id="contact">

            <div class="col-12">
                <h3 class="text-center">Entre em Contato</h3>
            </div>
           
            <div class="col-12 col-sm-12 col-md-12 col-ld-12 col-xs-12 col-xxl-12">
                <form class="form-group" enctype="multipart/form-data" id="formEmail" name="formEmail">
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

                      <div class="mb-3" style="<?= isset($vaga) ? 'display: none;' : '' ?>">
                        <label for="exampleInputAssunto" class="form-label">Assunto:</label>
                          <input type="text" class="form-control" <?= isset($vaga) ? '' : 'required' ?> id="exampleInputAssunto" name="title" aria-describedby="nameHelp" <?= isset($vaga) ? "value = '$nameVaga';" : '' ?>>
                        <div id="emailHelp" class="form-text">Informe assunto do email.</div>
                    </div>

                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">Mensagem:</label>
                        <textarea class="form-control" required id="exampleFormControlTextarea1"  name="content" rows="3"></textarea>
                      </div> <br>
                      <?php
                        if (isset($vaga)) {
                      ?>
                       <div class="form-group" style="display: none;">
                        <input type="text" name="n" required id="n" class="form-control" value="<?= $_GET['n']; ?>">
                      </div>

                       <!-- <div class="form-group" style="display: none;">
                        <input type="v" name="v" required id="v" class="form-control" value="<?= $_GET['v']; ?>">
                      </div> -->

                       <div class="form-group">
                        <label for="exampleFormControlTextarea1">Anexo:</label>
                        <input type="file" name="anexo" required  id="anexo" class="form-control">
                      </div> <br>
                      <?php
                        }
                      ?>
                      
                     


                      <div class="text-center">
                        <button type="submit" class="btn btn-outline-primary" id="btnEmail">Enviar</button>
                      </div>
                    
                  </form>

                  <div id="response" style="padding: 10px; margin-top: 20px; margin-bottom: -16px;">
                    <div id="loader" class="d-flex flex-column justify-content-center align-items-center" style="max-width: 120px; max-height: 60px;"></div>
                    <div id="alertMessage" class="alert text-center" style="border-radius:22px; margin-top: 35px;" role="alert"></div>
                  </div>
                  
                </div>
          </div>
        </div>

        
        <script>
          $(document).ready( () => {
            function alert() {
                setTimeout(function() {
                $('.alert').hide();
                $('#loader').hide()
                }, 5000); // <-- time in milliseconds
              } 
           

            $("#btnEmail").on('click', (e) => {
              e.preventDefault()
              let enviaEmail = ""

              let name = $("#exampleInputName").val()
              let val = $("#exampleInputEmail1").val()
              let tel = $("#exampleInputTel").val()
              let assunt = $("#exampleInputAssunto").val()
              let msg = $("#exampleFormControlTextarea1").val()
              let anexo = $("#anexo").val()
              
              if (name != '' && val != '' && tel != '' && assunt != '' && msg != '' && anexo != '') {
                 enviaEmail = "enviar_email.php"
              } else {
                 enviaEmail = "asasas.pdgp"
              }
              // anexo.replace("C:\\fakepath", "")

              let formEmail = new FormData($("form[name='formEmail']")[0])
              console.log(formEmail)
              $.ajax({
              type: 'post',
              url: `app/${enviaEmail}`,
              data: formEmail,
              processData: false,
              contentType: false,

              beforeSend: () => {
                $("#loader").html("<img class='img-fluid' src='assets/img/loader2.gif'>")
                $("#loader").css({'margin': '2px auto', 'margin-top': '18px', 'margin-bottom': '-6px', 'padding': '8px', 'max-width': '150px', 'max-height': '80px;', 'object-fit': 'cover', 'object-position': 'center'})
                $("#response").css({'margin-top': '20px', 'padding': '10px'})
              },

              success: () => {
                setTimeout( () => {
                  $("#contentAll").load("contato.php")   
                }, 5000)
                setTimeout(() => {
                    $("#response").css({'margin-top': '20px', 'padding': '10px'})
                    $("#loader").html("<img class='img-fluid' src='assets/img/success.gif'>")
                    $("#loader").css({'margin': '2px auto', 'margin-top': '12px', 'margin-bottom': '-6px','padding': '8px', 'max-width': '150px', 'max-height': '80px;', 'object-fit': 'cover', 'object-position': 'center'})
                    $("#alertMessage").addClass("alert-success")
                    $("#alertMessage").html("Email enviado com sucesso!")      
                  }, 1500) //tempo de duração do loader;
              },

              error: () => {
                setTimeout( () => {
                  $("#contentAll").load("contato.php")   
                }, 5000)
                setTimeout(() => {
                    $("#response").css({'margin-top': '20px', 'padding': '10px'})
                    $("#loader").html("<img class='img-fluid' src='assets/img/failed.gif'>")
                    $("#loader").css({'margin': '2px auto', 'margin-top': '12px', 'margin-bottom': '-6px','padding': '8px', 'max-width': '150px', 'max-height': '80px;', 'object-fit': 'cover', 'object-position': 'center'})
                    $("#alertMessage").addClass("alert-danger")
                    $("#alertMessage").html("Preencha todos os campos!")       
                  }, 1500) //tempo de duração do loader;
              },
                
              }


            )
          })
          })

        </script>