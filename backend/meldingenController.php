<?php
$action = $_POST['action'];
require_once 'conn.php';

if($action == "create") {
    $attractie = $_POST['attractie'];
    if(empty($attractie)) {
        $errors[] = "Vul de naam van de attractie in.";
    };
    $type = $_POST['type'];
    $capaciteit = $_POST['capaciteit']; 
    if(!is_numeric($capaciteit)) {
        $errors[] = "Vul voor capaciteit een geldig getal in.";
    };
    $melder = $_POST['melder'];
    if(empty($melder)) {
        $errors[] = "Vul de naam van de melder in.";
    };
    
    if(isset($_POST['prioriteit'])) {
        $prioriteit = true;
    }
    else {
        $prioriteit = false;
    }
    
    if(isset($errors)) {
        var_dump($errors);
        die();  
    };

    //2. Query
    $query = "INSERT INTO meldingen (attractie, type, capaciteit, prioriteit, melder)
    VALUES(:attractie, :type, :capaciteit, :prioriteit, :melder)";

    //3. Prepare
    $statement = $conn->prepare($query);
    //4. Execute
    $statement->execute([
        ":attractie" => $attractie,
        ":type" => $type,
        ":capaciteit" => $capaciteit,
        ":prioriteit" => $prioriteit,
        ":melder" => $melder
    ]);

    header("Location: ../meldingen/index.php?msg=Melding opgeslagen");
};
if($action == "update") {
    $attractie = $_POST['attractie'];
    if(empty($attractie))
        {
         $errors[] = "...";
        }


    $capaciteit = $_POST['capaciteit'];
    if(empty($capaciteit))
        {
         $errors[] = "...";
        }

    $prioriteit = $_POST['prioriteit'];
    if(empty($prioriteit))
        {
         $errors[] = "...";
        }

    $melder = $_POST['melder'];
    if(empty($melder))
        {
         $errors[] = "...";
        }
    $overig = $_POST['overig'];
    if(empty($overig))
        {
         $errors[] = "...";
        }

        if(isset($errors))
    {
     header("Location: ../meldingen/create.php?msg=Let op! Vul alles in.");
     die();
    }


     //2. Query
     $query = "UPDATE meldingen (attractie, type, capaciteit, prioriteit, melder)
     VALUES(:attractie, :type, :capaciteit, :prioriteit, :melder)";
 
     //3. Prepare
     $statement = $conn->prepare($query);
     //4. Execute
     $statement->execute([
         ":attractie" => $attractie,
         ":type" => $type,
         ":capaciteit" => $capaciteit,
         ":prioriteit" => $prioriteit,
         ":melder" => $melder
     ]);
 
     header("Location: ../meldingen/index.php?msg=Melding opgeslagen");
};
if($action == "delete") {

};

//Variabelen vullen


//1. Verbinding

?>