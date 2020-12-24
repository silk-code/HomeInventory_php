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
                echo "<h2>Item information</h2> <br>";
                echo "<form action='verifyItem.php' method='post'>";
                    echo "Name <input type='text' name='name' /><br>";
                    echo "Category <select name='category' >";
                        $categories="select description,categoryid from category";

                        if(!$result = $mysqli->query($categories)){
                            echo "No rows in categories <br>";
                            exit;
                        }
                        while ($row = $result->fetch_assoc()) {
                              unset($category, $categoryId);
                              $category= $row['description'];
                              $categoryId=$row['categoryid'];
                              echo "<option value='".$categoryId."'>".$category;
                        }
                    echo "</select><br>";
                    echo "Is it perishable <input type='checkbox' name='isPerishable' ><br>";
                    echo "Amount <input type='text' name='amount'/><br>";
                    echo "Unit <select name='unit' >";
                        $units="select description, unitid from unit";

                        if(!$result1 = $mysqli->query($units)){
                            echo "No rows in units <br>";
                            exit;
                        }
                        while ($row1 = $result1->fetch_assoc()) {
                              unset($unit, $unitID);
                              $unit= $row1['description'];
                              $unitId=$row1['unitid'];
                              echo "<option value='".$unitId."'>".$unit;
                        }
                    echo "</select><br>";
                    echo"Location stored <input type='radio' name='locationStored' value='1' checked>Pantry";
                        echo"<input type='radio' name='locationStored' value='2' >Fridge";
                        echo "<input type='radio' name='locationStored' value='3' >Freezer<br>";
                    echo "Notes <textarea name='note' rows='10' cols='60' wrap='virtual' value=''>";
                        echo"</textarea><br>";
                    echo "<input type='submit' name='addItem' value='Add Item'><br>";
                echo "</form>";
                $mysqli -> close();
            }
        }
        include "footer.php";
        ?>
    </body>
</html>



