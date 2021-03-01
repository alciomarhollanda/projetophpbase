<?php
include 'connect.php';
include 'checkLogin.php';

if(isset($_POST['sub'])){
    $t=$_POST['text'];
    $u=$_POST['user'];
    $p=$_POST['pass'];
    $c=$_POST['city'];
    $g=$_POST['gen'];
    if($_FILES['f1']['name']){
    move_uploaded_file($_FILES['f1']['tmp_name'], "image/".$_FILES['f1']['name']);
    $img="image/".$_FILES['f1']['name'];
    }
    else{
        $img=$_POST['img1'];
    }
    $i="update reg set name='$t',username='$u',password='$p',city='$c',gender='$g',image='$img' where id='$_SESSION[id]'";
    mysqli_query($con, $i);
    header('location:home.php');
}
    $s="select*from reg where id='$_SESSION[id]'";
    $qu= mysqli_query($con, $s);
    $f=mysqli_fetch_assoc($qu);
    ?> 
<form method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>
                        Name
                        <input type="text" name="text" value="<?php echo $f['name']?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Username
                        <input type="text" name="user" value="<?php echo $f['username']?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        password
                        <input type="password" name="pass" value="<?php echo $f['password']?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        city
                        <select name="city">
                            <option value="">-select-</option>
                        
                            <?php
                            $sqlCity= mysqli_query($con, "select * from city");
                                                        
                            while($item = mysqli_fetch_assoc($sqlCity))
                            {
                                $nomeItem = utf8_encode($item['nameCity']);
              
                                if($f['city'] == $nomeItem){
                                    echo "                                
                                        <option value=$nomeItem selected='selected'>$nomeItem</option>                                
                                    ";
                                }else{
                                    echo " <option value=$nomeItem>$nomeItem</option>";
                                }
                            }
                            ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Gender
                        <?php if($f['gender']=='male'){
                            ?>
                          <input type="radio"name="gen" id="gen" value="male" checked>
                        <?php
                        } else {
?>
                        <input type="radio"name="gen" id="gen" value="male">
                        <?php } ?>male
                       <?php if($f['gender']=='female'){
                            ?>
                          <input type="radio"name="gen" id="gen" value="female" checked>
                        <?php
                        } else {
?>
                        <input type="radio"name="gen" id="gen" value="female">
                        <?php } ?>female
                    </td>
                </tr>
                <tr>
                    <td>
                        Image
                        <img src="<?php echo $f['image']?>" width="100px" height="100px">
                        <input type="file" name="f1">
                        <input type="hidden" name="img1" value="<?php echo $f['image']?>">
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="submit" name="sub">
                               
                    </td>
                </tr>
            </table>
</form>