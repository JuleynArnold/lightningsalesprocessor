<?php

function productQuery($pid){
    $link = mysqli_connect('sql212.epizy.com', 'epiz_19723230', 'icebreaker', 'epiz_19723230_lightnsalesproc') 
        or die("Connection to database could not be established");
    $sql = "SELECT * FROM Products WHERE ProductID = $pid";
    $result = mysqli_query($link,$sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

function displayTitle($pid){
    $row = productQuery($pid);
    echo $row['ProductName'];
}

function displayImage($pid){
    $row = productQuery($pid);
    echo "image/".$row['ISBN'].".jpg";
}

function displayPrice($pid){
    $row = productQuery($pid);
    echo "$".$row['Price'];
}

function error($msg) {
    echo "
    <html>
    <head>
    <script language='JavaScript'>
    
        alert('$msg');
        history.back();
    
    </script>
    </head>
    <body>
    </body>
    </html>
    ";
    exit;
}

function updateStock($pid,$quantity){
    $query = productQuery($pid);
    $stock = $query['Stock'] - $quantity;
    $link = mysqli_connect('sql212.epizy.com', 'epiz_19723230', 'icebreaker', 'epiz_19723230_lightnsalesproc')
        or die("Connection to database could not be established");
    $newStock = 
    $sql = "UPDATE Products SET Stock = '$stock' WHERE ProductID = '$pid'";
    $result = mysqli_query($link,$sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

?>