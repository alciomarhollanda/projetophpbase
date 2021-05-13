<!DOCTYPE html>
<html>
<head>
  
</head>
<body>

<?php
    include 'connect.php';
    // include 'checkLogin.php';
    // include 'checkAdmin.php';



    if(isset($_POST['addShoppingCart'])){
    
        $product_id = (int)$_POST['idProduto'];
        $quantity = (int)$_POST['quantity'];
        $nomeProduto = $_POST['nomeProduto'];

        $idCompra = 1;

        $sqlGetCompra="select * from compra_produto where FK_COMPRA={$idCompra} AND FK_PRODUTO ={$product_id}";
        $queryGetCompra= mysqli_query($con, $sqlGetCompra);
        $resultCompra=mysqli_fetch_assoc($queryGetCompra);

        $ExisteCompra = isset($resultCompra);    
        if(isset($resultCompra)){
            
            $sqlAddOrUpdate = "
            UPDATE compra_produto set QTD_PRODUTO={$quantity} 
            WHERE FK_PRODUTO ={$product_id} and FK_COMPRA={$idCompra};
            ";

        }else{
            $sqlAddOrUpdate = "
            INSERT INTO compra_produto (FK_PRODUTO,FK_COMPRA,QTD_PRODUTO) 
            VALUES ({$product_id}, {$idCompra},{$quantity});
            ";

        }

        mysqli_query($con, $sqlAddOrUpdate);




        // header('location:home.php');

    }

?>

<a href="home.php">Home</a>

<table border='1'>
    <tr>
        <th>
            Id
        </th>
        <th>
            Nome
        </th>
        <th>
            Preço
        </th>
        <th></th>

    </tr>

<?php
$sq="

select * from produto as p
left join compra_produto as cp on cp.FK_PRODUTO = P.ID_PRODUTO

";



$qu=mysqli_query($con,$sq);
while($produto=  mysqli_fetch_assoc($qu)){
    ?>
    <tr>
        <td>
            <?php echo $produto['ID_PRODUTO']?>
        </td>
        <td>
            <?php echo $produto['NOME_PRODUTO']?>
        </td>
        <td>
            <?php echo $produto['price']?>
        </td>
        <td>
            <form method="POST" enctype="multipart/form-data">
                <input type="number" name="quantity" value="<?=$produto['QTD_PRODUTO']?>" min="1" placeholder="Quantity" required>
                <input type="hidden" name="idProduto" value="<?=$produto['ID_PRODUTO']?>">
                <input type="hidden" name="nomeProduto" value="<?=$produto['NOME_PRODUTO']?>">
                <input type="submit" name="addShoppingCart" value="Adicionar">
            </form>
        </td>
    </tr>
    <?php
}
?>
</table>

<br>
<br>
<br>



<table border='1'>
    <tr>
        <th>
            Produto
        </th>
        <th>
            Preço
        </th>
        <th>
            Quantidade
        </th>
        <th>
            Total Preço
        </th>
    </tr>

<?php
$sq="

SELECT * FROM compra_produto as cp
inner join compra as c on c.ID_COMPRA = cp.FK_COMPRA
inner join produto as p on p.ID_PRODUTO = cp.FK_PRODUTO

";
$qu=mysqli_query($con,$sq);
while($compra_produto=  mysqli_fetch_assoc($qu)){
    ?>
    <tr>
        <td>
            <?php echo $compra_produto['NOME_PRODUTO']?>
        </td>
        <td>
            <?php echo $compra_produto['price']?>
        </td>
        <td>
            <?php echo $compra_produto['QTD_PRODUTO']?>
        </td>
        <td>
            <?php echo $compra_produto['QTD_PRODUTO']*$compra_produto['price']?>
        </td>

    </tr>
    <?php
}
?>
</table>


</body>
</html>