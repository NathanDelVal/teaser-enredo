# Libary: Bootstrap 
# URI: https://getbootstrap.com/docs/5.1/getting-started/download/
# URI DEMO: https://getbootstrap.com/docs/5.1/getting-started/introduction/introduction/

# Dependências: 
- none

# Explicação Geral: 
- Os códigos abaixo são algumas das funções imbutidas na biblioteca do bootstrap


## Carousel: 

    <div class="boot-carousel arousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?php echo get_template_directory_uri()?> /assets/src/img/aparelhos.png" alt="">
            </div>
            <div class="carousel-item">
                <img src="<?php echo get_template_directory_uri()?> /assets/src/img/aparelhos.png" alt="">
            </div>
            <div class="carousel-item">
                <img src="<?php echo get_template_directory_uri()?> /assets/src/img/aparelhos.png" alt="">
            </div>
        </div>
    </div>

### Obser: Consulte a estrutura JS no arquivo main/_carousel.js
