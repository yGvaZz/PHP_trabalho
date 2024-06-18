<?php 
$txt_pesquisa = (isset($_POST["txt_pesquisa"]))?$_POST["txt_pesquisa"]:"";

// Altera status

$idTarefa = (isset($_GET['idTarefa']))?$_GET['idTarefa']:"";
$statusTarefa = (isset($_GET['statusTarefa']) && $_GET['statusTarefa']=='0')?'1':'0';

$sql = "UPDATE tbtarefas SET statusTarefa = {$statusTarefa} WHERE idTarefa = {$idTarefa}";
$rs = mysqli_query($conexao,$sql);   
?>

<header>
    <h3><i class="bi bi-list-task"></i> Tarefas</h3>
</header>
<div>
    <a class="btn btn-outline-secondary mb-2" href="index.php?menuop=cad-tarefa"><i class="bi bi-list-task"></i> Nova Tarefa</a>
</div>
<div class="mb-2">
    <form action="index.php?menuop=tarefas" method="post">
    <div class="input-group">
    <input class="form-control" type="text" name="txt_pesquisa" value="<?=$txt_pesquisa?>">
    <button type="submit" class="btn btn-outline-success btn-sm"><i class="bi bi-search"> Pesquisar</i></button>
    </div>
    
    </form> 
</div>
<div class="tabela">
<table class="table table-dark table-hover table-sn ">
    <thead>
       <tr>
        
        <th>Status</th>
        <th>Titulo</th>
        <th>Descrição</th>
        <th>Data da Conclusão</th>
        <th>Hora da Conclusão</th>
        <th>Editar</th>
        <th>Excluir</th>
       </tr> 
    </thead>
    <tbody>
        <?php

        $quantidade = 10;

        $pagina = (isset($_GET['pagina']))?(int)$_GET['pagina']:1;

        $inicio = ($quantidade * $pagina) - $quantidade;

        

        $sql = "SELECT idTarefa, statusTarefa, tituloTarefa, descricaoTarefa, DATE_FORMAT(dataConclusaoTarefa, '%d/%m/%Y') AS dataConclusaoTarefa, horaConclusaoTarefa
        FROM tbtarefas WHERE tituloTarefa LIKE '%{$txt_pesquisa}%' OR descricaoTarefa LIKE '%{$txt_pesquisa}%' OR DATE_FORMAT(dataConclusaoTarefa, '%d/%m/%Y') LIKE '%{$txt_pesquisa}%' OR horaConclusaoTarefa LIKE '%{$txt_pesquisa}%' ORDER BY statusTarefa, dataConclusaoTarefa  LIMIT $inicio, $quantidade";    

        $rs = mysqli_query($conexao,$sql) or die("Erro ao executar a consulta" . mysqli_error($conexao));
        while($dados = mysqli_fetch_assoc($rs)){

        
        ?>
        <tr>
            <td>
                <a class="btn btn-secondary btn-sm" href="index.php?menuop=tarefas&pagina=<?=$pagina?>&idTarefa=<?=$dados['idTarefa']?>&statusTarefa=<?=$dados['statusTarefa']?>">
                    <?php 
                        if($dados['statusTarefa']==0){
                            echo '<i class="bi bi-square"></i>';
                        }else{
                            echo '<i class="bi bi-check-square"></i>';
                        }
                    ?> 
                </a>
            </td>
            <td class="text-nowrap"><?=$dados["tituloTarefa"] ?></td>
            <td><?=$dados["descricaoTarefa"] ?></td>
            <td><?=$dados["dataConclusaoTarefa"]?></td>
            <td><?=$dados["horaConclusaoTarefa"] ?></td>
            <td class="text-center"><a class="btn btn-outline-warning btn-sm" href="index.php?menuop=editar-tarefa&idTarefa=<?=$dados["idTarefa"] ?>"><i class="bi bi-pencil-square"></i></a></td>
            <td class="text-center"><a class="btn btn-outline-danger btn-sm" href="index.php?menuop=excluir-tarefa&idTarefa=<?=$dados["idTarefa"] ?>"><i class="bi bi-trash"></i></a></td>
        </tr>
    <?php 
        }
    ?>
    </tbody>
</table>
</div>


<ul class="pagination justify-content-center">

<?php 

        $sqlTotal = "SELECT idTarefa FROM tbtarefas";
        $qrTotal = mysqli_query($conexao,$sqlTotal) or die (mysqli_error($conexao));
        $numTotal = mysqli_num_rows($qrTotal);
        $totalPagina = ceil($numTotal/$quantidade);
        echo " <li class= 'page-item'><span class='page-link'> Total de Registros: " . $numTotal . "</span></li>";
        echo ' <li class= "page-item"><a class="page-link" href= "?menuop=tarefas&pagina=1"> Primeira Pagina </a> </li>';

        if($pagina>6){
            ?>
               <li class="page-item"> <a class="page-link" href="?menuop=tarefas&pagina=<?php echo $pagina-1?>"> << </a> </li>
            <?php
        }


        for($i= 1; $i<=$totalPagina; $i++){
            if($i>=($pagina-5) && $i <= ($pagina+5)){
                if($i==$pagina){
                    echo " <li class='page-item active'> <span class='page-link'> $i </span></li>";
                }else{
                    echo " <li class='page-item'> <a class='page-link' href=\"?menuop=tarefas&pagina=$i\">$i</a> </li>";
                }
            }
        }

        if($pagina < ($totalPagina-5)){
            ?>
              <li class="page-item">  <a class="page-link" href="?menuop=tarefas&pagina=<?php echo $pagina+1?>"> >> </a></li>
            <?php
        }

        echo " <li class='page-item'> <a class='page-link' href= \"?menuop=tarefas&pagina=$totalPagina\"> Ultima Pagina </a></li>";


?>
</ul>