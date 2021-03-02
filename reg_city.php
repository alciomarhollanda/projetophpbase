<?php


include 'connect.php';
include 'checkLogin.php';

if(isset($_POST['sub'])){
    $nameCity=$_POST['nameCity'];

    $sqlInsertCity="insert into city (nameCity) values ('$nameCity');";
    mysqli_query($con, $sqlInsertCity);
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    <h1> Cidade </h1>
        <form method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>
                        Name da cidade: 
                        <input type="text" name="nameCity">
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="submit" value="submit" name="sub">
                    </td>
                </tr>


                <tr>
                    <td>
                        <a href="login.php"> Login</a>
                    </td>
                </tr>
            </table>

            <table border='1'>
                    <tr>
                        <th>
                            Nome da cidade
                        </th>
                        <th>  
                        </th>

                        <th>  
                        </th>


                    </tr>

                <?php
                $sq="select * from city";
                $qu=mysqli_query($con,$sq);
                while($f=  mysqli_fetch_assoc($qu)){
                    ?>
                    <tr>
                        <td>
                            <?php echo $f['nameCity']?>
                        </td>
                        <td>
                            <a href="edit_city.php?idCity=<?php echo $f['idCity']?>&nameCity=<?php echo $f['nameCity']?>">Edit</a>
                        </td>
                        <td>
                            <a href="delete_city.php?idCity=<?php echo $f['idCity']?>&nameCity=<?php echo $f['nameCity']?>">Delete</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
    </body>
</html>
