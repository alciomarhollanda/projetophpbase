<html>
<body>

<?php
    include 'connect.php';
    include 'checkLogin.php';
    include 'checkAdmin.php';

    if(isset($_POST['update'])){
        $id=$_POST['id'];
        $nameCity=$_POST['name'];

        $sqlUpdateCity = "UPDATE city set nameCity='{$nameCity}' WHERE idCity={$id}";
        mysqli_query($con, $sqlUpdateCity);
        header('location:reg_city.php');
    }
    
    // echo "Id=" . $_GET['idCity'] . " name = " . $_GET['nameCity'];
    $id = $_GET['idCity']; 
    $sqlGetCity="select * from city where idCity={$id}";
    $queryGetCity= mysqli_query($con, $sqlGetCity);
    $resultCity=mysqli_fetch_assoc($queryGetCity);
?>
    <h1> Edit City  </h1>
    <form method="POST" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>
                             Id
                            <input readonly="readonly" type="text"  name="id" value="<?php echo $resultCity['idCity']?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Cidade
                            <input type="text" name="name" value="<?php echo $resultCity['nameCity']?>">
                        </td>
                    </tr>
                    <tr>
                    <td>
                        <input type="submit" value="submit" name="update"> 
                    </td>
                </tr>
                </table>
    </form>


</body>
</html>