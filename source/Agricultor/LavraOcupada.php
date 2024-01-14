<?php
/* Created by kiaka
   Project name watu
   Data: 23/09/2023
   Time: 08:50
*/

namespace Source\Agricultor;

use CoffeeCode\DataLayer\Connect;
use CoffeeCode\DataLayer\DataLayer;

class LavraOcupada extends DataLayer
{
    //Atributos
    private int $idLavraOcupada;
    private string $codeAgricultorLavraOcupada;
    private string $localizacaoLavraOcupada;
    private string $areaTotalLavraOcupada;
    private string $areaCultivoLavraOcupada;
    private string $culturasLavraOcupada;
    private string $producaoAnualLavraOcupada;
    private string $tipoLavraOcupada;
    private string $dataUtilizacaoInicioOcupada;
    private string $dataUtilizacaoFimOcupada;
    private string $observacoesLavraOcupada;
    //Construtor
    public function __construct()
    {
        parent::__construct("agricultorLavraOcupada", [
            "codeAgricultor",
            "localizacao",
            "areaTotal",
            "areaCultivo",
            "culturas",
            "producaoAnual",
            "tipoLavra",
            "dataUtilizacaoInicio",
            "dataUtilizacaoFim",
            "observacoes","createdatelavraocupada","updatedatelavraocupada"
        ],"id",false);
    }

