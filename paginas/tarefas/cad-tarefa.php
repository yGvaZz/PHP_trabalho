<header>
    <h3>
        <i class="bi bi-list-task"> Cadastro de Tarefa</i>
    </h3>
</header>
<div>
    <form class="needs-validation" action="index.php?menuop=inserir-tarefa" method="post">
        <div class="mb-3">
            <label class="form-label" for="tituloTarefa">Titulo</label>
            <input class="form-control" type="text" name="tituloTarefa" id="tituloTarefa" required>
        </div>

        <div class="mb-3">
            <label class="form-label" for="descricaoTarefa">Descrição</label>
            <textarea name="descricaoTarefa" id="" cols="30" rows="5" class="form-control" required></textarea>
        </div>


        <div class="row">
            <div class="mb-3 col-3">
                <label for="dataConclusaoTarefa" class="form-label">Data de Conclusão</label>
                <input class="form-control" type="date" name="dataConclusaoTarefa" id="dataConclusaoTarefa" required>
            </div>
            <div class="mb-3 col-3">
                <label for="horaConclusaoTarefa" class="form-label">Hora de Conclusão</label>
                <input class="form-control" type="time" name="horaConclusaoTarefa" id="horaConclusaoTarefa" required>
            </div>
        </div>

        <div class="row">
            <div class="mb-3 col-3">
                <label for="dataLembreteTarefa" class="form-label">Data de Lembrete</label>
                <input class="form-control" type="date" name="dataLembreteTarefa" id="dataLembreteTarefa">
            </div>
            <div class="mb-3 col-3">
                <label for="horaLembreteTarefa" class="form-label">Hora de Lembrete</label>
                <input class="form-control" type="time" name="horaLembreteTarefa" id="horaLembreteTarefa">
            </div>
        </div>

        <div class="row">
            <div class="mb-3 col-3">
                <label for="recorrenciaTarefa" class="form-label">Recorrência</label>
                <select name="recorrenciaTarefa" id="recorrenciaTarefa" class="form-select">
                    <option value="0">Não recorrente</option>
                    <option value="1">Diariamente</option>
                    <option value="2">Semanalmente</option>
                    <option value="3">Mensalmente</option>
                    <option value="4">Anualmenge</option>
                </select>
            </div>
            
        </div>
        <div class="mb-3">
                <input class="btn btn-success" type="submit" value="Adicionar" name="btnAdicionar">
            </div>

    </form>
</div>