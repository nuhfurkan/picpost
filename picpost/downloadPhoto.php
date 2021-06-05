<?php
    include "data.php";

    $q = $_GET["q"];
    $selan = $_GET["selan"];
    $conn = OpenCon("projectBase");
    
    checkConn($conn);
    #echo $selan;
    #echo $q;

    # WHERE Row_Number OVER($q) AND languageid=". $selan ."
    $sql = "SELECT * FROM pictures WHERE languageid=$selan LIMIT 10 OFFSET $q";
    $res = $conn->query($sql);

    #echo "test ";

    if ($res->num_rows == 10) {
        echo "hi";
        while($row = $res->fetch_assoc()) {
            echo $row["pictureurl"]."@";
        }
    }
    else {  
        echo "0@";
        echo $res->num_rows . "@";
        while($row = $res->fetch_assoc()) {
            echo $row["pictureurl"]."@";
        }
    }
?>