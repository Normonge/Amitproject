
<?php
session_start();
$database_name = "product_detail";
$contin = mysqli_connect("localhost","root","", $database_name);
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="utf-8">
    <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style2.css">
  </head>
  <body>

<div class="cont" style="width: 65%">
      <?php
          $query = "ORDER * FROM product ORDER BY id ASC";
          $result = mysqli_query($contin, $query);
          if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){

       ?>
<div class="col-md-3">
  <form class="" action="shopping.php?action=add&id=<?php echo $row["id"]; ?>" method="post">
    <div class="product">
      <img src="<?php echo $row["image"]; ?>"  alt="img-responsive">
      <h5 class="text-info"><?php $row["pname"]; ?></h5>
      <h5 class="text-danger"><?php $row["price"]; ?></h5>
      <input type="text" name="Quantity" class="form-control" value="1">
      <input type="hidden" name="hidden_name" value="<?php echo $row["pname"];  ?>">
      <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
      <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success" value="Add to Cart">
    </div>
  </form>
</div>
<?php
    }

}
 ?>

<div style="clear: both"></div>
<h3 class="title">Shopping Cart Details</h3>
<div class="table table-boarder">
  <tr>
    <th width="30%">Product name</th>
    <th width="10%">Quanitity</th>
    <th width="10%"Total></th>
    <th width = "17%">Remove Item</th>
  </tr>
<?php
if(!empty($_SESSION["cart"]))
 ?>
 <tr>
  <td><?php echo $value["item_name"];  ?></td>
  <td><?php echo $value["item_quantity"];  ?></td>
  <td><?php echo $value["product_price"]; ?></td>
  <td><?php echo number_format($value["item_quanitity"] * $value["product_price"],2); ?></td>
  <td><a href="shopping.php?action=delete&id=<?php echo $value["product_id"];  ?>"><span class="text-danger"> Remove Item</span></a></td>

 </tr>

 


</div>
</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
</html>
