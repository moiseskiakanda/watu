<?php
/* Created by kiaka
   Project name watu
   Data: 22/09/2023
   Time: 05:30

$row["id"]
$row["localizacao"]
$row["bairro"]
$row["municipio"]
$row["pontos_referencia"]
$row["area_total"]
$row["area_cultivo"]
$row["culturas"]
$row["producao_anual"]
*/

namespace Source\Agricultor;

use CoffeeCode\DataLayer\Connect;
use CoffeeCode\DataLayer\DataLayer;

class Lavra extends DataLayer
{
    //Atributos
    private int $idLavra;
    private string $codeAgricultorLavra;
    private string $localizacaoLavra;
    private string $bairroLavra;
    private string $municipioLavra;
    private string $pontosReferenciaLavra;
    private string $areaTotalLavra;
    private string $areaCultivoLavra;
    private string $culturasLavra;
    private string $producaoAnualLavra;
    //Construtor
    public function __construct()
    {
        parent::__construct("agricultorLavra", ["codeAgricultor","localizacao", "bairro", "municipio", "pontosReferencia", "areaTotal", "areaCultivo", "culturas", "producaoAnual","createdatelavra","updatedatelavra"], "id", false);
    }
    //Create table agricultorLavra
    public function tableAgricultorLavra() {
        $conn = Connect::getInstance();
        $sql = "CREATE TABLE IF NOT EXISTS agricultorLavra (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            codeAgricultor VARCHAR(255) NOT NULL,
            localizacao VARCHAR(255) NOT NULL,
            bairro VARCHAR(255) NOT NULL,
            municipio VARCHAR(255) NOT NULL,
            pontosReferencia VARCHAR(255) NOT NULL,
            areaTotal VARCHAR(255) NOT NULL,
            areaCultivo VARCHAR(255) NOT NULL,
            culturas VARCHAR(255) NOT NULL,
            producaoAnual VARCHAR(255) NOT NULL,
            createdatelavra VARCHAR(26),
            updatedatelavra VARCHAR(26)
        )";
        $conn->exec($sql);
        $conn = null;
    }
    //Getters and Setters

    /**
     * @return int
     */
    public function getIdLavra(): int
    {
        return $this->idLavra;
    }

    /**
     * @param int $idLavra
     */
    public function setIdLavra(int $idLavra): void
    {
        $this->idLavra = $idLavra;
    }

    /**
     * @return string
     */
    public function getCodeAgricultorLavra(): string
    {
        return $this->codeAgricultorLavra;
    }

    /**
     * @param string $codeAgricultorLavra
     */
    public function setCodeAgricultorLavra(string $codeAgricultorLavra): void
    {
        $this->codeAgricultorLavra = $codeAgricultorLavra;
    }

    /**
     * @return string
     */
    public function getLocalizacaoLavra(): string
    {
        return $this->localizacaoLavra;
    }

    /**
     * @param string $localizacaoLavra
     */
    public function setLocalizacaoLavra(string $localizacaoLavra): void
    {
        $this->localizacaoLavra = $localizacaoLavra;
    }

    /**
     * @return string
     */
    public function getBairroLavra(): string
    {
        return $this->bairroLavra;
    }

    /**
     * @param string $bairroLavra
     */
    public function setBairroLavra(string $bairroLavra): void
    {
        $this->bairroLavra = $bairroLavra;
    }

    /**
     * @return string
     */
    public function getMunicipioLavra(): string
    {
        return $this->municipioLavra;
    }

    /**
     * @param string $municipioLavra
     */
    public function setMunicipioLavra(string $municipioLavra): void
    {
        $this->municipioLavra = $municipioLavra;
    }

    /**
     * @return string
     */
    public function getPontosReferenciaLavra(): string
    {
        return $this->pontosReferenciaLavra;
    }

    /**
     * @param string $pontosReferenciaLavra
     */
    public function setPontosReferenciaLavra(string $pontosReferenciaLavra): void
    {
        $this->pontosReferenciaLavra = $pontosReferenciaLavra;
    }

    /**
     * @return string
     */
    public function getAreaTotalLavra(): string
    {
        return $this->areaTotalLavra;
    }

    /**
     * @param string $areaTotalLavra
     */
    public function setAreaTotalLavra(string $areaTotalLavra): void
    {
        $this->areaTotalLavra = $areaTotalLavra;
    }

    /**
     * @return string
     */
    public function getAreaCultivoLavra(): string
    {
        return $this->areaCultivoLavra;
    }

    /**
     * @param string $areaCultivoLavra
     */
    public function setAreaCultivoLavra(string $areaCultivoLavra): void
    {
        $this->areaCultivoLavra = $areaCultivoLavra;
    }

    /**
     * @return string
     */
    public function getCulturasLavra(): string
    {
        return $this->culturasLavra;
    }

    /**
     * @param string $culturasLavra
     */
    public function setCulturasLavra(string $culturasLavra): void
    {
        $this->culturasLavra = $culturasLavra;
    }

    /**
     * @return string
     */
    public function getProducaoAnualLavra(): string
    {
        return $this->producaoAnualLavra;
    }

    /**
     * @param string $producaoAnualLavra
     */
    public function setProducaoAnualLavra(string $producaoAnualLavra): void
    {
        $this->producaoAnualLavra = $producaoAnualLavra;
    }
    //Métodos
    //Adicionar Lavra
    public function addLavra(): array
    {
        $lavra = new Lavra();
        $lavra->tableAgricultorLavra();
        $lavra->codeAgricultor     = $this->getCodeAgricultorLavra();
        $lavra->localizacao        = $this->getLocalizacaoLavra();
        $lavra->bairro             = $this->getBairroLavra();
        $lavra->municipio          = $this->getMunicipioLavra();
        $lavra->pontosReferencia   = $this->getPontosReferenciaLavra();
        $lavra->areaTotal          = $this->getAreaTotalLavra();
        $lavra->areaCultivo        = $this->getAreaCultivoLavra();
        $lavra->culturas           = $this->getCulturasLavra();
        $lavra->producaoAnual      = $this->getProducaoAnualLavra();
        $lavra->createdatelavra    = date('Y-m-d H:i:s');
        $lavra->updatedatelavra    = date('Y-m-d H:i:s');
        $return = $lavra->save();
        if($return >= 1) {
            return [true,"A Lavra foi cadastrada com sucesso!",$this->getCodeAgricultorLavra()];
        } else {
            return [false,"Erro ao cadastrar a Lavra!<br>".$lavra->fail()->getMessage()];
        }
    }
    //Editar a Lavra
    public function editLavra(): array
    {
        $lavraUpdate = (new Lavra())->findById($this->getIdLavra());
        $lavraUpdate->codeAgricultor     = $this->getCodeAgricultorLavra();
        $lavraUpdate->localizacao        = $this->getLocalizacaoLavra();
        $lavraUpdate->bairro             = $this->getBairroLavra();
        $lavraUpdate->municipio          = $this->getMunicipioLavra();
        $lavraUpdate->pontosReferencia   = $this->getPontosReferenciaLavra();
        $lavraUpdate->areaTotal          = $this->getAreaTotalLavra();
        $lavraUpdate->areaCultivo        = $this->getAreaCultivoLavra();
        $lavraUpdate->culturas           = $this->getCulturasLavra();
        $lavraUpdate->producaoAnual      = $this->getProducaoAnualLavra();
        $lavraUpdate->updatedatelavra    = date('Y-m-d H:i:s');
        $return = $lavraUpdate->save();
        if($return >= 1) {
            return [true,"A Lavra foi editada com sucesso!",$this->getCodeAgricultorLavra()];
        } else {
            return [false,"Erro ao editar a Lavra!<br>".$lavraUpdate->fail()->getMessage()];
        }
    }
    //Deletar a Lavra
    public function deleteLavra(): array
    {
        $lavraDelete = (new Lavra())->findById($this->getIdLavra());
        $return = $lavraDelete->destroy();
        if($return >= 1) {
            return [true,"A Lavra foi deletada com sucesso!"];
        } else {
            return [false,"Erro ao deletar a Lavra!"];
        }
    }
    //Listar totas as Lavras
    public function listAllLavras(): array
    {
        $lavra = new Lavra();
        $lavra->tableAgricultorLavra();
        return $lavra->find()->fetch(true);
    }
    //Contar todas as Lavras
    public function countAllLavras(): int
    {
        $lavra = new Lavra();
        $lavra->tableAgricultorLavra();
        return $lavra->find()->count();
    }
    //Consultar somente uma Lavra
    public function getLavra($code)
    {
        $lavra = new Lavra();
        $lavra->tableAgricultorLavra();
        $infoLavra = $lavra->find("codeAgricultor = :code", "code=".$code)->fetch();
        $infoCount = $lavra->find("codeAgricultor = :code", "code=".$code)->count();
        if ($infoCount == 0):
            $this->setIdLavra(0);
            $this->setCodeAgricultorLavra("");
            $this->setLocalizacaoLavra("");
            $this->setBairroLavra("");
            $this->setMunicipioLavra("");
            $this->setPontosReferenciaLavra("");
            $this->setAreaTotalLavra("");
            $this->setAreaCultivoLavra("");
            $this->setCulturasLavra("");
            $this->setProducaoAnualLavra("");
        else:
            $this->setIdLavra($infoLavra->id);
            $this->setCodeAgricultorLavra($infoLavra->codeAgricultor);
            $this->setLocalizacaoLavra($infoLavra->localizacao);
            $this->setBairroLavra($infoLavra->bairro);
            $this->setMunicipioLavra($infoLavra->municipio);
            $this->setPontosReferenciaLavra($infoLavra->pontosReferencia);
            $this->setAreaTotalLavra($infoLavra->areaTotal);
            $this->setAreaCultivoLavra($infoLavra->areaCultivo);
            $this->setCulturasLavra($infoLavra->culturas);
            $this->setProducaoAnualLavra($infoLavra->producaoAnual);
        endif;
    }
    //funcao para verificar se a Code ja exite na base de dados
    public function checkCodeLavra($code): array
    {
        $lavra = new Lavra();
        $lavra->tableAgricultorLavra();
        $infoLavra = $lavra->find("codeAgricultor = :code", "code=".$code)->fetch();
        $infoLavraCount = $lavra->find("codeAgricultor = :code", "code=".$code)->count();
        if ($infoLavraCount >= 1):
            return [true,$infoLavra->codeAgricultor,$infoLavra->id];
        else:
            return [false,0,0];
        endif;
    }
    //funcao para actualizar o codeAgricultor base de dados
    public function updateCodeLavra($code,$id): array
    {
            $lavra = (new Lavra())->findById($id);
            $lavra->codeAgricultor = $code;
            $return = $lavra->save();
            if ($return >= 1) {
                return [true];
            } else {
                return [false];
            }

    }

}