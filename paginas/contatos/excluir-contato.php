 <header>
    <h3>Excluir Contato</h3>
 </header>

 <?php 
    $idContato = mysqli_real_escape_string($conexao,$_GET["idContato"]);
    $sql = "DELETE  from tbcontatoss WHERE idContato = '{$idContato}'";

    mysqli_query($conexao, $sql) or die("Ero ao excluir o contato"  . mysqli_error($conexao));
    echo "Contato excluido com sucesso";
 ?>     