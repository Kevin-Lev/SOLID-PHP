<?php

namespace App;

use App\Item;

// Classe atualmente está ferindo o princípio da responsabilidade única (SRP) do SOLID. No momento ela está responsável por mais de uma responsabilidade (Métodos que envolvem o carrinho, os itens, o pedido e o envio de e-mails) ao invés de uma só (Métodos envolvidos apenas com o carrinho).

class CarrinhoCompra { 
    //atributos

    private $itens;

    //métodos
    public function __construct() {
        $this->itens = [];
    }

    public function getItens() {
        return $this->itens;
    }

    public function adicionarItem(Item $item) {
        array_push($this->itens, $item);
        return true;
    }

    public function validarCarrinho() {
        return count($this->itens) > 0;
    }
}