<?php
$mysqli = mysqli_connect("localhost","root","","people");

if (mysqli_connect_errno()) {
    printf("Connect failed: %s \n", mysqli_connect_error());
    exit();
}
else {
    $sql = "SELECT * FROM names";
    $res = mysqli_query($mysqli, $sql);

    if ($res) {
        echo "The current employees are: <br><br>";
        while ($newArray = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
            $firstName = $newArray['firstName'];
            $lastName = $newArray['lastName'];
            echo $firstName." ".$lastName."<br>";
        }
    }
    else {
        printf("Could not retrieve records: %s\n", mysqli_error($mysqli));
    }

    
    mysqli_free_result($res);
    mysqli_close($mysqli);
}

?>