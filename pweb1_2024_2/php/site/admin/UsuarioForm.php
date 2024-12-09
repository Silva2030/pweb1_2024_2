<?php
 include "./db.class.php";

    $db = new db('usuario');

    if(!empty($_POST)){

        if($_POST['senha'] === $_POST['c_senha']){
        
            $_POST['senha'] = password_hash($_POST['senha'],PASSWORD_BCRYPT);
            unset($_POST['c_senha']);
           // var_dump($_POST);
           // exit;
            $db->insert($_POST);
            echo "<b>Registro criado com sucesso</b>";
            header("location: Login.php");

        }else{
            echo  "<b>Senhas não coinciden</b>";
        }
    }
?>

<form action="UsuarioForm.php" method="post">
    
    <h4>Formulário Usuario</h4>

    <input type="hidden" name="status"
        value="1"    
    />

    <label for="">Nome</label> <br>
    <input type="text" name="nome"/> <br>

    <label for="">Login</label> <br>
    <input type="text" name="login"/> <br>

    <label for="">Senha</label> <br>
    <input type="password" name="senha"/> <br>

    <label for="">Confirmar Senha</label> <br>
    <input type="password" name="c_senha"/> <br>

    <button type="submit">Salvar</button>
    <a href='./UsuarioList.php'>Voltar</a><br>

</form>