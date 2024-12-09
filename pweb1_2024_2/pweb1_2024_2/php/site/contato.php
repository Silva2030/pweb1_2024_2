<?php
 include "./header.php";
?>

<?php

    if(!empty($_POST)){
      
        echo "<div class='alert alert-success' role='alert'>
                <b>Registro Salvo com sucesso!</b> <br>
               Nome: {$_POST['nome']} Email: {$_POST['email']}
               Mensagem: {$_POST['mensagem']}
            </div>";
    }

?>

<div class="row">
    <div class="col">
        <h2>Contato</h2>
        
        <form action="contato.php" method="post">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" name="nome" placeholder="Nome">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="exemplo@exemplo.com">
            </div>
            <div class="mb-3">
                <label for="mensagem" class="form-label">Mensagem</label>
                <textarea class="form-control" name="mensagem" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Salvar</button>
        </form>

    </div>
</div>


<?php
 include "./footer.php";
?>