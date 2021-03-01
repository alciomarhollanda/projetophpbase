<html>
<body>

<?php
    include 'connect.php';
    include 'checkLogin.php';

    echo "Id=" . $_GET['idCity'] . " name = " . $_GET['nameCity'];

    
    $sqlGetCity="select * from city where idCity=1";
    $queryGetCity= mysqli_query($con, $sqlGetCity);
    $resultCity=mysqli_fetch_assoc($queryGetCity);
?>

    <form method="POST" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>
                            <!-- Id -->
                            <input type="hidden"  name="id" value="<?php echo $resultCity['idCity']?>">
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