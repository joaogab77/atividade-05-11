<!DOCTYPE html>
<html>
<head>
    <title>Gerenciamento de Associados</title>
    <meta charset="UTF-8">
</head>
<body>
    <h1>Gerenciamento de Associados</h1>

    <form action="" method="post">
        <label for="numero">Plano:</label>
        <input type="text" name="numero" id="numero" maxlength="2" required><br>

        <label for="nome">Nome do Associado:</label>
        <input type="text" name="nome" id="nome" maxlength="40" required><br>

        <label for="endereco">Endereço:</label>
        <input type="text" name="endereco" id="endereco" maxlength="35" required><br>

        <label for="cidade">Cidade:</label>
        <input type="text" name="cidade" id="cidade" maxlength="20"><br>

        <label for="estado">Estado:</label>
        <input type="text" name="estado" id="estado" maxlength="2"><br>

        <label for="cep">CEP:</label>
        <input type="text" name="cep" id="cep" maxlength="9"><br><br>

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
        $nome = $conexao->real_escape_string($_POST['nome']);
        $endereco = $conexao->real_escape_string($_POST['endereco']);
        $cidade = $conexao->real_escape_string($_POST['cidade']);
        $estado = $conexao->real_escape_string($_POST['estado']);
        $cep = $conexao->real_escape_string($_POST['cep']);
        $acao = $_POST['acao'];

        if ($acao == "Inserir") {
            // Inserção de dados
            $sql = "INSERT INTO tbl_associado (plano, nome, endereco, cidade, estado, cep) VALUES ('$numero', '$nome', '$endereco', '$cidade', '$estado', '$cep')";
            if ($conexao->query($sql) === TRUE) {
                echo "Associado inserido com sucesso!";
            } else {
                echo "Erro ao inserir associado: " . $conexao->error;
            }
        } elseif ($acao == "Alterar") {
            // Atualização de dados
            $sql = "UPDATE tbl_associado SET endereco='$endereco', cidade='$cidade', estado='$estado', cep='$cep' WHERE nome='$nome'";
            if ($conexao->query($sql) === TRUE) {
                echo "Associado alterado com sucesso!";
            } else {
                echo "Erro ao alterar associado: " . $conexao->error;
            }
        } elseif ($acao == "Excluir") {
            // Exclusão de dados
            $sql = "DELETE FROM tbl_associado WHERE nome='$nome'";
            if ($conexao->query($sql) === TRUE) {
                echo "Associado excluído com sucesso!";
            } else {
                echo "Erro ao excluir associado: " . $conexao->error;
            }
        } elseif ($acao == "Consultar") {
            // Consulta de dados
            $sql = "SELECT 
                        a.nome,
                        a.endereco,
                        a.cidade,
                        a.estado,
                        a.cep,
                        p.numero AS plano_numero,
                        p.descricao AS plano_descricao,
                        p.valor AS plano_valor
                    FROM 
                        tbl_associado a
                    JOIN 
                        tbl_plano p ON a.plano = p.numero
                    WHERE 
                        a.nome='$nome'";
                        
            $resultado = $conexao->query($sql);

            if ($resultado->num_rows > 0) {
                while ($linha = $resultado->fetch_assoc()) {
                    echo "Nome: " . $linha['nome'] . " - Endereço: " . $linha['endereco'] . " - Cidade: " . $linha['cidade'] . " - Estado: " . $linha['estado'] . " - CEP: " . $linha['cep'] . " - Número do Plano: " . $linha['plano_numero'] . " - Descrição do Plano: " . $linha['plano_descricao'] . " - Valor do Plano: " . $linha['plano_valor'] . "<br>";
                }
            } else {
                echo "Nenhum associado encontrado.";
            }
        }
    }

    // Fechando a conexão
    $conexao->close();
    ?>
</body>
</html>
