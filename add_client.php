<?php
include 'DB_Connect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $type = $_POST["type"];

    // Generate a unique client code based on the specified format (e.g., FNB001, PRO123, ITA001)
    $clientCode = generateUniqueClientCode($conn);

    // Insert the new client into the database
    $sql = "INSERT INTO clients (name, description, type, client_code) VALUES ('$name', '$description', '$type', '$clientCode')";
    if ($conn->query($sql) === TRUE) {
        echo "Client created successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Function to generate a unique client code
function generateUniqueClientCode($conn) {
    // Define an array of alphabetic characters (A-Z) for code generation
    $alphabeticCharacters = range('A', 'Z');
    
    // Start with the first alphabetic character (index 0)
    $alphaPartIndex = 0;
    
    // Generate the alpha part of the code using three characters
    $alphaPart = $alphabeticCharacters[$alphaPartIndex] . $alphabeticCharacters[$alphaPartIndex] . $alphabeticCharacters[$alphaPartIndex];
    
    // Generate the numeric part of the code starting at 1
    $numericPart = 1;
    
    // Combine the alpha and numeric parts to form the client code
    $clientCode = $alphaPart . sprintf("%03d", $numericPart);
    
    // Check if the generated client code is already taken in the database
    $codeExists = true;
    while ($codeExists) {
        // Query the database to check if the client code already exists
        $query = "SELECT * FROM clients WHERE client_code = '$clientCode'";
        $result = $conn->query($query);
        
        // If the client code exists, increment the numeric part and generate a new client code
        if ($result->num_rows > 0) {
            $numericPart++;
            $clientCode = $alphaPart . sprintf("%03d", $numericPart);
        } else {
            // If the client code is unique, set the flag to false to exit the loop
            $codeExists = false;
        }
        
        // If the numeric part reaches 1000 (the maximum allowed in the format), reset it to 1 and move to the next alphabetic character
        if ($numericPart > 999) {
            $alphaPartIndex++;
            $alphaPart = $alphabeticCharacters[$alphaPartIndex] . $alphabeticCharacters[$alphaPartIndex] . $alphabeticCharacters[$alphaPartIndex];
            $numericPart = 1;
        }
    }
    
    // Return the generated unique client code
    return $clientCode;
}

?>
