<?php
include "header.php";
?>
<html>
    <head>
        <title>Add Item</title>
    </head>
    <body>
        <?php
        $continue=False;
        if(!isset($_SESSION['loggedIn'])||$_SESSION['loggedIn']===False){
            echo "<a href='loginPage.php'>Please log in<a>";
        }
        else{
            $continue=True;
        }
        if($continue){
            $mysqli=new mysqli('127.0.0.1','root','','homeinventory');//connect
            if($mysqli->connect_errno){ //error
                echo "Sorry, this website is experiencing problems <br>";
                $continue=False;
            }
            if($continue){
                echo "<h2>My Pantry</h2> <br>";
                $sql="SELECT useritem.itemID as 'itemID',item.description as 'name', "
                        . "category.description as 'category', location.description as 'location', "
                        . "qty, unit.description as 'unit', isPerishable, note FROM `useritem` "
                        . "inner join item on useritem.itemID=item.itemID "
                        . "inner join category on item.categoryID=category.categoryID "
                        . "inner join location on useritem.locationID=location.locationID "
                        . "inner join unit on unit.unitID=useritem.unitID where userId=".$_COOKIE['id']
                        ." group by category.description";
                echo "<table >";
                echo "<tr class='table_header'>";
                echo "<td>Name</td>";
                echo "<td>Category</td>";
                echo "<td>Location</td>";
                echo "<td>Amount</td>";
                echo "<td>Unit</td>";
                echo "<td>Is Perishable?</td>";
                echo "<td>Note</td>";
                echo "<td> </td>";
                echo "</tr>";
                
                if(!$result = $mysqli->query($sql)){
                    echo "Nothing in the pantry <br>";
                }else{
                    foreach ($result as $row){
                        $isPerishable='No';
                        if($row['isPerishable']=='1'){
                            $isPerishable='Yes';
                        }
                        echo "<tr>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['category']."</td>";
                        echo "<td>".$row['location']."</td>";
                        echo "<td>".$row['qty']."</td>";
                        echo "<td>".$row['unit']."</td>";
                        echo "<td>".$isPerishable."</td>";
                        echo "<td>".$row['note']."</td>";
                        echo "<td><form method='POST' action='updateItem.php'>";
                        echo "<input type='hidden' name='itemID' value=".$row['itemID'].">";
                        echo "<input type='hidden' name='name' value=".$row['name'].">";
                        echo "<input type='hidden' name='qty' value=".$row['qty'].">";
                        echo "<input type='hidden' name='note' value=".$row['note'].">";
                        echo "<input type='submit', value='Update'>";
                        echo "</form>";
                        echo "<form method='POST' action='deleteItem.php'>";
                        echo "<input type='hidden' name='itemID' value=".$row['itemID'].">";
                        echo "<input type='submit', value='Delete'>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
                $mysqli -> close();
            }
        }
        include "footer.php";
        ?>
    </body>
</html>

