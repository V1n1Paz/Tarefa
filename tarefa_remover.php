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

        //1o passo: capturar o ID que será removido
        $id = $_POST["txtId"];

        //2o passo: construir o comando sql que será executado
        $sql =  "DELETE FROM tarefa WHERE ID = ?";

        //3o passo: Vincular onde o código SQL será executado
        $comando = $conexao->prepare($sql);

        $comando->bind_param("d", $id);

        if ($comando->execute()){
            echo "<h1>Tarefa deletada<h1>";
        } else{
            echo "<h1>ERRO: Tarefa não deletada<h1>";
        }
        
    ?>
</body>
</html>