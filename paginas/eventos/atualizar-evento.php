<header>
    <h3>
        <i class="bi bi-calendar-check"> Atualizar Evento</i>
    </h3>
</header>

<?php 

    $idEvento = strip_tags( mysqli_real_escape_string($conexao, $_POST['idEvento']));
    $tituloEvento = strip_tags( mysqli_real_escape_string($conexao, $_POST['tituloEvento']));
    $descricaoEvento = strip_tags( mysqli_real_escape_string($conexao, $_POST['descricaoEvento']));
    $dataInicioEvento = strip_tags( mysqli_real_escape_string($conexao, $_POST['dataInicioEvento']));
    $horaInicioEvento = strip_tags( mysqli_real_escape_string($conexao, $_POST['horaInicioEvento']));
    $dataFimEvento = strip_tags( mysqli_real_escape_string($conexao, $_POST['dataFimEvento']));
    $horaFimEvento = strip_tags( mysqli_real_escape_string($conexao, $_POST['horaFimEvento']));

    $sql = "UPDATE tbeventos SET tituloEvento = '{$tituloEvento}', descricaoEvento = '{$descricaoEvento}', dataInicioEvento = '{$dataInicioEvento}', horaInicioEvento = '{$horaInicioEvento}', dataFimEvento = '{$dataFimEvento}', horaFimEvento = '{$horaFimEvento}' WHERE idEvento = '{$idEvento}'"; 
    $rs = mysqli_query($conexao,$sql) or die("Erro ao execultar a consulta." . mysqli_error($conexao));
    echo "Dados atualizados com sucesso!";
    
?>