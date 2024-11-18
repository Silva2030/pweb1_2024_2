<?php
include "../db.class.php";

$db = new db();

$dados = $db->all();

?>

<table>
    <thead>
    <th>ID</th>
    <th>Nome</th>
   </thead>
   <body>
    <tr>
     <?php
     foreach($dados as $item){
        echo "
        <td>$item->id</td>
        <td>$item->Nome</td>
        ";
     }
     ?>
    </tr>
   </body>
</table>