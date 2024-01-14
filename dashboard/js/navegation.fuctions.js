/* Created by kiaka
   Project name watu
   Data: 20/09/2023
   Time: 21:42
*/
//funcao para adicionar a class active no elemento da lista LI (#menu)
$('#menu li').click(function(){
    $(this).addClass('active').siblings().removeClass('active');
});
//funcao que ira carregar a pagina addUser
function addUser (code) {
    remove_add("./agricultores/addAgricultorIdentidade.php?id="+code);
}
//funcao que ira carregar a pagina addUser
function agricultorHomePage () {
    remove_add("./agricultores/pageHomeAgricultor.php");
}
//funcao que ira carregar a pagina Lavra
function addLavra (code) {
    remove_add("./agricultores/addLavraAgricultor.php?code="+code);
}
//funcao que ira carregar a pagina Lavra ocupada
function addLavraOcupada (code,id) {
    remove_add("./agricultores/addLavraOcupada.php?code="+code+"&id="+id);
}
//funcao que ira carregar a pagina Inequerito
function pageInequerito (code) {
    remove_add("./agricultores/pageInquerito.php?perfil="+code);
}