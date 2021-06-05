<?php
    include "data.php";

    $q = $_GET["q"];
    $photoURL = $_GET["urls"];
    $keywordval = $_GET["keyword"];
    $langu = $_GET["lang"];
    $conn = OpenCon("projectBase");
    
    checkConn($conn);

    $sql = "INSERT INTO pictures (pictureurl, picturekeyword, pictureposterid, languageid) VALUES ('$photoURL', '$keywordval', '$q', '$langu');";

    if($conn->query($sql)=== TRUE) {
        #echo "sent succesfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

?>