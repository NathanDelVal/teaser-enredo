<?php

session_start();

if (!isset($_SESSION['login'])) {
    header("location:login.php");
}


require_once 'pacotesIntegracoes/includeIntegracoes.php';

foreach ($integracoes as $integracao) {
    $varName = $integracao . 'Configuracoes';
    $$varName = include_once 'pacotesIntegracoes/' . $integracao . '/configuracoes/configuracoes.php';
}
array_unshift($formConfiguracoes, 'geral')

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Alan e Cruvello">
    <meta name="generator" content="Hugo 0.83.1">
    <title>Página Inicial | Admin</title>
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/517f50a444.js" crossorigin="anonymous"></script>

    <link href="assets/css/sidebars.css" rel="stylesheet">
</head>

<body>

    <main>
        <div class="d-flex flex-column flex-shrink-0 p-3 menu-lateral" style="position: initial;">
            <a href="../" target="_blank" class="d-flex align-items-center justify-content-center mb-3 mb-md-0 link-dark text-decoration-none">
                <span class="fs-4 text-center">Painel de Integrações</span>
            </a>

            <hr>

            <ul class="nav nav-pills flex-column mb-auto" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-geral-tab" data-bs-toggle="pill" data-bs-target="#pills-geral" type="button" role="tab" aria-controls="pills-geral" aria-selected="true">
                        Geral <i class="fas fa-chevron-right"></i>
                    </a>
                </li>
                <?php foreach ($integracoes as $integracao): ?>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-<?= $integracao ?>-tab" data-bs-toggle="pill" data-bs-target="#pills-<?= $integracao ?>" type="button" role="tab" aria-controls="pills-<?= $integracao ?>" aria-selected="true">
                            <?= $integracao ?> <i class="fas fa-chevron-right"></i>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>


           <!-- <ul class="nav nav-pills flex-column" id="pills-tab" role="tablist" style="">
                <hr>

                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-manual-tab" data-bs-toggle="pill" data-bs-target="#pills-manual" type="button" role="tab" aria-controls="pills-manual" aria-selected="true">
                        Manual <i class="fas fa-chevron-right"></i>
                    </a>
                </li>

                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-sobre-tab" data-bs-toggle="pill" data-bs-target="#pills-sobre" type="button" role="tab" aria-controls="pills-sobre" aria-selected="true">
                        Sobre <i class="fas fa-chevron-right"></i>
                    </a>
                </li>

            </ul>-->

        </div>

        <div class="tab-content w-100" id="pills-tabContent" style="padding-left: 1.5rem;">
            
                <div class="tab-pane fade active" id="pills-geral" role="tabpanel" aria-labelledby="pills-geral-tab">
                    Geral
                </div>

                <?php foreach ($integracoes as $integracao) : ?>
                    <div class="tab-pane fade w-100" id="pills-<?= $integracao ?>" role="tabpanel" aria-labelledby="pills-<?= $integracao ?>-tab">
                        <form method="GET" action="pacotesIntegracoes/<?= $integracao ?>/controller/controller.php" class="w-100">

                            <?php include 'pacotesIntegracoes/' . $integracao . '/template/form.php'; ?>

                        </form>
                    </div>
                <?php endforeach; ?>

           <?php
               include "manual.php";
               include "sobre.php";
           ?>

        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <script src="./assets/js/main.js"></script>

    <?php
    if (empty($_REQUEST['tab'])) {
        $tab = 'geral';
    }else{
        $tab = $_REQUEST['tab'];
    }
    ?>

    <script>
        $(document).ready(function() {
            $('#pills-<?= $tab ?>-tab').tab('show');
        });
    </script>

</body>

</html>