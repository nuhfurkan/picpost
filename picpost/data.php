<?php
function OpenCon($db) {
    $dbhost = "HOST";
    $dbuser = "USER";
    $dbpass = "PASS";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
    return $conn;
}

function CloseCon($conn) {
    $conn -> close();
}

function checkConn($conn) {
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        #echo "connection succeed!\n";
    }
}

function getName($conn) {
    $sql = "SELECT userfirstname FROM users";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        #echo "userfirstname: " . $row["userfirstname"]. "<br>";
        return $row["userfirstname"];
    }
}
?>
