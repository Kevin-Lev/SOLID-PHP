<?php

require __DIR__."/vendor/autoload.php";

use App\CarrinhoCompra;

$carrinho1 = new CarrinhoCompra();

echo '<h3>Sem SRP</h3>';

print_r($carrinho1->exibirItens());
echo 'Valor total: '.$carrinho1->exibirValorTotal();
echo "<br />";

$carrinho1->adicionarItem('Bicicleta', 750.10);
$carrinho1->adicionarItem('Bicicleta', 750.10);
$carrinho1->adicionarItem('Bicicleta', 750.10);

echo "<br />";
print_r($carrinho1->exibirItens());

echo "<br />";
echo 'Valor total recalculado: '.$carrinho1->exibirValorTotal();

echo "<br />";
echo "Status: ".$carrinho1->exibirStatus();

if ($carrinho1->confirmarPedido()) {
    echo 'Pedido realizado com sucesso!';
}
else {
    echo 'Erro na confirmação do pedido. O Carrinho não possui itens!';
}
echo "<br />";
echo "Status: ".$carrinho1->exibirStatus();