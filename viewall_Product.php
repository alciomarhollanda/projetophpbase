<?php
    include 'connect.php';
    // include 'checkLogin.php';
    // include 'checkAdmin.php';



    if(isset($_POST['addShoppingCart'])){
    
        $product_id = (int)$_POST['idProduto'];
        $quantity = (int)$_POST['quantity'];
        $nomeProduto = $_POST['nomeProduto'];

        $sqlUpdateCity = "INSERT INTO compra_produto (FK_PRODUTO,FK_COMPRA,QTD_PRODUTO) VALUES ({$product_id}, 1,{$quantity});";
        
        mysqli_query($con, $sqlUpdateCity);

        header('location:home.php');

    }

?>

<a href="home.php">Home</a>

<table border='1'>
    <tr>
        <th>
            Name
        </th>
        <th>
            Username
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





<table border='1'>
    <tr>
        <th>
            Produto
        </th>
        <th>
            Preço
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
            <?php echo $compra_produto['QTD_PRODUTO']?>
        </td>

    </tr>
    <?php
}
?>