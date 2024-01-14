// Ajax para fazer o login
function login() {
    let email = $("#username").val();
    let password = $("#password").val();
    const data = {email: email, password: password};
    $.ajax({
        url: "user/autenticar.php",
        type: "POST",
        data: data,
        dataType: "json",
        beforeSend: function () {
            loading(2000);
        },
        success: function (response) {
            if (response[0]) {
                checkResp("success",response[2],1500);
                setTimeout(function () {
                    window.location.href = response[1];
                }, 1501);
            } else {
                checkResp("error",response[1],1500);
            }
        }
    });
}
//Loading do SweetAlert
function loading (tempo) {
    let timerInterval
    Swal.fire({
        title: 'Processando!',
        html: 'O processamento termina em <b></b> milissegundos.',
        timer: tempo,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading()
            const b = Swal.getHtmlContainer().querySelector('b')
            timerInterval = setInterval(() => {
                b.textContent = Swal.getTimerLeft()
            }, 100)
        },
        willClose: () => {
            clearInterval(timerInterval)
        }
    })
}
//Confirmar Funcion
function checkResp (icon,title,timer) {
    Swal.fire({
        position: 'center',
        icon: icon,
        title: title,
        showConfirmButton: false,
        timer: timer
    });
}
//Ajax para fazer o cadastro
function register() {
    const modal = $("#userModal");
    $.ajax({
        url: "user/cadastrar.php",
        type: "POST",
        data: $("#formRegister").serialize(),
        dataType: "json",
        beforeSend: function () {
            loading(2000);
        },
        success: function (response) {
            if (response[0]) {
                modal.close();
            checkResp("success",response[2],1500);
            setTimeout(function () {
                window.location.href = response[1];
            }, 1501);
            } else {
                checkResp("error",response[1],2000);
            }
        }
    });
}
//Function para adicionar class ACTIVE no menu
function activeMenu() {
    let url = window.location.href;
    let menu = url.split("/");
    let menuActive = menu[menu.length - 1];
    if (menuActive === "") {
        menuActive = "index.php";
    }
    $(".nav-link").each(function () {
        let link = $(this).attr("href");
        if (menuActive === link) {
            $(this).addClass("active");
        }
    });
}