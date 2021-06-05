<?php
include "data.php";


$conn = OpenCon("projectBase");
$name = $_POST["name"];
$surname = $_POST["surname"];
$pass = $_POST["pass"];
$email = $_POST["email"];
$selectedLang = $_POST["selectlanguage"];
#echo $selectedLang;

echo "ptr1";


// SELECT LANGUAGE KISMI HALLEDILECEK - SUAN TEXT DONDURUYOR, ID DONDURMESI LAZIM !!!
$transLang = "SELECT * FROM languageoptions WHERE languagename='$selectedLang'";
$langrow = $conn->query($transLang);
if ($langrow->num_rows > 0) {
    while($row = $langrow->fetch_assoc()) {
        #echo "test\n";
        $selectedLang = $row["languageid"];
        #echo $row["languageid"];
    }    
}
#echo "ptr 2 ";


// GIRILEN EMAIL DAHA ONCE KULLANILMIS MI KONTROL EDILECEK
$checkIfUnique = "SELECT * FROM users WHERE useremail='$email';";
$res = $conn->query($checkIfUnique);

if ($res->num_rows > 0) {
    while($row = $res->fetch_assoc()) {
        $mes =  "There is already an email associated to this e-mail address!!!";
        #echo "hallo hallo";
        header("Location: index.php?l=$mes");
    }
} else {
    #echo "ptr 3 ";

$sql = "INSERT INTO users (userfirstname, userlastname, useremail, userpassword, userdefaultlanguage, userpplink) VALUES ('$name', '$surname', '$email', '$pass', '$selectedLang', 'nuh');";

if($conn->query($sql)=== TRUE) {
    #echo "sent succesfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


// HER SEY UYGUNSA HER USER ICIN TABLO OLUSTURULACAK
$findId = "SELECT * FROM users WHERE useremail='$email'";
$userIdFind = $conn->query($findId);
$userId = "";
#echo $userId;
if ($userIdFind->num_rows > 0) {
    while ($row = $userIdFind->fetch_assoc()) {
        $userId = $row["userid"];
        break;
    }
}

$tableName = "user".$userId;
$createUsTable = "CREATE TABLE $tableName (
    pictureid INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    picturelike BOOLEAN,
    picturedislike BOOLEAN,
    pictureknown BOOLEAN
    );";


if ($conn->query($createUsTable) === TRuE) {
    #echo "all good";
} else {
    echo "Error: " . "<br>" . $conn->error;
}

#echo $userId;
header("Location: main.php?q=$userId");
}



CloseCon($conn);

?>