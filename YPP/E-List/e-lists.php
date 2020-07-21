<html>
    <body>
        <div class="Groups-Panel" name="Groups-Panel">
            <h3>E-Lists</h3>
        </div>
    </body>
</html>

<?php
include 'e-list.css';
include '../SideBar/Navigation.SideBar.php';
include '../Database.php';

$sql = "SELECT * FROM `e-list`";
$result = $conn->query($sql);
?>
<h3 class="Email-List" name="Email-List">
<?php
    if ($result->num_rows > 0) {
        // output data of each row
         while($row = $result->fetch_assoc()) {
            echo $row["email"] . "<BR>";
        }
    } else {
        echo "0 results";
    }
    ?>
</h3>