<?php
/* Created by kiaka
   Project name watu
   Data: 03/09/2023
   Time: 19:50
*/

namespace Source\Agricultor;

use CoffeeCode\DataLayer\Connect;
use CoffeeCode\DataLayer\DataLayer;
use JetBrains\PhpStorm\Pure;

class Agricultor extends DataLayer
{
    private int $idIdentidade;
    private string $indetidadeIdentidade;
    private string $nomeIdentidade;
    private string $localizacaoIdentidade;
    private string $bairroIdentidade;
    private string $municipioIdentidade;
    private string $composicaoIdentidade;
    private string $meiosSubsistenciaIdentidade;
    private string $contactosIdentidade;
    private string $testemunhasIdentidade;
    //construtor
    #[Pure] public function __construct()
    {
        parent::__construct("agricultorIdentidade", ["identidade","nome", "localizacao", "bairro", "municipio", "composicao", "meios", "contactos", "testemunhas","criadodata","modificadodata"], "id", false);
    }
//Create table agricultorIdentidade
    public function tableAgricultorIndentidade() {
        $conn = Connect::getInstance();
        $sql = "CREATE TABLE IF NOT EXISTS agricultorIdentidade (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            identidade VARCHAR(255) NOT NULL,
            nome VARCHAR(255) NOT NULL,
            localizacao VARCHAR(255) NOT NULL,
            bairro VARCHAR(255) NOT NULL,
            municipio VARCHAR(255) NOT NULL,
            composicao VARCHAR(255) NOT NULL,
            meios VARCHAR(255) NOT NULL,
            contactos VARCHAR(255) NOT NULL,
            testemunhas VARCHAR(255) NOT NULL,
            criadodata varchar(26),
            modificadodata varchar(26)
        )";
        $conn->exec($sql);
        $conn = null;
    }
    /**
     * @return int
     */
    public function getIdIdentidade(): int
    {
        return $this->idIdentidade;
    }

    /**
     * @param mixed $idIdentidade
     */
    public function setIdIdentidade(int $idIdentidade)
    {
        $this->idIdentidade = $idIdentidade;
    }

    /**
     * @return string
     */
    public function getIndetidadeIdentidade(): string
    {
        return $this->indetidadeIdentidade;
    }

    /**
     * @param mixed $indetidadeIdentidade
     */
    public function setIndetidadeIdentidade(string $indetidadeIdentidade): void
    {
        $this->indetidadeIdentidade = $indetidadeIdentidade;
    }

    /**
     * @return string
     */
    public function getNomeIdentidade(): string
    {
        return $this->nomeIdentidade;
    }

    /**
     * @param mixed $nomeIdentidade
     */
    public function setNomeIdentidade(string $nomeIdentidade): void
    {
        $this->nomeIdentidade = $nomeIdentidade;
    }

    /**
     * @return string
     */
    public function getLocalizacaoIdentidade(): string
    {
        return $this->localizacaoIdentidade;
    }

    /**
     * @param mixed $localizacaoIdentidade
     */
    public function setLocalizacaoIdentidade(string $localizacaoIdentidade): void
    {
        $this->localizacaoIdentidade = $localizacaoIdentidade;
    }

    /**
     * @return string
     */
    public function getBairroIdentidade(): string
    {
        return $this->bairroIdentidade;
    }

    /**
     * @param mixed $bairroIdentidade
     */
    public function setBairroIdentidade(string $bairroIdentidade): void
    {
        $this->bairroIdentidade = $bairroIdentidade;
    }

    /**
     * @return string
     */
    public function getMunicipioIdentidade(): string
    {
        return $this->municipioIdentidade;
    }

    /**
     * @param mixed $municipioIdentidade
     */
    public function setMunicipioIdentidade(string $municipioIdentidade): void
    {
        $this->municipioIdentidade = $municipioIdentidade;
    }

    /**
     * @return string
     */
    public function getComposicaoIdentidade(): string
    {
        return $this->composicaoIdentidade;
    }

    /**
     * @param mixed $composicaoIdentidade
     */
    public function setComposicaoIdentidade(string $composicaoIdentidade): void
    {
        $this->composicaoIdentidade = $composicaoIdentidade;
    }

    /**
     * @return string
     */
    public function getMeiosSubsistenciaIdentidade(): string
    {
        return $this->meiosSubsistenciaIdentidade;
    }

    /**
     * @param mixed $meiosSubsistenciaIdentidade
     */
    public function setMeiosSubsistenciaIdentidade(string $meiosSubsistenciaIdentidade): void
    {
        $this->meiosSubsistenciaIdentidade = $meiosSubsistenciaIdentidade;
    }

    /**
     * @return string
     */
    public function getContactosIdentidade(): string
    {
        return $this->contactosIdentidade;
    }

    /**
     * @param mixed $contactosIdentidade
     */
    public function setContactosIdentidade(string $contactosIdentidade): void
    {
        $this->contactosIdentidade = $contactosIdentidade;
    }

    /**
     * @return string
     */
    public function getTestemunhasIdentidade(): string
    {
        return $this->testemunhasIdentidade;
    }

    /**
     * @param mixed $testemunhasIdentidade
     */
    public function setTestemunhasIdentidade(string $testemunhasIdentidade): void
    {
        $this->testemunhasIdentidade = $testemunhasIdentidade;
    }
    //metodos
    //adicionar agricultor
    public function addAgricultor(): array
    {
        //cria a tabela agricultorIdentidade
        $this->tableAgricultorIndentidade();
        $agricultor = new Agricultor();
        $agricultor->identidade     = $this->getIndetidadeIdentidade();
        $agricultor->nome           = $this->getNomeIdentidade();
        $agricultor->localizacao    = $this->getLocalizacaoIdentidade();
        $agricultor->bairro         = $this->getBairroIdentidade();
        $agricultor->municipio      = $this->getMunicipioIdentidade();
        $agricultor->composicao     = $this->getComposicaoIdentidade();
        $agricultor->meios          = $this->getMeiosSubsistenciaIdentidade();
        $agricultor->contactos      = $this->getContactosIdentidade();
        $agricultor->testemunhas    = $this->getTestemunhasIdentidade();
        $agricultor->criadodata     = date("Y-m-d H:i:s");
        $agricultor->modificadodata     = date("Y-m-d H:i:s");
        $agriId = $agricultor->save();
        if ($agriId >= 1) {
            return [true, "Agricultor adicionado com sucesso",$this->getIndetidadeIdentidade()];
        } else {
            return [false, "Erro ao adicionar agricultor<br>".$agricultor->fail->getMessage()];
        }
    }
    //editar agricultor
    public function editAgricultor(): array
    {
        $agricultorUpdate = (new Agricultor())->findById($this->getIdIdentidade());
        $agricultorUpdate->identidade       = $this->getIndetidadeIdentidade();
        $agricultorUpdate->nome             = $this->getNomeIdentidade();
        $agricultorUpdate->localizacao      = $this->getLocalizacaoIdentidade();
        $agricultorUpdate->bairro           = $this->getBairroIdentidade();
        $agricultorUpdate->municipio        = $this->getMunicipioIdentidade();
        $agricultorUpdate->composicao       = $this->getComposicaoIdentidade();
        $agricultorUpdate->meios            = $this->getMeiosSubsistenciaIdentidade();
        $agricultorUpdate->contactos        = $this->getContactosIdentidade();
        $agricultorUpdate->testemunhas      = $this->getTestemunhasIdentidade();
        $agricultorUpdate->modificadodata   = date("Y-m-d H:i:s");
        $agriId = $agricultorUpdate->save();
        if ($agriId >= 1) {
            return [true, "Agricultor editado com sucesso",$this->getIndetidadeIdentidade()];
        } else {
            return [false, "Erro ao editar agricultor<br>".$agricultorUpdate->fail()->getMessage()];
        }
    }
    //eliminar agricultor
    public function deleteAgricultor(): array
    {
        $agricultorDelete = (new Agricultor())->findById($this->getIdIdentidade());
        $agriId = $agricultorDelete->destroy();
        if ($agriId >= 1) {
            return [true, "Agricultor eliminado com sucesso"];
        } else {
            return [false, "Erro ao eliminar agricultor"];
        }
    }
    //listar agricultores
    public function listAgricultores(): Agricultor|array|null
    {
        $this->tableAgricultorIndentidade();
        $dados = new Agricultor();
        return $dados->find()->fetch(true);
    }
    //Contar todos os agricultores
    public function countAgricultores(): int
    {
        return (new Agricultor())->find()->count();
    }
    //Pegar somente um agricultor
    public function getAgricultor($code)
    {
        $agr = new Agricultor();
        $data = $agr->find("identidade = :code", "code=".$code)->fetch();
        $dataCount = $agr->find("identidade = :code", "code=".$code)->count();
        if ($dataCount >= 1) {
            $this->setIdIdentidade($data->id);
            $this->setIndetidadeIdentidade($data->identidade);
            $this->setNomeIdentidade($data->nome);
            $this->setLocalizacaoIdentidade($data->localizacao);
            $this->setBairroIdentidade($data->bairro);
            $this->setMunicipioIdentidade($data->municipio);
            $this->setComposicaoIdentidade($data->composicao);
            $this->setMeiosSubsistenciaIdentidade($data->meios);
            $this->setContactosIdentidade($data->contactos);
            $this->setTestemunhasIdentidade($data->testemunhas);
        } else {
            $this->setIdIdentidade(0);
            $this->setIndetidadeIdentidade("");
            $this->setNomeIdentidade("");
            $this->setLocalizacaoIdentidade("");
            $this->setBairroIdentidade("");
            $this->setMunicipioIdentidade("");
            $this->setComposicaoIdentidade("");
            $this->setMeiosSubsistenciaIdentidade("");
            $this->setContactosIdentidade("");
            $this->setTestemunhasIdentidade("");
        };
    }
    //Pegar somente um agricultor por ID
    public function getAgricultorId($code)
    {
        $agrId = new Agricultor();
        $data = $agrId->find("id = :code", "code=".$code)->fetch();
        $dataCountId = $agrId->find("id = :code", "code=".$code)->count();
        if ($dataCountId >= 1) {
            $this->setIdIdentidade($data->id);
            $this->setIndetidadeIdentidade($data->identidade);
            $this->setNomeIdentidade($data->nome);
            $this->setLocalizacaoIdentidade($data->localizacao);
            $this->setBairroIdentidade($data->bairro);
            $this->setMunicipioIdentidade($data->municipio);
            $this->setComposicaoIdentidade($data->composicao);
            $this->setMeiosSubsistenciaIdentidade($data->meios);
            $this->setContactosIdentidade($data->contactos);
            $this->setTestemunhasIdentidade($data->testemunhas);
        } else {
            $this->setIdIdentidade(0);
            $this->setIndetidadeIdentidade("");
            $this->setNomeIdentidade("");
            $this->setLocalizacaoIdentidade("");
            $this->setBairroIdentidade("");
            $this->setMunicipioIdentidade("");
            $this->setComposicaoIdentidade("");
            $this->setMeiosSubsistenciaIdentidade("");
            $this->setContactosIdentidade("");
            $this->setTestemunhasIdentidade("");
        };
    }
    //funcao para verificar se a identidade ja exite na base de dados
    public function checkIdentidade($code): array
    {
        $this->tableAgricultorIndentidade();
        $agr = new Agricultor();
        $data = $agr->find("identidade = :code", "code=".$code)->fetch();
        $dataCount = $agr->find("identidade = :code", "code=".$code)->count();
        if ($dataCount >= 1) {
            return [true, $data->id];
        } else {
            return [false, 0];
        }
    }
    //consulta de Code enviado é ID ou Identidade
    public function checkCode($code): array
    {
        $this->tableAgricultorIndentidade();
        $agr = new Agricultor();
        $data = $agr->find("identidade = :code", "code=".$code)->fetch();
        $dataCount = $agr->find("identidade = :code", "code=".$code)->count();
        if ($dataCount >= 1) {
            return [true, $data->id, $data->identidade];
        } else {
                return [false, 0, $code];
        }
    }
}