    //Métodos
    //Create table agricultorLavraOcupada
    public function tableAgricultorLavraOcupada() {
        $conn = Connect::getInstance();
        $sql = "CREATE TABLE IF NOT EXISTS agricultorLavraOcupada (
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            codeAgricultor VARCHAR(25) NOT NULL,
            localizacao VARCHAR(50) NOT NULL,
            areaTotal VARCHAR(50) NOT NULL,
            areaCultivo VARCHAR(50) NOT NULL,
            culturas VARCHAR(50) NOT NULL,
            producaoAnual VARCHAR(50) NOT NULL,
            tipoLavra VARCHAR(50) NOT NULL,
            dataUtilizacaoInicio VARCHAR(50) NOT NULL,
            dataUtilizacaoFim VARCHAR(50) NOT NULL,
            observacoes VARCHAR(250) NOT NULL,
            createdatelavraocupada VARCHAR(26),
            updatedatelavraocupada VARCHAR(26)
        )";
        $conn->exec($sql);
        $conn = null;
    }

    //Getters e Setters

    /**
     * @return int
     */
    public function getIdLavraOcupada(): int
    {
        return $this->idLavraOcupada;
    }

    /**
     * @param int $idLavraOcupada
     */
    public function setIdLavraOcupada(int $idLavraOcupada): void
    {
        $this->idLavraOcupada = $idLavraOcupada;
    }

    /**
     * @return string
     */
    public function getCodeAgricultorLavraOcupada(): string
    {
        return $this->codeAgricultorLavraOcupada;
    }

    /**
     * @param string $codeAgricultorLavraOcupada
     */
    public function setCodeAgricultorLavraOcupada(string $codeAgricultorLavraOcupada): void
    {
        $this->codeAgricultorLavraOcupada = $codeAgricultorLavraOcupada;
    }

    /**
     * @return string
     */
    public function getLocalizacaoLavraOcupada(): string
    {
        return $this->localizacaoLavraOcupada;
    }

    /**
     * @param string $localizacaoLavraOcupada
     */
    public function setLocalizacaoLavraOcupada(string $localizacaoLavraOcupada): void
    {
        $this->localizacaoLavraOcupada = $localizacaoLavraOcupada;
    }

    /**
     * @return string
     */
    public function getAreaTotalLavraOcupada(): string
    {
        return $this->areaTotalLavraOcupada;
    }

    /**
     * @param string $areaTotalLavraOcupada
     */
    public function setAreaTotalLavraOcupada(string $areaTotalLavraOcupada): void
    {
        $this->areaTotalLavraOcupada = $areaTotalLavraOcupada;
    }

    /**
     * @return string
     */
    public function getAreaCultivoLavraOcupada(): string
    {
        return $this->areaCultivoLavraOcupada;
    }

    /**
     * @param string $areaCultivoLavraOcupada
     */
    public function setAreaCultivoLavraOcupada(string $areaCultivoLavraOcupada): void
    {
        $this->areaCultivoLavraOcupada = $areaCultivoLavraOcupada;
    }

    /**
     * @return string
     */
    public function getCulturasLavraOcupada(): string
    {
        return $this->culturasLavraOcupada;
    }

    /**
     * @param string $culturasLavraOcupada
     */
    public function setCulturasLavraOcupada(string $culturasLavraOcupada): void
    {
        $this->culturasLavraOcupada = $culturasLavraOcupada;
    }

    /**
     * @return string
     */
    public function getProducaoAnualLavraOcupada(): string
    {
        return $this->producaoAnualLavraOcupada;
    }

    /**
     * @param string $producaoAnualLavraOcupada
     */
    public function setProducaoAnualLavraOcupada(string $producaoAnualLavraOcupada): void
    {
        $this->producaoAnualLavraOcupada = $producaoAnualLavraOcupada;
    }

    /**
     * @return string
     */
    public function getTipoLavraOcupada(): string
    {
        return $this->tipoLavraOcupada;
    }

    /**
     * @param string $tipoLavraOcupada
     */
    public function setTipoLavraOcupada(string $tipoLavraOcupada): void
    {
        $this->tipoLavraOcupada = $tipoLavraOcupada;
    }

    /**
     * @return string
     */
    public function getDataUtilizacaoInicioOcupada(): string
    {
        return $this->dataUtilizacaoInicioOcupada;
    }

    /**
     * @param string $dataUtilizacaoInicioOcupada
     */
    public function setDataUtilizacaoInicioOcupada(string $dataUtilizacaoInicioOcupada): void
    {
        $this->dataUtilizacaoInicioOcupada = $dataUtilizacaoInicioOcupada;
    }

    /**
     * @return string
     */
    public function getDataUtilizacaoFimOcupada(): string
    {
        return $this->dataUtilizacaoFimOcupada;
    }

    /**
     * @param string $dataUtilizacaoFimOcupada
     */
    public function setDataUtilizacaoFimOcupada(string $dataUtilizacaoFimOcupada): void
    {
        $this->dataUtilizacaoFimOcupada = $dataUtilizacaoFimOcupada;
    }

    /**
     * @return string
     */
    public function getObservacoesLavraOcupada(): string
    {
        return $this->observacoesLavraOcupada;
    }

    /**
     * @param string $observacoesLavraOcupada
     */
    public function setObservacoesLavraOcupada(string $observacoesLavraOcupada): void
    {
        $this->observacoesLavraOcupada = $observacoesLavraOcupada;
    }
    //Metodo para cadastrar lavra ocupada
    public function cadastrarLavraOcupada(): array
    {
        //Udando o Datalayer para cadastrar lavra ocupada
        $agricultorLavraOcupada = new LavraOcupada();
        $agricultorLavraOcupada->tableAgricultorLavraOcupada();
        $agricultorLavraOcupada->codeAgricultor         = $this->getCodeAgricultorLavraOcupada();
        $agricultorLavraOcupada->localizacao            = $this->getLocalizacaoLavraOcupada();
        $agricultorLavraOcupada->areaTotal              = $this->getAreaTotalLavraOcupada();
        $agricultorLavraOcupada->areaCultivo            = $this->getAreaCultivoLavraOcupada();
        $agricultorLavraOcupada->culturas               = $this->getCulturasLavraOcupada();
        $agricultorLavraOcupada->producaoAnual          = $this->getProducaoAnualLavraOcupada();
        $agricultorLavraOcupada->tipoLavra              = $this->getTipoLavraOcupada();
        $agricultorLavraOcupada->dataUtilizacaoInicio   = $this->getDataUtilizacaoInicioOcupada();
        $agricultorLavraOcupada->dataUtilizacaoFim      = $this->getDataUtilizacaoFimOcupada();
        $agricultorLavraOcupada->observacoes            = $this->getObservacoesLavraOcupada();
        $agricultorLavraOcupada->createdatelavraocupada = date("Y-m-d H:i:s");
        $agricultorLavraOcupada->updatedatelavraocupada = date("Y-m-d H:i:s");
        $return = $agricultorLavraOcupada->save();
        if ($return >= 1) {
            return [true, "Lavra Ocupada cadastrada com sucesso!",$this->getCodeAgricultorLavraOcupada()];
        } else {
            return  [false, "Erro ao cadastrar lavra ocupada!<br>".$agricultorLavraOcupada->fail()->getMessage()];
        }
    }
    //Metodo para atualizar lavra ocupada
    public function atualizarLavraOcupada(): array
    {
        //usando o DataLayer
        $agricultorLavraOcupada = (new LavraOcupada())->findById($this->getIdLavraOcupada());
        $agricultorLavraOcupada->codeAgricultor         = $this->getCodeAgricultorLavraOcupada();
        $agricultorLavraOcupada->localizacao            = $this->getLocalizacaoLavraOcupada();
        $agricultorLavraOcupada->areaTotal              = $this->getAreaTotalLavraOcupada();
        $agricultorLavraOcupada->areaCultivo            = $this->getAreaCultivoLavraOcupada();
        $agricultorLavraOcupada->culturas               = $this->getCulturasLavraOcupada();
        $agricultorLavraOcupada->producaoAnual          = $this->getProducaoAnualLavraOcupada();
        $agricultorLavraOcupada->tipoLavra              = $this->getTipoLavraOcupada();
        $agricultorLavraOcupada->dataUtilizacaoInicio   = $this->getDataUtilizacaoInicioOcupada();
        $agricultorLavraOcupada->dataUtilizacaoFim      = $this->getDataUtilizacaoFimOcupada();
        $agricultorLavraOcupada->observacoes            = $this->getObservacoesLavraOcupada();
        $agricultorLavraOcupada->updatedatelavraocupada = date("Y-m-d H:i:s");
        $return = $agricultorLavraOcupada->save();
        if ($return >= 1) {
            return [true, "Lavra Ocupada atualizada com sucesso!", $this->getCodeAgricultorLavraOcupada()];
        } else {
            return  [false, "Erro ao atualizar lavra ocupada!<br>".$agricultorLavraOcupada->fail()->getMessage()];
        }
    }
    //Metodo para excluir lavra ocupada
    public function excluirLavraOcupada(): array
    {
        //usando o DataLayer//"codeAgricultor","localizacao", "bairro", "municipio", "pontosReferencia", "areaTotal", "areaCultivo", "culturas", "producaoAnual","createdatelavraocupada","updatedatelavraocupada"
        $agricultorLavraOcupada = (new LavraOcupada())->findById($this->getIdLavraOcupada());
        $return = $agricultorLavraOcupada->destroy();
        if ($return >= 1) {
            return [true, "Lavra Ocupada excluída com sucesso!"];
        } else {
            return  [false, "Erro ao excluir lavra ocupada!"];
        }
    }
    //Metodo para listar lavra ocupada
    public function listarLavraOcupada(): array
    {
        $agricultorLavraOcupada = (new LavraOcupada())->find()->fetch(true);
        if ($agricultorLavraOcupada) {
            return [true, $agricultorLavraOcupada];
        } else {
            return [false, "Não existem lavras ocupadas cadastradas!"];
        }
    }
    //Metodo para Consultar somente uma lavra ocupada
    public function consultarLavraOcupada($code)
    {
        $agricultorLavraOcupada = new LavraOcupada();
        $agricultorLavraOcupada->tableAgricultorLavraOcupada();
        $agriLavra = $agricultorLavraOcupada->find("codeAgricultor = :code", "code={$code}")->fetch();
        $agriLavraCount = $agricultorLavraOcupada->find("codeAgricultor = :code", "code={$code}")->count();
        if ($agriLavraCount >= 1) {
            $this->setIdLavraOcupada($agriLavra->id);
            $this->setCodeAgricultorLavraOcupada($agriLavra->codeAgricultor);
            $this->setLocalizacaoLavraOcupada($agriLavra->localizacao);
            $this->setAreaTotalLavraOcupada($agriLavra->areaTotal);
            $this->setAreaCultivoLavraOcupada($agriLavra->areaCultivo);
            $this->setCulturasLavraOcupada($agriLavra->culturas);
            $this->setProducaoAnualLavraOcupada($agriLavra->producaoAnual);
            $this->setTipoLavraOcupada($agriLavra->tipoLavra);
            $this->setDataUtilizacaoInicioOcupada($agriLavra->dataUtilizacaoInicio);
            $this->setDataUtilizacaoFimOcupada($agriLavra->dataUtilizacaoFim);
            $this->setObservacoesLavraOcupada($agriLavra->observacoes);
        } else {
            $this->setIdLavraOcupada(0);
            $this->setCodeAgricultorLavraOcupada("");
            $this->setLocalizacaoLavraOcupada("");
            $this->setAreaTotalLavraOcupada("");
            $this->setAreaCultivoLavraOcupada("");
            $this->setCulturasLavraOcupada("");
            $this->setProducaoAnualLavraOcupada("");
            $this->setTipoLavraOcupada("");
            $this->setDataUtilizacaoInicioOcupada("");
            $this->setDataUtilizacaoFimOcupada("");
            $this->setObservacoesLavraOcupada("");
        }
    }
    //funcao para verificar se a Code ja exite na base de dados
    public function verificarCodeLavraOcupada($code): array
    {
        $agricultorLavraOcupada = new LavraOcupada();
        $agricultorLavraOcupada->tableAgricultorLavraOcupada();
        $agriLavra = $agricultorLavraOcupada->find("codeAgricultor = :code", "code={$code}")->fetch();
        $agriLavraCount = $agricultorLavraOcupada->find("codeAgricultor = :code", "code={$code}")->count();
        if ($agriLavraCount >= 1) {
            return [true, $agriLavra->codeAgricultor, $agriLavra->id];
        } else {
            return [false,0,0];
        }
    }
    //funcao para actualizar o codeAgricultor base de dados
    public function updateCodeLavraOcupada($code,$id): array
    {
        $agricultorLavraOcupada = (new LavraOcupada())->findById($id);
        $agricultorLavraOcupada->codeAgricultor = $code;
        $return = $agricultorLavraOcupada->save();
        if ($return >= 1) {
            return [true];
        } else {
            return [false];
        }
    }
}