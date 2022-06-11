<!--

Here a user can check on there order. A user can check there order status via recently placed
orders or with there assigned confirmation number presented after placing order/emailed to email supplied

status.html
@Authors : William Wittig, Jacob Jonas
@Last-edit-date : 5/8/22
-->

<include href="views/includes/header.html"></include>
<div class="text-center"><h1>Check status Page</h1>
    <p>Construction! Please come back later</p>
    <p> Here a user can check on there order. A user can check there order
        status via recently placed orders<br>
        or with there assigned confirmation number presented after placing
        order/emailed to email supplied</p>
</div>
<br>
<br>
<div class="text-center">
    <label><b>Enter an Order ID:</b>
    </label>
    <form type="POST">
        <input type="text" id="ID" class="rounded ">
        <button id="click" class="rounded-pill">Get Order Status</button>
    </form>
    <div id="output">
    </div>
</div>
<?php
$number = $_POST['number'];
//1. define a query
$sql = "SELECT `orderNum`, `food`, `drinks`, `total` FROM `orders` WHERE orderNum = :number ";

//2. prepare a statement ($dbh is in config.php so cannot see in editor)
$statement = $dbh->prepare($sql);

//3. bind parameters
$statement->bindParam(':number', $number, PDO::PARAM_INT);

//4. execute
$statement->execute();

?>

<include href="views/includes/footer.html"></include>