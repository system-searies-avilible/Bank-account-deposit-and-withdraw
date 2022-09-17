<html>
<head>
<title>Bank account</title>
</head>

<body>
<form method="post">
<table border="2">
<tr>
<th>Name</th>
<td><input type="text" name="txtname"></td>
</tr>

<tr>
<th>Ammount</th>
<td><input type="text" name="txtamount"></td>
</tr>



<tr>
<th> : </th>
<td><input type="submit" name="btn_next" value="Next"></td>
</tr>
</table>
</form>
</body>
</html>
<?php
$connect=mysqli_connect("localhost","root","","bank");

if(isset($_POST['btn_next'])){
$name=$_POST['txtname'];	
$amount=$_POST['txtamount'];	
$id=rand(10000,99999);
$insert=mysqli_query($connect,"insert into accounts values('$id','$name','$amount');");
if($insert){

echo"<script>alert('data inserted');</script>";

}
else{
echo"<script>alert('data can't be insert');</script>";	
}

}

if(isset($_POST['btn_sub'])){
	$account=$_POST['txtacc'];
	$ammount2=$_POST['txtamm'];
	$account_type=$_POST['txtaccount_type'];
	if($account_type==1){
		//payment Add
$insert1=mysqli_query($connect,"insert into transiction2 values('','$account','$ammount2','0');");		
echo"<script>alert('ammount Addided in account');</script>";		
	}
	else{
//payment withdraw
$insert3=mysqli_query($connect,"insert into transiction2 values('','$account','0','$ammount2');");
echo"<script>alert('ammount withdraw sucessfully')</script>";		
	}
}

?>
<form method="post">
<table border="2">
<tr>
<th>Account</th>
<td><input type="text" name="txtacc"></td>
</tr>

<tr>
<th>Amount</th>
<td><input type="text" name="txtamm"></td>
</tr>

<tr>
<th>Account-type</th>
<td><select name="txtaccount_type">
<option value='1'>Add</option>
<option value='0'>Withdraw</option>
</select></td>
</tr>


<tr>
<th>:</th>
<td><input type="submit" name="btn_sub"></td>
</tr>
</table>

</form>