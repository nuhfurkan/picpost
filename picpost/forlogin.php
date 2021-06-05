<?php
include "data.php";

$conn = OpenCon("projectBase");

$pass = $_POST["userpassword"];
$email = $_POST["useremail"];

$sql = "SELECT * from users WHERE useremail = '$email' AND userpassword = '$pass'; ";

$res = $conn->query($sql);

if ($res->num_rows > 0) {
    while($row = $res->fetch_assoc()) {
        #echo "test\n";
        $q = $row["userid"];
        header("Location: main.php?q=$q");
        echo $row["userfirstname"];
    }
} else {
    $q = "wrong email or password";
    header("Location: index.php?q=$q");
    echo "no data";
}

CloseCon($conn);

?>