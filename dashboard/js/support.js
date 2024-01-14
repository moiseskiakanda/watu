/* Created by kiaka
   Project name watu
   Data: 20/09/2023
   Time: 12:50
*/
//create a function Logout
const URL_BASE = "https://localhost/watu";
function logout() {
//adicionar um evento de click com SweetAlert para validar se cancela ou não o logout
    Swal.fire({
        title: 'Deseja realmente sair?',
        text: "Você será redirecionado para a página de login!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#2ecc71',
        cancelButtonColor: '#e74c3c',
        confirmButtonText: 'Sim, sair!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            //redirecionar para a página de login
            window.location.href = URL_BASE+'/user/logout.php';
        }
    });
}
//pegar o ID do botão logout
let btnLogout = document.getElementById('btnLogout');
//adicionar um evento de click no botão logout
btnLogout.addEventListener('click', logout);

function carregandoInfoOne () {
    Swal.fire({
        title: '<span class="tab-info">POR FAVOR</span>',
        text: 'Aguarde enquanto processamos as informações...',
        showConfirmButton: false,
        timer: 300, onOpen: () => {
            swal.showLoading()
        }
    }).then((procOn) => {
        if (procOn.dismiss === 'timer') {
            console.log('...');
        }
    })
}
function carregandoInfoMeio () {
    Swal.fire({
        title: '<span class="tab-info">POR FAVOR</span>',
        text: 'Aguarde enquanto processamos as informações...',
        showConfirmButton: false,
        timer: 300, onOpen: () => {
            swal.showLoading()
        }
    }).then((procOn) => {
        if (procOn.dismiss === 'timer') {
            console.log('...');
        }
    })
}
//Funcao para mostar envio de dados de um formulario
function carregandoInfoTwo () {
    Swal.fire({
        title: '<span class="tab-info">POR FAVOR</span>',
        text: 'Aguarde enquanto enviamos os dados...',
        showConfirmButton: false,
        timer: 300, onOpen: () => {
            swal.showLoading()
        }
    }).then((procOn) => {
        if (procOn.dismiss === 'timer') {
            console.log('...');
        }
    })
}
//Funcao para mostar resposta de erro
function erroInfoOne (msg) {
    Swal.fire({
        icon: 'error',
        title: 'ATENÇÃO!',
        confirmButtonColor: '#e71919',
        confirmButtonText: 'Continuar',
        html: msg,
    });
}
//Funcao para mostar resposta de sucesso
function sucessoInfoOne (msg) {
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Sucesso!',
        html: msg,
        showConfirmButton: false,
        timer: 2000
    });
}

function remove_add (url) {
    const c_n = $(".newContent");
    const cp = $("#pageContentPaneil");

    $.ajax ({ url:url, type: "get", dataType:"html",
        beforeSend:function () {
            c_n.remove();
            //$(".modal").modal("close");
        },
        success:function (conteudo) {
            if(c_n.length){
                //$(".modal").modal("close");
                c_n.remove();

                cp.html("");
                setTimeout(function () {
                    cp.append(conteudo);
                }, 200);
            } else {
                location.reload();
            }
        },
        error: function (resp) { alert(resp.responseText);
            location.reload();
        }
    });
}
//Funcao AJAX para enviar dados de qualquer formulario. Espera receber, URL, ID do formulario, ID do botao de envio.
function processFunction(url, formId,pagina) {
    const formData = $('form#' + formId).serialize(); // Serializa os dados do formulário

    $.ajax({
        url: url, // URL para onde os dados serão enviados
        type: 'POST', // Método de envio
        data: formData, // Dados a serem enviados
        dataType: 'json', // Tipo de dados esperados na resposta
        beforeSend: function() { carregandoInfoTwo(); },
        success: function(response) {
            // A resposta deve ser um array
            if ($.isArray(response)) {
                //verificar se a resposta é TRUE ou FALSE
                if (response[0] === true) {
                    sucessoInfoOne(response[1]);
                    //limpar o formulario depois de 1,2 segundos
                    setTimeout(function () {
                        $('form#' + formId)[0].reset();
                        //Abrir a proxima pagina
                        remove_add(pagina+response[2]);
                    }, 200);
                } else if(response[0] === false) {
                    erroInfoOne(response[1]);
                } else {
                    erroInfoOne('Alguma coisa aconteceu:'+response.responseText);
                }
            } else {
                erroInfoOne('Tem algo errado!<br>'+response.responseText);
            }
        },
        error: function(jqXHR) {
            erroInfoOne('Erro ao enviar dados!<br>'+jqXHR.responseText);
        }
    });
}
//funcao que abre o modal com iframe e adiciona o url no iframe
function openModalPrint(url) {
    $('#iframePrint').attr('src', url);
    setTimeout(function () {
        $('#modalIframePrint').modal('show');
    }, 90);
}