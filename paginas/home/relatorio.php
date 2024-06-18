<?php



$sql = "
    SELECT
        tbtarefas.idTarefa AS idTarefa,
        tbtarefas.tituloTarefa AS tituloTarefa,
        tbtarefas.dataConclusaoTarefa AS dataTarefa,
        'Tarefa' AS tipoEvento
    FROM
        tbtarefas

    UNION ALL

    SELECT
        tbeventos.idEvento AS idEvento,
        tbeventos.tituloEvento AS tituloEvento,
        tbeventos.dataInicioEvento AS dataEvento,
        'Evento' AS tipoEvento
    FROM
        tbeventos

    ORDER BY
        dataTarefa
";

$rs = mysqli_query($conexao, $sql);

if ($rs) {
    $mesmoDia = array();

    while ($row = mysqli_fetch_assoc($rs)) {
        $id = $row['idTarefa'] ?? $row['idEvento'];
        $titulo = $row['tituloTarefa'] ?? $row['tituloEvento'];
        $data = $row['dataTarefa'];
        $tipo = $row['tipoEvento'];

        
        if (array_key_exists($data, $mesmoDia)) {
            
            $mesmoDia[$data][] = array('id' => $id, 'titulo' => $titulo, 'tipo' => $tipo);
        } else {
            
            $mesmoDia[$data] = array(array('id' => $id, 'titulo' => $titulo, 'tipo' => $tipo));
        }
    }

    
    echo '<table class="table table-dark table-hover table-sn">';
    echo '<thead><tr><th>Data</th><th>Título</th><th>Tipo</th></tr></thead>';
    echo '<tbody>';

    foreach ($mesmoDia as $data => $eventosTarefas) {
        foreach ($eventosTarefas as $eventoTarefa) {
            echo '<tr>';
            echo '<td>' . $data . '</td>';
            echo '<td>' . $eventoTarefa['titulo'] . '</td>';
            echo '<td>' . $eventoTarefa['tipo'] . '</td>';
            echo '</tr>';
        }
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo "Erro ao executar a consulta: " . mysqli_error($conexao);
}
?>
