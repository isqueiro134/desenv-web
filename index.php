<?php
    include 'Database.php';
    include 'Pessoa.php';

    $acao = isset($_GET['acao']) ? $_GET['acao'] : null;
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $nome = isset($_GET['nome']) ? $_GET['nome'] : null;
    $idade = isset($_GET['idade']) ? $_GET['idade'] : null;

    $p = new Pessoa();

    if ($acao == "excluir") {
        $p->excluir($id);
    }

    // Lista de pessoas
    $pessoas = $p->listar();

    if ($nome) {
        $p->inserir($nome, $idade);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="#" method="get">
        Nome: <input type="text" name="nome" required>
        Idade: <input type="number" name="idade">
        <input type="submit" value="Salvar">
        <input type="reset" value="Limpar">
    </form>

    <table border="1" width="100%>
        <?php foreach($pessoas as $pessoa) { ?>
            <tr>
                <td><?php echo $pessoa['nome'] ?></td>
                <td><?php echo $pessoa['idade'] ?></td>
                <td>
                    <a href="index.php?id=<?php echo $pessoa['id'] ?>&acao=Excluir">Excluir</a>
                </td>
            </tr>
        <?php } ?>
    </table>

</body>
</html>