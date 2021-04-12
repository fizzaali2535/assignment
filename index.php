<!DOCTYPE html>
<head></head>
<body>

<?php
$con = mysqli_connect("localhost","root","","mydbs");

if(isset($_POST['sub'])){

    $sql_quary = "INSERT INTO employee(employee_name , email , salary) VALUES('$_POST[employee_name]' , '$_POST[email]' , '$_POST[salary]')";
    $query = mysqli_query($con,$sql_quary);
    $sql_qury = "SELECT * FROM employee";
    $qury = mysqli_query($con,$sql_qury);
    }

if(isset($_POST['submit'])){
    $employee_name=$_REQUEST['employee_name'];
    $email=$_REQUEST['email'];
    $sql=" SELECT * FROM employee WHERE employee_name like '%".$employee_name."%' OR email ='%".$email."%'";
    $q=mysqli_query($con,$sql);
}
else{
    $sql="SELECT * FROM employee";
    $q=mysqli_query($con,$sql);
}
?>
<form method="POST">
    <table width="200" border="3">
  <tr>
    <td>Name</td>
    <td><input type="text" name="employee_name" value="<?php echo $employee_name;?>" /></td>
    <td>Email</td>
    <td><input type="text" name="email" value="<?php echo $email;?>" /></td>
    <td>salary</td>
    <td><input type="text" name="salary"/></td>
    <td><input type="submit" name="submit" value=" Find " /></td>
    <td><input type="submit" name="sub" value=" submit " /></td>
  </tr>
</table>
</form>
<table border="1" style="margin-top:2%;">
    <tr>
        <td style="color: blue;  width: 80px;">Name</td>
        <td style="color: blue;  width: 220px;">Email</td>
        <td style="color: blue;  width: 65px;">salary</td>
    </tr>
    <?php
    while($res=mysqli_fetch_array($q)){
    ?>
    <tr>
        <td><?php echo $res['employee_name'];?></td>
        <td><?php echo $res['email'];?></td>
        <td><?php echo $res['salary'];?></td>
    </tr>
    <?php }?>
</table>
</body>
</html>