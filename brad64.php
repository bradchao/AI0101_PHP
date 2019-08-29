<?php
$mysqli = new mysqli('localhost','root','','northwind');
$mysqli->set_charset('utf8');

if (isset($_GET['delpid'])){
    $pid = $_GET['delpid'];
    $sql = "DELETE FROM products WHERE ProductID = {$pid}";
    $mysqli->query($sql);
}


$sql = "SELECT * FROM products";
$result = $mysqli->query($sql);
$total = $result->num_rows;

// a page => 10 rows
$rpp = 100;  // rows per page
$totalPages = ceil($total / $rpp);
$page = isset($_GET['page'])?$_GET['page']:1;
$start = ($page - 1) * $rpp;
$next = $page==$totalPages?$page:$page+1;
$prev = $page==1?1:$page-1;

$sql = "SELECT * FROM products LIMIT {$start}, {$rpp}";
$result = $mysqli->query($sql);

?>
<table border="1" width="100%">
    <tr>
        <th>Id</th>
        <th>Product Name</th>
        <th>Price</th>
        <th>Qty.</th>
        <th>Delete</th>
    </tr>
    <script>
        function isDelete(pname){
            return confirm("Delete " + pname + "?");
        }
    </script>
    <?php
        while ( $product = $result->fetch_object()){
            echo '<tr>';
            echo "<td>{$product->ProductID}</td>"; 
            echo "<td>{$product->ProductName}</td>"; 
            echo "<td align='right'>{$product->UnitPrice}</td>"; 
            echo "<td align='center'>{$product->UnitsInStock}</td>"; 

            $pname = addslashes($product->ProductName);

            echo "<td><a onclick='return isDelete(\"{$pname}\");' href='?delpid={$product->ProductID}'>Delete</a></td>"; 
            echo '</tr>';
        }
    ?>
</table>
<a href='?page=<?php echo $prev; ?>'>Prev.</a> | 
<a href='?page=<?php echo $next; ?>'>Next</a>
