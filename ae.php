<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>spletnaStran</title>
<link rel="stylesheet" href="css.css">
</head>
<body>

<h1>SPLETNA STRAN PRI PRAKSI</h1>
<br>


    <div class="form">
<form method="post">
        Uporabniško ime: 
        <input type="text" name="uime" placeholder="ime"><br>
        Geslo: 
        <input type="password" name="pass" placeholder="geslo"><br>
        <input type="submit" value="Prijava">
</form>

</div>

<br>


<div class="form">
<h1>USTVARI NOV RAČUN</h1>
<form method="post">
        Uporabniško ime: 
        <input type="text" name="uime2" placeholder="ime2"><br>
        Geslo: 
        <input type="password" name="pass2" placeholder="geslo2"><br>
        <input type="submit" value="Registracija">
</form>
</div>
    
    
    
<?php


$_SESSION['uime'] = $ime;


echo "Script started";
ob_start();

$servername = "localhost";
$username = "arminh";
$password = "root";
$dbname = "tabelaA";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";




if(!empty($_POST["uime"]) && !empty($_POST["pass"])){
    echo "Form submitted";

        $ime = $_POST["uime"];  
        $geslo = $_POST["pass"];
        $sql = "SELECT * FROM uporabniki WHERE ime='$ime' AND geslo ='$geslo'";

        $result = mysqli_query($conn, $sql);
            
        if ($result === false) {
            echo "Error executing query: " . mysqli_error($conn);
        }
        else {
            if (mysqli_num_rows($result) == 1) {
                echo "PRIJAVA JE USPESNA!";
                header("Location: stran1.html");
                exit();
            }

        else
        {
            echo "PRIJAVA NI USEPESNA!";
           
        }


        if (!$result) {
            echo "Query failed: " . mysqli_error($conn);
        } else {
            echo "No results found";
        }

 }

        

    } 



    if(!empty($_POST["uime2"]) && !empty($_POST["pass2"])){
// Example user details
$new_username =  $_POST["uime2"];  
$new_password =  $_POST["pass2"];

// SQL statement to insert new user
$sql = "INSERT INTO uporabniki (ime, geslo) VALUES ('$new_username', '$new_password')";

if (mysqli_query($conn, $sql)) {
    echo "New user added successfully!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

 }


?>

</body>
</html> 
