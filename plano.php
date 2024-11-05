<!DOCTYPE html>
<html>
<head>
    <title>Gerenciamento de Planos</title>
    <meta charset="UTF-8">
</head>
<body>
    <h1>Gerenciamento de Planos</h1>

    <form action="" method="post">
        <label for="numero">Número do Plano:</label>
        <input type="text" name="numero" id="numero" maxlength="2" required><br>

        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" id="descricao" maxlength="30" required><br>

        <label for="valor">Valor:</label>
        <input type="number" step="0.01" name="valor" id="valor" required><br><br>

        <input type="submit" name="acao" value="Inserir">
        <input type="submit" name="acao" value="Alterar">
        <input type="submit" name="acao" value="Excluir">
        <input type="submit" name="acao" value="Consultar">
    </form>

    <?php
    include("conecta.php");

    // Verificando se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero = $conexao->real_escape_string($_POST['numero']);
        $descricao = $conexao->real_escape_string($_POST['descricao']);
        $valor = $conexao->real_escape_string($_POST['valor']);
        $acao = $_POST['acao'];

        if ($acao == "Inserir") {
            // Inserção de dados
            $sql = "INSERT INTO tbl_plano (numero, descricao, valor) VALUES ('$numero', '$descricao', '$valor')";
            if ($conexao->query($sql) === TRUE) {
                echo "Plano inserido com sucesso!";
            } else {
                echo "Erro ao inserir plano: " . $conexao->error;
            }
        } elseif ($acao == "Alterar") {
            // Atualização de dados
            $sql = "UPDATE tbl_plano SET descricao='$descricao', valor='$valor' WHERE numero='$numero'";
            if ($conexao->query($sql) === TRUE) {
                echo "Plano alterado com sucesso!";
            } else {
                echo "Erro ao alterar plano: " . $conexao->error;
            }
        } elseif ($acao == "Excluir") {
            // Exclusão de dados
            $sql = "DELETE FROM tbl_plano WHERE numero='$numero'";
            if ($conexao->query($sql) === TRUE) {
                echo "Plano excluído com sucesso!";
            } else {
                echo "Erro ao excluir plano: " . $conexao->error;
            }
        } elseif ($acao == "Consultar") {
            // Consulta de dados
            $sql = "SELECT * FROM tbl_plano WHERE numero='$numero'";
            $resultado = $conexao->query($sql);

            if ($resultado->num_rows > 0) {
                while ($linha = $resultado->fetch_assoc()) {
                    echo "Número: " . $linha['numero'] . " - Descrição: " . $linha['descricao'] . " - Valor: " . $linha['valor'] . "<br>";
                }
            } else {
                echo "Nenhum plano encontrado.";
            }
        }
    }

    // Fechando a conexão
    $conexao->close();
    ?>
</body>
</html>
