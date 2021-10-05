$(document).ready(() => {
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
      let nameElement = $("#exampleInputName")
      let val = $("#exampleInputEmail1").val()
      let valElement = $("#exampleInputEmail1")
      let tel = $("#exampleInputTel").val()
      let telElement = $("#exampleInputTel")
      let assunt = $("#exampleInputAssunto").val()
      let assuntElement = $("#exampleInputAssunto")
      let msg = $("#exampleFormControlTextarea1").val()
      let msgElement = $("#exampleFormControlTextarea1")
      let anexo = $("#anexo").val()
      let anexoElement = $("#anexo")
      let infos = [name, val, tel, assunt, msg, anexo]
      let elements = [nameElement, valElement, telElement, assuntElement, msgElement, anexoElement]
      let notNumber = false;
      let numberTel = isNaN(tel)

      if (name != '' && val != '' && tel != '' && assunt != '' && msg != '' && anexo != '') {
        numberTel == true ? notNumber = true : notNumber = false
        numberTel == true ? enviaEmail = "asasas.pdgp" : enviaEmail = "enviar_email.php"

      } else {
        enviaEmail = "asasas.pdgp"
      }

      let formEmail = new FormData($("form[name='formEmail']")[0])
      if (formEmail)
        $.ajax({
            type: 'post',
            url: `app/${enviaEmail}`,
            data: formEmail,
            processData: false,
            contentType: false,

            beforeSend: () => {
              $("#loader").html("<img class='img-fluid' src='assets/img/loader2.gif'>")
              $("#loader").css({
                'margin': '2px auto',
                'margin-top': '18px',
                'margin-bottom': '-6px',
                'padding': '8px',
                'max-width': '150px',
                'max-height': '80px;',
                'object-fit': 'cover',
                'object-position': 'center'
              })
              $("#response").css({
                'margin-top': '20px',
                'padding': '10px'
              })
            },

            success: () => {
              setTimeout(() => {
                $("#contentAll").load("contato.php")
              }, 5000)
              setTimeout(() => {
                $("#response").css({
                  'margin-top': '20px',
                  'padding': '10px'
                })
                $("#loader").html("<img class='img-fluid' src='assets/img/success.gif'>")
                $("#loader").css({
                  'margin': '2px auto',
                  'margin-top': '12px',
                  'margin-bottom': '-6px',
                  'padding': '8px',
                  'max-width': '150px',
                  'max-height': '80px;',
                  'object-fit': 'cover',
                  'object-position': 'center'
                })
                $("#alertMessage").addClass("alert-success")
                $("#alertMessage").html("Email enviado com sucesso!")
              }, 1500) //tempo de duração do loader;
            },

            error: () => {
              setTimeout(() => {
                $("#contentAll").load("contato.php")
              }, 5000)
              setTimeout(() => {
                $("#response").css({
                  'margin-top': '20px',
                  'padding': '10px'
                })
                $("#loader").html("<img class='img-fluid' src='assets/img/failed.gif'>")
                $("#loader").css({
                  'margin': '2px auto',
                  'margin-top': '12px',
                  'margin-bottom': '-6px',
                  'padding': '8px',
                  'max-width': '150px',
                  'max-height': '80px;',
                  'object-fit': 'cover',
                  'object-position': 'center'
                })
                $("#alertMessage").addClass("alert-danger")
                $("#alertMessage").html("Preencha todos os campos!")
                for (let c = 0; c <= 5; c++) {
                  if (infos[c] == '') {
                    elements[c].css('border', '1px solid #c73232');
                  }
                  if (notNumber) {
                    $('#exampleInputTel').css('font-weight', 'bolder')
                    $('#exampleInputTel').css('border', '1px solid #c73232')
                    $('#telHelp').css('font-weight', 'bolder')
                    $('#telHelp').css('color', 'red')
                  }
                }
              }, 1500) //tempo de duração do loader;
            },

          }


        )
    })
  })