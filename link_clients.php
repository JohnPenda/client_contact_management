<?php
include 'DB_Connect.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Client-Contact Management System</title>
  <link rel="stylesheet" href="css/style.css"> <!-- Create a CSS file for styling -->
</head>
<body>
  <h1>Client-Contact Management System</h1>
  
  <?php
  // Retrieve the contact ID from the query parameter
  $contact_id = $_GET['contact_id'];

  // Fetch the contact's information from the database
  $contact_query = "SELECT * FROM contacts WHERE id = $contact_id";
  $contact_result = $conn->query($contact_query);
  $contact = $contact_result->fetch_assoc();
  ?>

  <h2>Link Clients to Contact: <?php echo $contact['name'] . ' ' . $contact['surname']; ?></h2>
  <form action="link_clients.php" method="post">
    <?php
    // Fetch all clients from the database
    $client_query = "SELECT * FROM clients ORDER BY name ASC";
    $client_result = $conn->query($client_query);

    // Display the list of clients with checkboxes to select
    if ($client_result->num_rows > 0) {
        while ($client = $client_result->fetch_assoc()) {
            echo '<input type="checkbox" name="clients[]" value="' . $client['id'] . '"> ' . $client['name'] . '<br>';
        }
        echo '<input type="hidden" name="contact_id" value="' . $contact_id . '">';
        echo '<input type="submit" value="Save">';
    } else {
        echo "No clients found. Please create clients first.";
    }
    ?>

    <?php

// Process form submission
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["clients"])) {
    // Sanitize and validate the input data
    $contact_id = $_POST["contact_id"];
    $clients = $_POST["clients"];

    // Delete existing links for the contact to avoid duplicate links
    $delete_query = "DELETE FROM client_contact_links WHERE contact_id = $contact_id";
    $conn->query($delete_query);

    // Insert the new links into the database
    if (!empty($clients)) {
        foreach ($clients as $client_id) {
            $insert_query = "INSERT INTO client_contact_links (client_id, contact_id) VALUES ($client_id, $contact_id)";
            $conn->query($insert_query);
        }
    }

    echo "Clients linked successfully.";
} elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
    echo "No clients selected for linking.";
}
?>

  </form>
</body>
</html>
