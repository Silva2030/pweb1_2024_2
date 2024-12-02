<?php
 include "../db.class.php";

    $db = new db('categoria');
    
    if(!empty($_GET['id'])){
        $db->destroy($_GET['id']);
        header('Location:CategoriaList.php');
    }

    if(!empty($_POST)){
        $dados = $db->search($_POST);
    } else {
        $dados = $db->all();
    }

?>
<h4>Listagem de Categoria</h4>


<form action="./CategoriaList.php" method="post">

    <div>
        <select name="tipo">
            <option value="nome">Nome</option>
        </select>
        <input type="text" name="valor">
        <button type="submit">Buscar</button>
        <a href='./CategoriaForm.php'>Cadastrar</a><br>
    </div>

</form>

<table>
    <thead>
        <th>ID</th>
        <th>Nome</th>
        <th>Ação</th>
        <th>Ação</th>
    </thead>
    <tbody>
        <tr>
            <?php
                foreach ($dados as $item){
                    echo "
                    <tr>
                        <td>$item->id</td>
                        <td>$item->nome</td>
                        <td><a href='./CategoriaForm.php?id=$item->id'>Editar</a></td>
                        <td><a onclick='return confirm(\"Deseja Excluir? \")' href='./CategoriaList.php?id=$item->id'>Deletar</a></td>
                    </tr>
                    ";
                }
            ?>
        </tr>
    </tbody>
</table>