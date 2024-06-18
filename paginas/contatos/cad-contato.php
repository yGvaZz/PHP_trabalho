<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <h3>Cadastro de Contato</h3>
    </header>
    <div>
        <form class="needs-validation" action="index.php?menuop=inserir-contato" method="post">
             <div class="mb-3">
                <label class="form-label" for="nomeContato">Nome</label>
                <input class="form-control" type="text" name="nomeContato" required>
             </div>

             <div class="mb-3">
                <label class="form-label" for="emailContato">E-mail</label>
                <input class="form-control" type="email" name="emailContato" required>
             </div>

             <div class="mb-3">
                <label class="form-label" for="telefoneContato">Telefone</label>
                <input class="form-control" type="text" name="telefoneContato" required>
             </div>

             <div class="mb-3">
                <label class="form-label" for="enderecoContato">Endereço</label>
                <input class="form-control" type="text" name="enderecoContato" required>
             </div>
             
             
             <div class="mb-3 ">
                <label class="form-label" for="sexoContato">Sexo</label>
                <input class="form-control" type="text" name="sexoContato" required>
             </div>

             <div class="mb-3 ">
                <label class="form-label" for="dataNascimento">Data de Nascimento</label>
                <input class="form-control" type="date" name="dataNascContato" required>
             </div>

             <div class="mb-3">
                <input class="btn btn-outline-success" type="submit" value="Adicionar" name="btAdicionar">
             </div>
        </form>
    </div>
</body>
</html>