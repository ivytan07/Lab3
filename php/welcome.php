<!DOCTYPE html>
<html>

<head>
    <title>Sweet World Enterprise</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="../js/validate.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>
    <div class="header">
        <img src="../image/logo1.png" align="left" hspace="50">
        <!--Logo-->
        <h1>Sweet World Enterprise</h1>
    </div>
    <div class="w3-bar w3-deep-purple w3-large">
        <!--Top navigation bar-->
        <a href="#home" class="w3-bar-item w3-button">Home</a>
        <a href="#news" class="w3-bar-item w3-button">Products</a>
        <a href="#contact" class="w3-bar-item w3-button">Contact</a>
        <a href="../html/homepage.html" class="w3-bar-item w3-button w3-right">Logout</a>
        <a href="../php/addproduct.php" class="w3-bar-item w3-button w3-right">Add Product</a>
    </div>

    <div class="main">
        <div class="container">
            <h2>Product List</h2>
            <br>
            <form action="welcome.php" method="post">
                <div class="search-container">
                    <input type="text" id="idsearch" name="searchproduct" class="form-control"
                        placeholder="Search Product....">
                    <button type="submit" name="searchbtn" value="search" class="btn btn-default">Search</button>
            </form>
        </div>

        <?php
		include_once ("dbconnect.php");
		if (isset($_POST["searchbtn"]))
		{
		$searchproduct = $_POST['searchproduct'];
		$query = $conn->prepare("SELECT * FROM tbl_products WHERE prname LIKE '%$searchproduct%' OR  prtype LIKE '%$searchproduct%' ORDER BY id DESC");
		$query->execute();
		}
		else
		{
		$query = $conn->prepare("SELECT * FROM tbl_products ORDER BY id DESC");
		$query->execute();
		}
		?>


        <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered">
            <thead>
                <!--Table List-->
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Type</th>
                    <th scope="col">Product Price(RM)</th>
                    <th scope="col">Product Quantity</th>
                </tr>
            </thead>
            <tbody>
                <!--Fetch Data From Database-->
                <?php  while ($row=$query->fetch()) 
			{ ?>
                <tr>
                    <td><?php echo ($row['id']); ?></td>
                    <td><img src="../uploads/<?php echo $row['image']?>"></td>
                    <td><?php echo ($row['prname']); ?></td>
                    <td><?php echo ($row['prtype']); ?></td>
                    <td><?php echo ($row['prprice']); ?></td>
                    <td><?php echo ($row['prqty']); ?></td>
                </tr>
                <?php }
			?>

            </tbody>
        </table>

    </div>
    </div>
    <div class="w3-container w3-deep-purple w3-center">
        <!--Bottom navigation bar-->
        <p class="w3-large">Created by Tan Ivy. &copy; 2021
        </p>
    </div>
</body>

</html>