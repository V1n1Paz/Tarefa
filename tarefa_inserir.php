<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        include "referencias.php"
        
    ?>
</head>
<body>
    <?php
        //Insert Op
        //1o: Capturar cada registro que deve ser inserido na tabela
        //INSERT INTO () VALUES ()

        $descricao = $_POST["txtDescricao"];
        $data_entrega = $_POST["txtData"];
        $prioridade = $_POST["txtPrioridade"];
        $responsavel = $_POST["txtResponsavel"];
        
        //2o: Preparar o comadno sql que será executado
        //Criamos uma variavel e passamos os parametrros como (?)
        //Cada parametro ficará com Interogação(?)

        $sql = "INSERT INTO tarefa(descricao, data_entrega, prioridade, responsavel) VALUES (?, ?, ?, ?)";
        
        //3o: Vincular onde o comando SQL será executado
        
        $comando = $conexao->prepare($sql);

        //4o: Associar cada (?) com seus valores respectivos

        $comando->bind_param("ssss", $descricao, $data_entrega, $prioridade, $responsavel);

        //5o: Executar o comando

        if ($comando->execute()){
            echo "<h1>Tarefa agendada<h1>";
        }else{
            echo "<h1>ERRO<h1>";
        };



    ?>
</body>
</html>