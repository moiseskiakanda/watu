<?php

namespace Source\User;
use CoffeeCode\DataLayer\Connect;
use CoffeeCode\DataLayer\DataLayer;
class User extends DataLayer {

    //atributos
    private int $idUser;
    private string $nameUser;
    private string $nUser;
    private string $passwordUser;
    private string $loginTimeUser;
    private string $logoutTimeUser;

    public function __construct() {
        parent::__construct("users", ["username", "password", "loginTime", "logoutTime","nuser"], "id", false);
        //Criar a tabela caso nao existir
        $this->createTable();
    }
    //Criar a conexão com o banco de dados
    public function createTable() {
        $sql = "CREATE TABLE IF NOT EXISTS users (
           id INT PRIMARY KEY AUTO_INCREMENT,
           username VARCHAR(50) NOT NULL,
           password VARCHAR(255) NOT NULL,
           loginTime varchar(20),
           logoutTime VARCHAR(20),
           nuser VARCHAR(50)
        );";
        $conn = Connect::getInstance();
        $conn->exec($sql);
    }
    //Getter e Setters
    /**
     * @return int
     */
    public function getIdUser(): int
    {
        return $this->idUser;
    }

    /**
     * @return string
     */
    public function getNUser(): string
    {
        return $this->nUser;
    }

    /**
     * @param string $nUser
     */
    public function setNUser(string $nUser)
    {
        $this->nUser = $nUser;
    }

    /**
     * @param int $idUser
     */
    public function setIdUser(int $idUser): void
    {
        $this->idUser = $idUser;
    }

    /**
     * @return string
     */
    public function getNameUser(): string
    {
        return $this->nameUser;
    }

    /**
     * @param string $nameUser
     */
    public function setNameUser(string $nameUser): void
    {
        $this->nameUser = $nameUser;
    }

    /**
     * @return string
     */
    public function getPasswordUser(): string
    {
        return $this->passwordUser;
    }

    /**
     * @param string $passwordUser
     */
    public function setPasswordUser(string $passwordUser): void
    {
        $this->passwordUser = $passwordUser;
    }

    /**
     * @return string
     */
    public function getLoginTimeUser(): string
    {
        return $this->loginTimeUser;
    }

    /**
     * @param string $loginTimeUser
     */
    public function setLoginTimeUser(string $loginTimeUser): void
    {
        $this->loginTimeUser = $loginTimeUser;
    }

    /**
     * @return string
     */
    public function getLogoutTimeUser(): string
    {
        return $this->logoutTimeUser;
    }

    /**
     * @param string $logoutTimeUser
     */
    public function setLogoutTimeUser(string $logoutTimeUser): void
    {
        $this->logoutTimeUser = $logoutTimeUser;
    }


    //Métodos
    //Insert USERS
    /*
     save create
        use Example\Models\User;
        $user = new User();
        $user->first_name = "Robson";
        $user->last_name = "Leite";
        $userId = $user->save();
    save update
        use Example\Models\User;
        $user = (new User())->findById(2);
        $user->first_name = "Robson";
        $userId = $user->save();
    destroy
        use Example\Models\User;
        $user = (new User())->findById(2);
        $user->destroy();
    destroy
        use Example\Models\User;
        $user = (new User())->findById(2);
        $user->destroy();
    find one user by condition
        $model = new User();
        $user = $model->find("first_name = :name", "name=Robson")->fetch();
        echo $user->first_name;
     */
    // Created user
    public function insertUser(): array
    {
        $userDate = new User();
        $userModel = $userDate->find("username = :username","username={$this->getNameUser()}")->fetch();
        if ($userModel->username == $this->getNameUser()):
            return [false,"Usuário já cadastrado!"];
        else:
            $user = new User();
            $user->username   =  $this->getNameUser();
            $user->password   =  $this->getPasswordUser();
            $user->loginTime  =  $this->getLoginTimeUser();
            $user->logoutTime  =  $this->getLogoutTimeUser();
            $user->nuser  =  $this->getNUser();
            $respAdd = $user->save();
            if ($respAdd >= 1): return [true];
            else: return [false,$user->fail()->getMessage()];
            endif;
        endif;
    }
    // Update User
    public function updateUser(): array
    {
        $user = (new User())->findById($this->getIdUser());
        $user->username   =  $this->getNameUser();
        $user->password   =  $this->getPasswordUser();
        $user->loginTime  =  $this->getLoginTimeUser();
        $user->logoutTime  =  $this->getLogoutTimeUser();
        $user->nuser  =  $this->getNUser();
        $resp = $user->save();
        if ($resp >= 1): return [true];
        else: return [false,$user->fail()->getMessage()];
        endif;

    }
    // Delete User
    public function deleteUser(): bool
    {
        $user = (new User())->findById($this->getIdUser());
        if($user->destroy()): return true;
        else: return false;
        endif;
    }
    // Select User
    public function getUser(): object
    {
        $user = (new User())->findById($this->getIdUser());
        return $user->data();
    }
    // find one user by condition
    public function getUserByCondition()
    {
        $model = new User();
        $user = $model->find("username = :username","username={$this->getNameUser()}")->fetch();

        if ($user) {
            $this->setIdUser($user->id);
            $this->setNameUser($user->username);
            $this->setPasswordUser($user->password);
            $this->setLoginTimeUser($user->loginTime);
            $this->setLogoutTimeUser($user->logoutTime);
            $this->setNUser($user->nuser);
        } else {
            $this->setIdUser(0);
            $this->setNameUser("");
            $this->setPasswordUser("");
            $this->setLoginTimeUser("");
            $this->setLogoutTimeUser("");
            $this->setNUser("");
        }
    }
}

