<header>
    <h3>Excluir Evento</h3>
</header>

<?php 
    $idEvento = $_GET['idEvento'];

    $sql = "DELETE FROM tbeventos WHERE idEvento = '{$idEvento}'";
    $rs = mysqli_query($conexao,$sql) or die ("Erro ao excluir." . mysqli_error($conexao));
    echo "Evento excluida com sucesso!";

?>