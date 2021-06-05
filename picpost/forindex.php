<?php

include "data.php";

$q = $_GET["q"];
$conn = OpenCon("projectBase");

checkConn($conn);

/*
$sql = "INSERT INTO users (userfirstname, userlastname, userpplink, useremail) VALUES ('Er', 'Mehmet', 'profile.jpg', '')";

if ($conn->query($sql) === TRUE) {
    #echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
*/

$sql = "SELECT * from users WHERE userid= '$q'; ";

$res = $conn->query($sql);
$row = $res->fetch_assoc();

echo $row["userfirstname"]. "@";
echo $row["userpplink"]. "@";

#checkConn($conn);
$languageidforphotos = $row["userdefaultlanguage"];
$secsql = "SELECT * from languageoptions WHERE languageid = ".$row['userdefaultlanguage']. "; ";

$result = $conn->query($secsql);
$lang = $result->fetch_assoc();

echo $lang["languagename"]. "@";
echo $languageidforphotos;

CloseCon($conn);

?>