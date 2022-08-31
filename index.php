<?php
/**
 * The main template file
 *
 * Este é o modelo de landing page base da internit, desenvolvedora web. 
 * Nele você encontrará recursos para construir totalmente uma landing page 
 * sem precisar baixar nada.
 *
 * @package internit
 */

 require './header.php';

?>

	<main id="primary" class="site-main row justify-content-center">
            <div class="col-md-4 left-content position-relative">
                    <img src="assets/src/img/fachada.png" alt="fachada">
                    <div class="logo">
                        <div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                        <h1>enredo</h1>
                        <span>Riachuelo &bull; 201</span>
                    </div>
                    <div class="display-large">
                        <div></div>
                        <div></div>
                    </div>
                        <!--<img src="assets/src/img/logo.png" style="width:70%;height:70%" alt="logo">-->
            </div>
        <!--<div class="display-small banner">
            <img src="assets/src/img/fachada.png" alt="">
        </div>-->
        <div class="col-md-8 d-flex flex-column align-items-center text-center position-relative justify-content-center">
                <h3 class="title">Um novo enredo num tradicional <br>
                endereço no Centro do Rio.</h3>
                <br>
                <h1 class="letreiro">Studios de <p class='break'>25 a 33m²<span class="subtitle">Unidades de cobertura com varanda</span></p></h1>
                <div class="form-container">
                    <h2>Cadastre-se e antecipa-se ao lançamento</h2>

                    <?php ############################################################################################################# ?>
                    <?php $formName = 'contato'; ?>
                    <form action="" name="<?= $formName ?>" id="form-<?= $formName ?>">

                    <div> 
                        <!-- input nome -->
                            <input name="Nome" type="text" class="" placeholder="Digite seu nome*" required>

                            <!-- input telefone -->
                            <input name="Telefone" type="tel" class="phone" placeholder="Informe o seu telefone*" required>

                            <!-- input email -->
                            <input name="Email" type="email" class="" placeholder="Digite o seu melhor e-mail*" required>

                            <!-- input Mensagem -->
                            <!-- <textarea name="Mensagem" type="text" class="" placeholder="Mensagem" rows="3" ></textarea>-->

                            <!-- input checkbox -->
                            <p>
                                <input name="Termos" type="checkbox"  value="aceito" required> li e aceito os termos e a 
                                <a href="" target="_blank" >Política de Privacidade</a>.
                            </p>
                        </div>
                        <br>
                        <!-- botão enviar -->
                        <div style="width:100%">
                            <button id="form-botao-<?= $formName ?>" type="submit" class="">Saiba Mais</button>
                        </div>
                    </form>
                    <?php unset($formName); ?>
                    <?php ############################################################################################################# ?>
                </div>
                <br>
               <!-- <div class="realizacao">
                    <div><p>Incorporação e Realização:</p>
                        <img src="assets/src/img/logo_semeare.png" style="position:relative;bottom:10px" alt="">
                    </div>
                    <div><p>Construção:</p>
                        <img src="assets/src/img/logo_klacon.svg" alt="">
                    </div>
                </div> -->
                <!--<div class="logo_internit">Desenvolvido por: <img src="assets/src/img/logo_internit.svg" style="width:75px;height:18px" alt=""></div>-->
        </div>
    </main>


     <!-- SIDE CONTENT -->
        <div class="right-content display-large">
            <div>
                <div></div>
                <div></div>
            </div>
        </div>
<?php
require './footer.php';
?>

