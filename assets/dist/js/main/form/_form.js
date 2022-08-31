const Form = function(){

    //VARS 
    this.submit = document.querySelector("#form-botao-banner"); //Localização do botão submit
    this.mensagem = "Enviando"; //Mensagem exibida enquanto carrega o form
    this.class = "loading"; //Classe do elemento global.
    this.loop; //Variável que armazena o loop.
    this.effect_btn = { 
        load:  "visibility: hidden", //Quando o formulário estiver carregando
        failed: "visibility: visible" //Quando o formulário não for sucedido
    }
    this.bloc; //O elemento completo das mensagens como um objeto tipo html.



    /**
     *  MODAL SPOTS
     */

    this.evPoint = ($info = {load: "carregando"})=>{
        let div = document.createElement('div');
        div.className = this.class;
        let p = document.createElement('p');
        p.textContent = this.mensagem;
        let span = document.createElement('span');
        span.className = "point"
        p.appendChild(span);
        div.appendChild(p);

        this.bloc = div;
        return div;
    }

    this.pointLoop = ()=>{
        let x = 1;
        var r = setInterval(() => {
            if(x == 3){
                document.querySelector('.point').innerText = '.'
                x = 1;
            }
            else{
                document.querySelector('.point').innerText += "."
                x++
            }
        }, 500);     
        return r;

    }

    this.loadSpots = ($info)=>{ 
        this.submit.style= this.effect_btn.load;
        let form = this.submit.closest('form')
        form.appendChild(this.evPoint(), this.submit)
        this.loop = this.pointLoop();
    }
                   

    this.responseSpots = ($info)=>{
        if($info.response == true){
            this.bloc.querySelector("p").innerHTML = "Enviado!";
            setTimeout(()=>{
                this.bloc.remove();
            }, 2000)
            clearInterval(this.loop);
            if($info.type == 'wpp'){
                setTimeout(()=>{
                    this.new_tab()
                }, 1000)
            }
        }else{
            clearInterval(this.loop);
            this.bloc.querySelector("p").innerHTML = "Não Enviado =/";
            setTimeout(()=>{
                this.bloc.remove();
                this.submit.style = this.effect_btn.failed;
            }, 1000)
        }
    }



    /**
     *  MODAL VALIDATION
     */

    this.modal = ($html)=>{
        //CRIANDO OS ELEMENTOS QUE SERÃO INSERIDOS NO LAYOUT
        let container = document.createElement('div')
        container.className = "loading-modal"
        let content = document.createElement('div')
        content.className = "internit_modal";
        container.appendChild(content)
        let head = document.createElement('div')
        head.className = "internit_modal-head"
        content.appendChild(head)
        let body = document.createElement('div')
        body.className = "internit_modal-body"
        content.appendChild(body)
        document.body.appendChild(container)

        //ELEMENTOS RESTANTES
        let button = document.createElement("button")
        button.textContent = "x"
        let p = document.createElement('p')
        // p.textContent = this.mensagem;
        // let span = document.createElement('span')
        // span.className = 'point'
        // p.appendChild(span);

        container.classList.add('modal-show')
        content.classList.add('internit_modal-show')
        head.appendChild(button)
        body.innerHTML = $html

        this.bloc = container;
    }

    this.modal_response = ($info)=>{
        if($info){ //CASO O FORMULÁRIO SEJA ENVIADO COM SUCESSO
            // COLOQUE SEU CÓDIGO HTML PARA EXPOR ALGO NO MODAL ABAIXO
            this.bloc.querySelector(".internit_modal-body").innerHTML =  `

            <span>Enviado com sucesso!</span>
            
            `;
            setTimeout(()=>{
                this.bloc.remove()
                if($info.type == 'wpp'){
                    this.new_tab()
                }
            }, 1000)
           
        }else{//CASO O FORMULÁRIO NÃO SEJA ENVIADO 
            this.bloc.querySelector(".internit_modal-body").innerHTML =  `

            <span>Desculpe! Mas ocorreu um erro no envio. Tente novamente.</span>
            
            `;
            setTimeout(()=>{
                this.bloc.remove()
            }, 1000)
        }
    }

    this.new_tab = ()=>{
        window.open("https://api.whatsapp.com/send?phone=55999999999999999&text=dsfsdfsdfsdfsd", '_blank')
    }

    

    this.action_load = ()=>{
        this.loadSpots();
        // this.modal(`
        //     <span>Carregando</span>
        // `);
    }

    this.response_final = ($info)=>{
        this.responseSpots($info);
        // this.modal_response($info)
    }

}
  

