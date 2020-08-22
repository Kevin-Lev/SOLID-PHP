<?php

require __DIR__."/vendor/autoload.php";

use App\CarrinhoCompra;
use App\Item;
use App\Pedido;
use App\EmailService;

$carrinho1 = new CarrinhoCompra();

echo '<h3>Com SRP</h3>';

$pedido = new Pedido();
// -----------------------------
$item1 = new Item();
$item2 = new Item();

$item1->setDescricao('Porta copo');
$item1->setValor(4.55);

$item2->setDescricao('Lâmpada');
$item2->setValor(8.30);
// ------------------------------
echo '<h4>Pedido</h4>';
echo '<pre>';
print_r($pedido);
echo '</pre>';
// ------------------------------
$pedido->getCarrinhoCompra()->adicionarItem($item1);
$pedido->getCarrinhoCompra()->adicionarItem($item2);
// ------------------------------
echo '<h4>Itens do carrinho</h4>';
echo '<pre>';
print_r($pedido->getCarrinhoCompra()->getItens());
echo '</pre>';
// -------------------------------

echo '<h4>Pedido com Itens!</h4>';
echo '<pre>';
print_r($pedido);
echo '</pre>';
// -------------------------------

echo '<h4>Valor do pedido</h4>';
$total = 0;
foreach($pedido->getCarrinhoCompra()->getItens() as $key => $item) {
    $total += $item->getValor();
}
echo $total;

echo '<h4>Carrinho está válido?</h4>';
echo '<pre>';
print_r($pedido->getCarrinhoCompra()->validarCarrinho());
echo '</pre>';

echo '<h4>Status pedido</h4>';
echo '<pre>';
print_r($pedido->getStatus());
echo '</pre>';

echo '<h4>Confirmar Pedido</h4>';
echo '<pre>';
print_r($pedido->confirmar());
echo '</pre>';

echo '<h4>Status pedido confirmado</h4>';
echo '<pre>';
print_r($pedido->getStatus());
echo '</pre>';

echo '<h4>E-mail</h4>';
if ($pedido->getStatus() == 'confirmado') {
    echo EmailService::dispararEmail();
}

// print_r($carrinho1->exibirItens());
// echo 'Valor total: '.$carrinho1->exibirValorTotal();
// echo "<br />";

// $carrinho1->adicionarItem('Bicicleta', 750.10);
// $carrinho1->adicionarItem('Bicicleta', 750.10);
// $carrinho1->adicionarItem('Bicicleta', 750.10);

// echo "<br />";
// print_r($carrinho1->exibirItens());

// echo "<br />";
// echo 'Valor total recalculado: '.$carrinho1->exibirValorTotal();

// echo "<br />";
// echo "Status: ".$carrinho1->exibirStatus();

// if ($carrinho1->confirmarPedido()) {
//     echo 'Pedido realizado com sucesso!';
// }
// else {
//     echo 'Erro na confirmação do pedido. O Carrinho não possui itens!';
// }
// echo "<br />";
// echo "Status: ".$carrinho1->exibirStatus();