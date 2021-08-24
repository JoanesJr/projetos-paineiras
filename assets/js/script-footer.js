$(document).ready(() => {
    $("#itabata").on('click', () => {
      $("#contentAll").load("itabata.php");
    })

    $("#teixeira").on('click', () => {
      $("#contentAll").load("teixeira.php");
    })

    $("#mucuri").on('click', () => {
      $("#contentAll").load("mucuri.php");
    })

    $("#posto").on('click', () => {
      $("#contentAll").load("posto.php");
    })

    $("#imperatriz").on('click', () => {
      $("#contentAll").load("imperatriz.php");
    })

    $("#convenio").on('click', () => {
      $("#contentAll").load("convenio.php");
    })

    $("#agendamento").on('click', () => {
      $("#contentAll").load("agendamento.php");
    })

    $("#contato").on('click', () => {
      $("#contentAll").load("contato.php");
    })

    $("#vagas").on('click', () => {
      $("#contentAll").load("vagas.php");
    })

  })