<?php $thisIntegracao = 'ga4Configuracoes' ?>
<?php if($$thisIntegracao['geral']['status'] == true): ?>

    <?php ####################################################################################################################################### ?>
    <?php # Start Google Analytics Tag ########################################################################################################## ?>
    <?php if($ga4Configuracoes['geral']['idGa4'] !== ""): ?>

        <!--  GA4 - Google Analytics 4  -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?= $ga4Configuracoes['geral']['idGa4'] ?>"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() { dataLayer.push(arguments); }
            gtag('js', new Date());

            gtag('config', '<?= $ga4Configuracoes['geral']['idGa4'] ?>');
        </script>

    <?php endif; ?>

    <?php #End Google Analytics Tag ############################################################################################################# ?>
    <?php ####################################################################################################################################### ?>

<?php endif; ?>