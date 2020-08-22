<?php

namespace App;

// Classe atualmente está ferindo o princípio da responsabilidade única (SRP) do SOLID. No momento ela está responsável por mais de uma responsabilidade (Métodos que envolvem o carrinho, os itens, o pedido e o envio de e-mails) ao invés de uma só (Métodos envolvidos apenas com o carrinho).

class CarrinhoCompra { 
    //atributos
    private $itens;
    private $status;
    private $valorTotal;

    //métodos
    public function __construct() {
        $this->itens = [];
        $this->status = "aberto";
        $this->valorTotal = 0;
    }

    public function exibirItens() {
        return $this->itens;
    }

    public function exibirValorTotal() {
        return $this->valorTotal;
    }

    public function itemValido(string $item, float $valor) {
        if ($item == '' || $valor <= 0) {
            return false;
        }

        return true;
    }

    public function adicionarItem(string $item, float $valor) {
        if ($this->itemValido($item, $valor)) {
            array_push($this->itens, ["item" => $item, "valor" => $valor]);
            $this->valorTotal += $valor;
            return true;
        }

        return false;
    }

    public function exibirStatus() {
        return $this->status;
    }

    public function confirmarPedido() {
        if ($this->validarCarrinho()) {
            $this->status = 'Confirmado';
            $this->enviarEmailConfirmacao();

            return true;
        }
    }

    public function enviarEmailConfirmacao() {
        echo '<br/>.... envia e-mail de confirmação ... <br/>';
    }

    public function validarCarrinho() {
        return count($this->itens) > 0;
    }
}