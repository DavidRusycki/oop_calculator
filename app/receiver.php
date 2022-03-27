<?php
namespace App;

use \Enum\EnumCalculator;

/**
 * Classe que recebe as requisições da calculadora.
 * @author David Rusycki
 * @since 25/03/2022
 */
class Receiver 
{
    
    public function executeAction() : void
    {
        $oReceiver = Receiver::getInstance();
        $oReceiver->initSession();
        $oReceiver->processRequest();
        $oReceiver->montaTela();
    }
 
    /**
     * Retorna o valor para o visor.
     * @return type
     */
    public static function getVisor()
    {
        $oReceiver = Receiver::getInstance();
        return $_SESSION[EnumCalculator::VISOR];
    }
    
    /**
     * Retorna uma instância da classe.
     * @return \self
     */
    public static function getInstance() : self
    {
        return new self();
    }
    
    /**
     * Inicia a sessão caso não tenha sido iniciada.
     */
    public function initSession() : void
    {
        session_start();
        if (!isset($_SESSION[EnumCalculator::LAST]) && !isset($_SESSION[EnumCalculator::VISOR]) && !isset($_SESSION[EnumCalculator::OPERATION]))
        {
            $_SESSION[EnumCalculator::LAST] = EnumCalculator::NUMERO;
            $_SESSION[EnumCalculator::VISOR] = '';
            $_SESSION[EnumCalculator::OPERATION] = '';
            $_SESSION[EnumCalculator::QUANTIDADE_OPERADORES] = 0;
        }
    }
    
    /**
     * Processa a requisição
     * @return bool
     */
    public function processRequest() : bool
    {
        if (!empty($_GET))
        {
            if (isset($_GET[EnumCalculator::NUMERO])) 
            {
                $_SESSION[EnumCalculator::LAST] = EnumCalculator::NUMERO;
                $_SESSION[EnumCalculator::OPERATION] .= $this->getNumero();
                $_SESSION[EnumCalculator::VISOR] .= $this->getNumero();
            } 
            else if (isset($_GET[EnumCalculator::OPERADOR])) 
            {
                if ($_SESSION[EnumCalculator::LAST] != EnumCalculator::OPERADOR) 
                {
                    $_SESSION[EnumCalculator::QUANTIDADE_OPERADORES]++;
                    if ($_SESSION[EnumCalculator::QUANTIDADE_OPERADORES] >= 2) 
                    {
                        $this->calcula();
                    } 
                    else 
                    {
                        $_SESSION[EnumCalculator::LAST] = EnumCalculator::OPERADOR;
                        $this->setOperador();
                        $this->clearVisor();
                    }
                }
            }
            else if (isset($_GET[EnumCalculator::IGUAL])) 
            {
                $this->calcula();
            }
            else if (isset($_GET[EnumCalculator::CLEAR])) 
            {
                $_SESSION[EnumCalculator::OPERATION] = '';
                $this->clearVisor();
            }
        }
        
        return true;
    }
    
    /**
     * Seta o operador na operation
     */
    private function setOperador() 
    {
        $_SESSION[EnumCalculator::OPERATION] .= $this->getOperadorTratado();
    }
    
    /**
     * Retorna o operador tratado.
     * @return string
     */
    private function getOperadorTratado()    
    {
        $sOperator = '';
        switch ($this->getOperador()) {
            case EnumCalculator::MAIS:
                $sOperator = '+';
                break;
            case EnumCalculator::MENOS:
                $sOperator = '-';
                break;
            case EnumCalculator::DIVISAO:
                $sOperator = '/';
                break;
            case EnumCalculator::MULTIPLICACAO:
                $sOperator = '*';
                break;
        }
        return $sOperator;
    }
    
    /**
     * Retorna o operador do GET
     * @return type
     */
    private function getOperador() 
    {
        return htmlspecialchars($_GET[EnumCalculator::OPERADOR], ENT_COMPAT);
    }
    
    /**
     * Retorna o número da URL
     * @return int
     */
    private function getNumero() : int
    {
        return filter_var($_GET[EnumCalculator::NUMERO], FILTER_SANITIZE_NUMBER_INT);
    }
    
    /**
     * Efetua o calculo da operação.
     */
    private function calcula() 
    {
        $_SESSION[EnumCalculator::QUANTIDADE_OPERADORES] = 0;
        $xResult = null;
        $sOperation = $_SESSION[EnumCalculator::OPERATION];
        eval('$xResult = '.$sOperation.';');
        $this->setValorVisor($xResult);
        $this->setValorOperation($xResult);
    }
    
    /**
     * Seta o valor no visor.
     * @param type $xValue
     */
    private function setValorVisor($xValue) 
    {
        $_SESSION[EnumCalculator::VISOR] = $xValue;
    }
    
    /**
     * Limpa o visor
     */
    private function clearVisor() : void
    {
        $_SESSION[EnumCalculator::VISOR] = '';
    }
    
    /**
     * Seta o valor da operação.
     * @param mixed $xValue
     */
    private function setValorOperation($xValue)
    {
        $_SESSION[EnumCalculator::OPERATION] = $xValue;
    }
    
    /**
     * Monta a tela
     */
    public function montaTela() 
    {
        require_once(__DIR__.'/view.php');
    }
    
}
