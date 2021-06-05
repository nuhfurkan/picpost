<?php
include "data.php";

$conn = OpenCon("projectBase");
checkConn($conn);

$sql = "SELECT languagename FROM languageoptions";
$res = $conn->query($sql);

if ($res->num_rows > 0) {
    while($row = $res->fetch_assoc()) {
        echo $row["languagename"]. " ";
    }
} else {
    echo "no data";
}

CloseCon($conn);


?>