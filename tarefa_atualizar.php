<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include "referencias.php";

        $id = $_POST["txtId"];
        $descricao = $_POST["txtDescricao"];
        $data_entrega = $_POST["txtData"];
        $prioridade = $_POST["txtPrioridade"];
        $responsavel = $_POST["txtResponsavel"];
        


        $sql = "UPDATE tarefa SET 
                    descricao = ?, 
                    prioridade = ?, 
                    responsavel = ?,
                    data_entrega = ?
                WHERE id = ?";
                
        $comando = $conexao->prepare($sql);

        $comando->bind_param("ssssd", $descricao, $prioridade, $responsavel, $data_entrega, $id);

        if ($comando->execute()){
            echo "<h1>Tarefa atualizada<h1/>";
        } else{
            echo "<h1>ERRO: Tarefa não atualizada<h1/>";
        }
    
    ?>
</body>
</html>