<header>
    <h3>
        <i class="bi bi-calendar-check"> Inserir Evento</i> 
    </h3>
</header>

<?php 
    $tituloEvento = strip_tags( mysqli_real_escape_string($conexao, $_POST['tituloEvento']));
    $descricaoEvento = strip_tags( mysqli_real_escape_string($conexao, $_POST['descricaoEvento']));
    $dataInicioEvento = strip_tags( mysqli_real_escape_string($conexao, $_POST['dataInicioEvento']));
    $horaInicioEvento = strip_tags( mysqli_real_escape_string($conexao, $_POST['horaInicioEvento']));
    $dataFimEvento = strip_tags( mysqli_real_escape_string($conexao, $_POST['dataFimEvento']));
    $horaFimEvento = strip_tags( mysqli_real_escape_string($conexao, $_POST['horaFimEvento']));

    $sql ="INSERT INTO tbeventos 
                (tituloEvento, 
                descricaoEvento, 
                dataInicioEvento, 
                horaInicioEvento, 
                dataFimEvento, 
                horaFimEvento) 
    
        VALUES (
              '{$tituloEvento}', 
              '{$descricaoEvento}', 
              '{$dataInicioEvento}', 
              '{$horaInicioEvento}', 
              '{$dataFimEvento}', 
              '{$horaFimEvento}')";

    

    try{
        $rs = mysqli_query($conexao,$sql);
    }catch(Exception $e){
        $e->getMessage();
    }

    finally{
        echo "Inserido com sucesso!";
    }


?>