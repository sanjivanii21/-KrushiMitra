<?php

$conn = new mysqli("localhost","root","","krushimitra_new");

if(isset($_POST['update'])){

    $id = $_POST['id'];
    $price = $_POST['price'];

    mysqli_query(
    $conn,
    "UPDATE market_prices
     SET price='$price'
     WHERE id='$id'"
    );
}

$result = mysqli_query(
$conn,
"SELECT * FROM market_prices"
);

?>

<h2>💰 Manage Market Prices</h2>

<table border="1">

<tr>
<th>Crop</th>
<th>Price</th>
<th>Action</th>
</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<form method="POST">

<td>
<?php echo $row['crop_name']; ?>
</td>

<td>

<input
type="text"
name="price"
value="<?php echo $row['price']; ?>"
>

<input
type="hidden"
name="id"
value="<?php echo $row['id']; ?>"
>

</td>

<td>

<button name="update">
Update
</button>

</td>

</form>

</tr>

<?php } ?>

</table>