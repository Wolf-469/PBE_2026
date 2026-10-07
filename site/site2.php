<?php
$filmes = [
    'coracao_selvagem' => 'Coração Selvagem',
    'homem_aranha' => 'Homem-Aranha',
    'vingadores' => 'Vingadores: Ultimato'
];

$nomeFilme = $filmes[$compra['filme']] ?? 'Filme selecionado';
?>

<div>
    <span>Filme</span>
    <strong><?=htmlspecialchars($nomeFilme)?></strong>
</div>