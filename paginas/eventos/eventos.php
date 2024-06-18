
<?php 
$txt_pesquisa = (isset($_POST["txt_pesquisa"]))?$_POST["txt_pesquisa"]:"";

// Altera status

$idEvento = (isset($_GET['idEvento']))?$_GET['idEvento']:"";
$statusEvento = (isset($_GET['statusEvento']) && $_GET['statusEvento']=='0')?'1':'0';

$sql = "UPDATE tbeventos SET statusEvento = {$statusEvento} WHERE idEvento = {$idEvento}";
$rs = mysqli_query($conexao,$sql);   
?>

<header>
    <h3><i class="bi bi-calendar-check"></i> Eventos</h3>
</header>
<div>
    <a class="btn btn-outline-secondary mb-2" href="index.php?menuop=cad-evento"><i class="bi bi-list-task"></i> Novo Evento</a>
</div>
<div class="mb-2">
    <form action="index.php?menuop=eventos" method="post">
    <div class="input-group">
    <input class="form-control" type="text" name="txt_pesquisa" value="<?=$txt_pesquisa?>">
    <button type="submit" class="btn btn-outline-success btn-sm"><i class="bi bi-search"> Pesquisar</i></button>
    </div>
    
    </form> 
</div>
<div class="tabela">
<table class="table table-dark table-hover table-sn ">
    <thead class="thead-dark">
       <tr>
        
        <th>Status</th>
        <th>Titulo</th>
        <th>Descrição</th>
        <th>Data de início</th>
        <th>Hora de início</th>
        <th>Data de Fim</th>
        <th>Hora de Fim</th>
        <th>Editar</th>
        <th>Excluir</th>
       </tr> 
    </thead>
    <tbody>
        <?php

        $quantidade = 10;

        $pagina = (isset($_GET['pagina']))?(int)$_GET['pagina']:1;

        $inicio = ($quantidade * $pagina) - $quantidade;

        

        $sql = "SELECT idEvento, statusEvento, tituloEvento, descricaoEvento, DATE_FORMAT(dataInicioEvento, '%d/%m/%Y') AS dataInicioEvento, horaInicioEvento, DATE_FORMAT(dataFimEvento, '%d/%m/%Y') AS dataFimEvento, horaFimEvento
        FROM tbeventos WHERE tituloEvento LIKE '%{$txt_pesquisa}%' OR descricaoEvento LIKE '%{$txt_pesquisa}%' OR DATE_FORMAT(dataInicioEvento, '%d/%m/%Y') LIKE '%{$txt_pesquisa}%' OR horaInicioEvento LIKE '%{$txt_pesquisa}%' OR DATE_FORMAT(dataFimEvento, '%d/%m/%Y') LIKE '%{$txt_pesquisa}%' OR horaFimEvento LIKE '%{$txt_pesquisa}%' ORDER BY statusEvento, dataInicioEvento  LIMIT $inicio, $quantidade";    

        $rs = mysqli_query($conexao,$sql) or die("Erro ao executar a consulta" . mysqli_error($conexao));
        while($dados = mysqli_fetch_assoc($rs)){

        
        ?>
        <tr>
            <td>
                <a class="btn btn-secondary btn-sm" href="index.php?menuop=eventos&pagina=<?=$pagina?>&idEvento=<?=$dados['idEvento']?>&statusEvento=<?=$dados['statusEvento']?>">
                    <?php 
                        if($dados['statusEvento']==0){
                            echo '<i class="bi bi-square"></i>';
                        }else{
                            echo '<i class="bi bi-check-square"></i>';
                        }
                    ?> 
                </a>
            </td>
            <td class="text-nowrap"><?=$dados["tituloEvento"] ?></td>
            <td><?=$dados["descricaoEvento"] ?></td>
            <td><?=$dados["dataInicioEvento"]?></td>
            <td><?=$dados["horaInicioEvento"] ?></td>
            <td><?=$dados["dataFimEvento"]?></td>
            <td><?=$dados["horaFimEvento"] ?></td>
            <td class="text-center"><a class="btn btn-outline-warning btn-sm" href="index.php?menuop=editar-evento&idEvento=<?=$dados["idEvento"] ?>"><i class="bi bi-pencil-square"></i></a></td>
            <td class="text-center"><a class="btn btn-outline-danger btn-sm" href="index.php?menuop=excluir-evento&idEvento=<?=$dados["idEvento"] ?>"><i class="bi bi-trash"></i></a></td>
        </tr>
    <?php 
        }
    ?>
    </tbody>
</table>
</div>


<ul class="pagination justify-content-center">

<?php 

        $sqlTotal = "SELECT idEvento FROM tbeventos";
        $qrTotal = mysqli_query($conexao,$sqlTotal) or die (mysqli_error($conexao));
        $numTotal = mysqli_num_rows($qrTotal);
        $totalPagina = ceil($numTotal/$quantidade);
        echo " <li class= 'page-item'><span class='page-link'> Total de Registros: " . $numTotal . "</span></li>";
        echo ' <li class= "page-item"><a class="page-link" href= "?menuop=eventos&pagina=1"> Primeira Pagina </a> </li>';

        if($pagina>6){
            ?>
               <li class="page-item"> <a class="page-link" href="?menuop=eventos&pagina=<?php echo $pagina-1?>"> << </a> </li>
            <?php
        }


        for($i= 1; $i<=$totalPagina; $i++){
            if($i>=($pagina-5) && $i <= ($pagina+5)){
                if($i==$pagina){
                    echo " <li class='page-item active'> <span class='page-link'> $i </span></li>";
                }else{
                    echo " <li class='page-item'> <a class='page-link' href=\"?menuop=eventos&pagina=$i\">$i</a> </li>";
                }
            }
        }

        if($pagina < ($totalPagina-5)){
            ?>
              <li class="page-item">  <a class="page-link" href="?menuop=eventos&pagina=<?php echo $pagina+1?>"> >> </a></li>
            <?php
        }

        echo " <li class='page-item'> <a class='page-link' href= \"?menuop=eventos&pagina=$totalPagina\"> Ultima Pagina </a></li>";


?>
</ul>