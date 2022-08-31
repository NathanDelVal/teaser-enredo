document.addEventListener("DOMContentLoaded", function () {
    setInterval(() => {
        let inputs = document.querySelectorAll('.form-control');

        for (let input of inputs) {
            input.onchange = function () {
                if (this.value) {
                    this.classList.add('active');
                } else {
                    this.classList.remove('active');
                }
            }

            if (input.value) {
                input.classList.add('active');
            } else {
                input.classList.remove('active');
            }
        }
    }, 500);


});






$('.novo-formulario').on('click', function (e){

    let index = $('.form-list div:last-child').attr('index-value')
    if(typeof index === 'undefined' ){
        index = 1;
    }else{
        index = parseInt(index) + 1;
    }

    let novoFormInput = '    <div class="mb-3 form-floating input-group" data-form="" index-value="'+index+'">\n' +
        '\n' +
        '\n' +
        '        <input type="text" name="formulario-'+index+'" id="floatingForm" value="" class="form-control form" placeholder="Nome Formulario">\n' +
        '        \n' +
        '        <div class="input-group-text" style="background-color: #59414100; border-color: #0000;">\n' +
        '            <button type="button" class="btn btn-outline-light" onclick="removerFormulario($(this))" style="margin-top: 0.6em; color: #0d6efd; font-size: 12px;">x</button>\n' +
        '        </div>\n' +
        '\n' +
        '        <label for="floatingForm">Nome Formulario '+index+':</label>\n' +
        '    </div>'

    $('.form-list').append(novoFormInput)

})


function removerFormulario(form) {
    $(form).parent().parent().remove()
}








function adicionarEmail(form){


    let index = $('.emails-'+form+'-list .col-4:last-child').attr('index-value')
    if(typeof index === 'undefined' ){
        index = 1;
    }else{
        index = parseInt(index) + 1;
    }


    let novoEmailInput = '  <div class="col-4" style="margin-top:10px;" index-value="'+index+'">\n' +
        '                        <div class="form-floating input-group">\n' +
        '\n' +
        '                            <input type="email" name="'+form+'-sendTo-'+index+'" value="" class="form-control">\n' +
        '\n' +
        '                            <div class="input-group-text" style="background-color: #59414100; border-color: #0000;">\n' +
        '                                <button type="button" class="btn btn-outline-light" onclick="removerEmail($(this))" style="margin-top: 0.6em; color: #0d6efd; font-size: 12px;">x</button>\n' +
        '                            </div>\n' +
        '\n' +
        '                            <label>Email '+index+':</label>\n' +
        '                        </div>\n' +
        '                    </div>'

    $('.emails-'+form+'-list').append(novoEmailInput)

}

function removerEmail(form) {
    $(form).parent().parent().parent().remove()
}
