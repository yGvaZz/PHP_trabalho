<header>
    <h3>Excluir Tarefa</h3>
</header>

<?php 
    $idTarefa = $_GET['idTarefa'];

    $sql = "DELETE FROM tbtarefas WHERE idTarefa = '{$idTarefa}'";
    $rs = mysqli_query($conexao,$sql) or die ("Erro ao excluir." . mysqli_error($conexao));
    echo "Tarefa excluida com sucesso!";

?>