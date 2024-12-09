<?php
 include "./db.class.php";
 session_start();

    $db = new db('usuario');

    if(!empty($_POST)){

        $usuario = $db->login($_POST);
        
        if($usuario !== "error"){

            $_SESSION['login'] = $usuario->login;
            $_SESSION['nome'] = $usuario->nome;
            
            header("location: post/PostList.php");
        } else {
            echo "Login ou senha errado, por favor tente novamente";
        }
    }

    if($_GET['logout']){
        session_destroy();
    }

?>

<form action="Login.php" method="post">
    
    <h4>Login - Sistema do Blog</h4>

    <label for="">Login</label> <br>
    <input type="text" name="login"/> <br>

    <label for="">Senha</label> <br>
    <input type="password" name="senha"/> <br>

    <button type="submit">Salvar</button>
    <a href='./UsuarioForm.php'>Cadastar</a><br>

</form>