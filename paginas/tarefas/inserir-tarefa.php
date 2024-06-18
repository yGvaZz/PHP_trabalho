<header>
    <h3>
        <i class="bi bi-list-task"> Inserir Tarefa</i> 
    </h3>
</header>

<?php 
    $tituloTarefa = strip_tags( mysqli_real_escape_string($conexao, $_POST['tituloTarefa']));
    $descricaoTarefa = strip_tags( mysqli_real_escape_string($conexao, $_POST['descricaoTarefa']));
    $dataConclusaoTarefa = strip_tags( mysqli_real_escape_string($conexao, $_POST['dataConclusaoTarefa']));
    $horaConclusaoTarefa = strip_tags( mysqli_real_escape_string($conexao, $_POST['horaConclusaoTarefa']));
    $dataLembreteTarefa = strip_tags( mysqli_real_escape_string($conexao, $_POST['dataLembreteTarefa']));
    $horaLembreteTarefa = strip_tags( mysqli_real_escape_string($conexao, $_POST['horaLembreteTarefa']));
    $recorrenciaTarefa = strip_tags( mysqli_real_escape_string($conexao, $_POST['recorrenciaTarefa'])) ;

    $sql ="INSERT INTO tbtarefas 
                (tituloTarefa, 
                descricaoTarefa, 
                dataConclusaoTarefa, 
                horaConclusaoTarefa, 
                dataLembreteTarefa, 
                horaLembreteTarefa, 
                recorrenciaTarefa) 
    
        VALUES (
              '{$tituloTarefa}', 
              '{$descricaoTarefa}', 
              '{$dataConclusaoTarefa}', 
              '{$horaConclusaoTarefa}', 
              '{$dataLembreteTarefa}', 
              '{$horaLembreteTarefa}', 
              '{$recorrenciaTarefa}')";

    

    try{
        $rs = mysqli_query($conexao,$sql);
    }catch(Exception $e){
        $e->getMessage();
    }

    finally{
        echo "Inserido com sucesso!";
    }


?>