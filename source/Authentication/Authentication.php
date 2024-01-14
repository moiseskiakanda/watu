<?php
namespace Source\Authentication;
use Source\User\User;

class Authentication
{
/*
    Codificando a senha
    $password = "senha_secreta";
    $hash = password_hash($password, PASSWORD_DEFAULT);

    // Verificando a senha
    $senha_informada = "senha_secreta";
    if (password_verify($senha_informada, $hash)) {
        echo 'A senha está correta!';
    } else {
        echo 'A senha está incorreta.';
    }
*/
    //Autenticar user || saber se existe na base dados ou nao
    public function authenticate($username, $password): array
    {
        //comparar as informações com a base de dados
        $user = new User();

        $user->setNameUser($username);

        $user->getUserByCondition();

        if (password_verify($password, $user->getPasswordUser())) {
            //criar sessão
            session_start();
            $_SESSION['u']  = $user->getNameUser();
            $_SESSION['i']  = $user->getIdUser();
            $_SESSION['lu'] = $user->getLoginTimeUser();
            $_SESSION['lt'] = $user->getLogoutTimeUser();
            $_SESSION['nU'] = $user->getNUser();
            //redirecionar para a página de dashboard
            return array(true, "dashboard");
            //header("Location: " . CONF_URL_BASE . "/dashboard/");
        } else {
            //header("Location: " . CONF_URL_BASE );
            return array(false, "Email ou Senha incorretos!<br>Então estas sem acesso ao sistema!");
        }
    }
    //Verificar se o user está logado
    public function isLogged()
    {
        session_start();
        //validar as informacoes do usuario na base de dados
        $user = new User();
        if ($_SESSION['u'] && $_SESSION['i'] && $_SESSION['lu'] && $_SESSION['lt'] && $_SESSION['nU'] !== null) {
            $user->setNameUser($_SESSION['u']);
            $user->getUserByCondition();
            if ($user->getNameUser() && $user->getIdUser() && $user->getLoginTimeUser() && $user->getLogoutTimeUser() && $user->getNUser()) {
                return true;
            } else {
                $auth = new Authentication();
                $auth->logout();
            }
        } else {
            $auth = new Authentication();
            $auth->logout();
        }
    }
    //our user logout
    public function logout(): void
    {
        session_start();
        session_destroy();
        header("Location: " . CONF_URL_BASE);
    }
}