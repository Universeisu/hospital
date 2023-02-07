<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Patient</title>
</head>
<body>
    <h1>Add Patient</h1>
    <form action ="addpatient.php" method="POST">
        <input type="text" placeholder="Enter P_ID" name="P_ID">
        <br><br>
        <input type="text" placeholder="Enter Name" name="P_Name">
        <br><br>
        <input type="date" name="P_DOB">
        <br><br>
        <input type="text" placeholder="Enter Outstanding debt" name="P_debt">
        <input type="submit">
    </form>
</body>
</html>


<?php
//if(!empty($_POST['CustomerID']) && !empty($_POST['Name']) && !empty($_POST['Birthdate']) && !empty($_POST['Email']) && !empty($_POST['CountryCode']) && !empty($_POST['OutstandingDebt'])) 
if(!empty($_POST['P_ID']))
{
   
   require 'connect.php';
    $sql_insert="insert into patient values (:P_ID, :P_Name, :P_DOB, :P_debt )";

    $stmt = $conn->prepare($sql_insert);
    $stmt->bindParam(':P_ID', $_POST['P_ID']);
    $stmt->bindParam(':P_Name', $_POST['P_Name']);
    $stmt->bindParam(':P_DOB', $_POST['P_DOB']);
    $stmt->bindParam(':P_debt', $_POST['P_debt']);
    
    if($stmt->execute())
    {
        $message='Suscessfully add new country';
        //header("Location:/business/selectCountry1php");
    }

    else
    {
        $message='Fail to add new country';
    }
    echo $message;
    $conn=null;
}
?>