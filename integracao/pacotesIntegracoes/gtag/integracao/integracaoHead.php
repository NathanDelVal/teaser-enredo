<?php $thisIntegracao = 'gtagConfiguracoes' ?>
<?php if($$thisIntegracao['geral']['status'] == true): ?>

    <?php ####################################################################################################################################### ?>
    <?php # Start Google Tag Manager ############################################################################################################ ?>

        <?php if($gtagConfiguracoes['geral']['idTagManager'] !== ""): ?>

            <!-- Google Tag Manager (GTM) -->
            <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
                })(window,document,'script','dataLayer','<?= $gtagConfiguracoes['geral']['idTagManager'] ?>');
            </script>

        <?php endif; ?>

    <?php #End Google Tag Manager ############################################################################################################### ?>
    <?php ####################################################################################################################################### ?>

    <?php ####################################################################################################################################### ?>
    <?php # Start Google Analytics Tag ########################################################################################################## ?>
        <?php if($gtagConfiguracoes['geral']['idAnalytics'] !== ""): ?>

        <!--  Global Site Tag - Google Analytics  -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?= $gtagConfiguracoes['geral']['idAnalytics'] ?>"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag() { dataLayer.push(arguments); }
                gtag('js', new Date());

                gtag('config', '<?= $gtagConfiguracoes['geral']['idAnalytics'] ?>');
            </script>

        <?php endif; ?>

    <?php #End Google Analytics Tag ############################################################################################################# ?>
    <?php ####################################################################################################################################### ?>

<?php endif; ?>