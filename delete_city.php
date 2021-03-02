<html>
<body>

<?php
    include 'connect.php';
    include 'checkLogin.php';

    if(isset($_POST['del'])){
        $id=$_POST['id'];

        $sqlDelete = "delete from city WHERE idCity={$id}";
        mysqli_query($con, $sqlDelete);
        header('location:reg_city.php');
    }

    if(isset($_POST['notdel'])){
        header('location:reg_city.php');
    }
    
    // echo "Id=" . $_GET['idCity'] . " name = " . $_GET['nameCity'];
    $id = $_GET['idCity']; 
    $sqlGetCity="select * from city where idCity={$id}";
    $queryGetCity= mysqli_query($con, $sqlGetCity);
    $resultCity=mysqli_fetch_assoc($queryGetCity);
?>
    <h1> Delete City  </h1>
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
                            Deseja excluir a cidade <?php echo $resultCity['nameCity']?> ?
                        </td>
                    </tr>
                    <tr>
                    <td>
                        <input type="submit" value="Delete" name="del"> 
                    </td>

                    <td>
                        <input type="submit" value="Not Delete" name="notdel"> 
                    </td>
                </tr>
                </table>
    </form>


</body>
</html>