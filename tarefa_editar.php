<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefa :: Editar</title>
    <?php
    include "referencias.php";
    ?>
</head>

<body>
    <?php
        //CÓDIGO PARA REALIZAR BUSCA NO BD
        //1o PASSO: CAPTURAR OS DADOS DE ENTRADA

        // VARIÁVEIS PARA RECEBER OS DADOS RETORNADOS PELO BD 
        $id =$_POST["txtId"];
        $descricao = ""; 
        $data_entrega = "";
        $prioridade = "";
        $responsavel = "";
        
         //2º PREPARAR A INSTRUÇÃO SQL - SELECT
         $sql = "SELECT * FROM tarefa WHERE id = ?";

        //PREPARAR ONDE SERÁ EXECUTADO O COMANDO SQL 
         $comando = $conexao->prepare($sql);

         //4o RELACIONAR OS PARAMETROS DO COMANDO SQL
         $comando-> bind_param("i", $id);

         $comando->execute();

         $resultado = $comando->get_result();


         if ($resultado->num_rows == 0){
            echo "<h1>Tarefa indexistente<h1>";
         } else{
            $registro = $resultado->fetch_assoc();
            $descricao = $registro["descricao"];
            $data_entrega = $registro["data_entrega"];
            $prioridade = $registro["prioridade"];
            $responsavel = $registro["responsavel"];
        }
    ?>
    <form method="post">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2>Tarefa :: Editar</h2>
                <div class="form-group">
                    <label>Id</label>
                    <input  value = "<?php echo $id?>" type="text" class="form-control" required="" placeholder="Id da tarefa" name="txtId">
                </div>

                <div class="form-group">
                    <label>Descrição</label>
                    <input value = "<?php echo $descricao?>" type="text" class="form-control" required="" placeholder="Descricao da tarefa" name="txtDescricao">
                </div>

                <div class="form-group">
                    <label>Data</label>
                    <input value = "<?php echo $data_entrega?>" type="date" class="form-control" required="" name="txtData">
                </div>

                <div class="form-group">
                    <label>Prioridade</label>
                    <select name="txtPrioridade" class="form-control">
                        <option value="Alta">Alta</option>
                        <option value="Média">Média</option>
                        <option value="Baixa">Baixa</option>
                    </select>
                </div>


                <div class="form-group">
                    <label>Responsável</label>
                    <input value = "<?php echo $responsavel?>" type="text" class="form-control" placeholder="Responsável pela tarefa" name="txtResponsavel">
                </div>


                <br>
                <div class="form-group">

                    <button type="submit" class="btn btn-primary" name="btEditar">
                        Editar
                    </button>

                    <button type="submit" class="btn btn-warning" name="btExcluir">
                        Excluir
                    </button>


                    <a href="index.php">
                        <button type="button" class="btn btn-danger" name="btVoltar">
                            Voltar
                        </button>
                    </a>

                </div>

            </div>
        </div>
    </div>
    </form>

</body>

</html>