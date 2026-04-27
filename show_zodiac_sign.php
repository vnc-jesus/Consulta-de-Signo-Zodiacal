<?php include('layouts/header.php'); ?>

<?php

$data_nascimento = $_POST['data_nascimento'] ?? null;

if (!$data_nascimento) {
    header("Location: index.php");
    exit;
}

$signos = simplexml_load_file("signos.xml");

$data = new DateTime($data_nascimento);
$diaMesNascimento = $data->format('m-d');

$signoEncontrado = null;

foreach ($signos->signo as $signo) {
    $inicio = DateTime::createFromFormat('d/m', $signo->dataInicio);
    $fim = DateTime::createFromFormat('d/m', $signo->dataFim);

    $inicioFormatado = $inicio->format('m-d');
    $fimFormatado = $fim->format('m-d');

    if ($inicioFormatado <= $fimFormatado) {
        if ($diaMesNascimento >= $inicioFormatado && $diaMesNascimento <= $fimFormatado) {
            $signoEncontrado = $signo;
            break;
        }
    } else {
        if ($diaMesNascimento >= $inicioFormatado || $diaMesNascimento <= $fimFormatado) {
            $signoEncontrado = $signo;
            break;
        }
    }
}

?>

<div class="container">
    <div class="card resultado-card">

        <?php if ($signoEncontrado): ?>

            <h1><?php echo $signoEncontrado->signoNome; ?></h1>

            <p>
                <?php echo $signoEncontrado->descricao; ?>
            </p>

            <a href="index.php" class="btn btn-light mt-3">
                Consultar novamente
            </a>

        <?php else: ?>

            <h1>Signo não encontrado</h1>

            <a href="index.php" class="btn btn-light mt-3">
                Voltar
            </a>

        <?php endif; ?>

    </div>
</div>

</body>
</html>