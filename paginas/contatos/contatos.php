<?php 
$txt_pesquisa = (isset($_POST["txt_pesquisa"]))?$_POST["txt_pesquisa"]:"";
?>

<header>
    <h3><i class="bi bi-person-workspace"></i> Contatos</h3>
</header>
<div>
    <a class="btn btn-outline-secondary mb-2" href="index.php?menuop=cad-contato"><i class="bi bi-person-plus"></i> Novo contato</a>
</div>
<div class="mb-2">
    <form action="index.php?menuop=contatos" method="post">
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
        <th>ID</th>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Telefone</th>
        <th>Endereço</th>
        <th>Sexo</th>
        <th>Data de Nas.</th>
        <th>Edit</th>
        <th>Excluir</th>
       </tr> 
    </thead>
    <tbody>
        <?php 

        $quantidade = 10;

        $pagina = (isset($_GET['pagina']))?(int)$_GET['pagina']:1;

        $inicio = ($quantidade * $pagina) - $quantidade;

            
        $sql = "SELECT idContato, upper(nomeContato) AS nomeContato, lower(emailContato) AS emailContato, telefoneContato, upper(enderecoContato) AS enderecoContato, 
                case
                    WHEN sexoContato='F' THEN 'FEMININO'
                    WHEN sexoContato='M' THEN 'MASCULINO'
                ELSE 
                    'NÃO ESPECIFICADO' 

                END AS sexoContato,
                

                DATE_FORMAT(dataNascContato, '%d/%m/%Y') AS dataNascContato FROM tbcontatoss WHERE idContato LIKE '%{$txt_pesquisa}%' OR nomeContato LIKE '%{$txt_pesquisa}%' OR emailContato LIKE '%{$txt_pesquisa}%'
                OR telefoneContato LIKE '%{$txt_pesquisa}%' OR enderecoContato LIKE '%{$txt_pesquisa}%' OR sexoContato LIKE '%{$txt_pesquisa}%' OR dataNascContato LIKE '%{$txt_pesquisa}%' ORDER BY nomeContato ASC 
                LIMIT $inicio, $quantidade";

        $rs = mysqli_query($conexao,$sql) or die("Erro ao executar a consulta" . mysqli_error($conexao));
        while($dados = mysqli_fetch_assoc($rs)){

        
        ?>
        <tr>
            <td><?=$dados["idContato"] ?></td>
            <td class="text-nowrap"><?=$dados["nomeContato"] ?></td>
            <td><?=$dados["emailContato"] ?></td>
            <td><?=$dados["telefoneContato"]?></td>
            <td><?=$dados["enderecoContato"] ?></td>
            <td><?=$dados["sexoContato"] ?></td>
            <td><?=$dados["dataNascContato"] ?></td>
            <td class="text-center"><a class="btn btn-outline-warning btn-sm" href="index.php?menuop=editar-contato&idContato=<?=$dados["idContato"] ?>"><i class="bi bi-pencil-square"></i></a></td>
            <td class="text-center"><a class="btn btn-outline-danger btn-sm" href="index.php?menuop=excluir-contato&idContato=<?=$dados["idContato"] ?>"><i class="bi bi-trash"></i></a></td>
        </tr>
    <?php 
        }
    ?>
    </tbody>
</table>
</div>


<ul class="pagination justify-content-center">

<?php 

        $sqlTotal = "SELECT idContato FROM tbcontatoss";
        $qrTotal = mysqli_query($conexao,$sqlTotal) or die (mysqli_error($conexao));
        $numTotal = mysqli_num_rows($qrTotal);
        $totalPagina = ceil($numTotal/$quantidade);
        echo " <li class= 'page-item'><span class='page-link'> Total de Registros: " . $numTotal . "</span></li>";
        echo ' <li class= "page-item"><a class="page-link" href= "?menuop=contatos&pagina=1"> Primeira Pagina </a> </li>';

        if($pagina>6){
            ?>
               <li class="page-item"> <a class="page-link" href="?menuop=contatos&pagina=<?php echo $pagina-1?>"> << </a> </li>
            <?php
        }


        for($i= 1; $i<=$totalPagina; $i++){
            if($i>=($pagina-5) && $i <= ($pagina+5)){
                if($i==$pagina){
                    echo " <li class='page-item active'> <span class='page-link'> $i </span></li>";
                }else{
                    echo " <li class='page-item'> <a class='page-link' href=\"?menuop=contatos&pagina=$i\">$i</a> </li>";
                }
            }
        }

        if($pagina < ($totalPagina-5)){
            ?>
              <li class="page-item">  <a class="page-link" href="?menuop=contatos&pagina=<?php echo $pagina+1?>"> >> </a></li>
            <?php
        }

        echo " <li class='page-item'> <a class='page-link' href= \"?menuop=contatos&pagina=$totalPagina\"> Ultima Pagina </a></li>";


?>
</ul>