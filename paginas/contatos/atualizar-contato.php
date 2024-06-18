<header>
    <h3>Atualizar Contato</h3>
</header>

<?php
    $idContato =strip_tags( mysqli_real_escape_string($conexao, $_POST["idContato"]));
    $nomeContato =strip_tags( mysqli_real_escape_string($conexao, $_POST["nomeContato"]));
    $emailContato =strip_tags( mysqli_real_escape_string($conexao,$_POST["emailContato"]));
    $telefoneContato =strip_tags( mysqli_real_escape_string($conexao,$_POST["telefoneContato"]));
    $enderecoContato =strip_tags( mysqli_real_escape_string($conexao,$_POST["enderecoContato"]));
    $sexoContato =strip_tags( mysqli_real_escape_string($conexao,$_POST["sexoContato"]));
    $dataNascContato =strip_tags( mysqli_real_escape_string($conexao,$_POST["dataNascContato"]));
    $sql = "UPDATE tbcontatoss SET 
            nomecontato = '{$nomeContato}',
            emailContato = '{$emailContato}',
            telefoneContato = '{$telefoneContato}',
            enderecoContato = '{$enderecoContato}',
            sexoContato = '{$sexoContato}',
            dataNascContato = '{$dataNascContato}' 
            WHERE idcontato = '{$idContato}' ";

        $rs = mysqli_query($conexao, $sql) or die("Erro ao Atualizar" . mysqli_error($conexao));
        
        echo "O registro foi atualizado com sucesso";
?>