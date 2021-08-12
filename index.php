<?php
  include "resources/header.php";
  require_once "app/db.php";

  $db = new db();
  $connectDb = $db->connectDatabase();

  $sql = "SELECT * FROM banners WHERE ativo = '1' ";
  $returnDb = mysqli_query($connectDb, $sql);
  $numRows = mysqli_num_rows($returnDb);
  $active = true;
?>

<section id="contentAll">

    <div class="row" id="carrouseurs">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <?php
                      if ($numRows <= 0) {
                  ?>
                        <div class="carousel-item active">
                          <img src="assets/img/banner.jpg" class="d-block w-100 banner" alt="banner1">
                        </div>
                  <?php
                      }
                  ?>

                  <?php
                    while ($arrayDb = mysqli_fetch_array($returnDb)) {
                      $file = $arrayDb['arquivo'];
                      $id = $arrayDb['id'];
                  ?>
                  <div class="carousel-item <?= $active ? 'active' : '' ?>">
                    <img src="upload/banner/<?= $file; ?>" class="d-block w-100 banner" alt="banner<?= $id; ?>">
                  </div>
                  <?php
                    $active = false;
                    }
                  ?>
                </div>
              </div>
        </div>
    </div> <br>

    <div class="container" id="content">
        <div class="row infos">
            <div class="block col-sm-5 col-md-4 col-lg-4 col-xs-4 col-xxl-4">
                <img src="assets/img/ambulance3.png" alt="icone de ambulância" class="rounded mx-auto d-block img-info">
                <h3 class="text-center">
                   Pronto Atendimento
                </h3>
                <p>
                Pronto Atendimento 24h para urgência e emergência, com equipe médica capacitada e excelente infraestrutura.
                </p>
            </div>
            <div class="block block-2 col-sm-5 col-md-4 col-lg-4 col-xs-4 col-xxl-4">
                <img src="assets/img/Hospital_Icon.png" alt="icone de hospital" class="rounded mx-auto d-block img-info">
                <h3 class="text-center">
                   Estruturação
                </h3>
                <p>
                    Possue uma ótima estrutura, possuindo Apartamentos, Berçario, Brinquedoteca, Centro Cirurgico, Laboratório, Ultrassonografia,  etc.
                </p>
            </div>
            <div class="block col-sm-5 col-md-4 col-lg-4 col-xs-4 col-xxl-4">
                <img src="assets/img/qualification-icon-22.jpg" alt="imagem de coração" class="rounded mx-auto d-block img-info">
                <h3 class="text-center">
                    Qualificação
                </h3>
                <p>
                   No Hospital Paineiras temos profissionais muito bem qualificados e treinados para melhor atende-lo, assim lhe garantido conforto e tranquilidade.
                </p>
            </div>
        </div>

        </div>
    </div>

    <main class="container" id="about">
      <div class="row content-about" id="about">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xs-12 col-xxl-12">
          <h3 class="text-center">Sobre o Hospital Paineiras</h3>
          <p>
            A Sepaco Rede de Saúde Paineiras foi constituída pela Suzano Papel e Celulose S/A, em 15 setembro de 1993, na Bahia, atendendo inicialmente colaboradores da empresa e seus dependentes e, posteriormente, convênios e pacientes particulares.
          </p>

          <p>
            Em fevereiro de 2011, o Sepaco assumiu a administração da rede, que compreende cinco unidades, sendo três clínicas médicas com postos de coleta (Mucuri, Teixeira de Freitas e Posto da Mata), uma Clinica Médica em Imperatriz no Maranhão e o Hospital Paineiras em Itabatã onde são centralizadas as atividades de internação, atendimento de urgência e emergência, cirurgias, atendimento ambulatorial e demais exames complementares.
          </p>
        </div>
      </div>

      <div class="row">
        <div class="msv col-12 col-sm-4 col-md-4 col-lg-4 col-xs-12 col-xxl-12">
          <img src="assets/img/Missao5.png" class="rounded mx-auto d-block img-info" alt="">
          <h4 class="text-center">Missão</h4>
          <p>
            A missão que conceitua a razão da nossa existência: “Cuidar de nossos clientes com integridade, acolhimento, competência e preço competitivo.”
          </p>
        </div>

        <div class="msv col-12 col-sm-4 col-md-4 col-lg-4 col-xs-12 col-xxl-12">
          <img src="assets/img/Visao5.png" class="rounded mx-auto d-block img-info" alt="">
          <h4 class="text-center">Visão</h4>
          <p>
            <strong>Cliente</strong> – “Somos a solução em saúde. Uma instituição justa, segura e humanizada que atende de forma personalizada com agilidade e resolutividade.”
          </p>
            <strong>Colaboradores</strong> – “Temos orgulho de fazer parte do Sepaco que proporciona ambiente para realização, desenvolvimento profissional e contribui para a qualidade de vida.”
          </p>
          
          <p>
            <strong>Conselho</strong> – “O sistema integrado de saúde que saiu do PAPEL, faz a diferença, atendendo às expectativas das empresas associadas.”
          </p>
        </div>

        <div class="msv col-12 col-sm-4 col-md-4 col-lg-4 col-xs-12 col-xxl-12">
          <img src="assets/img/Valores5.png" class="rounded mx-auto d-block img-info" alt="">
          <h4 class="text-center">Valores</h4>
          <p>
              <strong> Integridade</strong> – “Praticamos sempre princípios de honestidade, respeito, ética e justiça.”
          </p>

          <p>
            <strong>Comprometimento</strong> – “Cumprimos nossos objetivos com iniciativa e responsabilidade.”
          </p>
              
          <p>
           <strong>Trabalho em equipe</strong> – “Integramos as áreas e os profissionais na busca das melhores soluções para a instituição e crescimento individual.”
          </p>         
          <p>
              <strong>Saber</strong> – “Buscamos e difundimos conhecimento pessoal, profissional e institucional.”
          </p>
        </div>
  </main>

</section>

  <?php

  include "resources/footer.php";