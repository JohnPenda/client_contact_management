<?php
include 'DB_Connect.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Client-Contact Management System</title>
  <link rel="stylesheet" href="css/style.css"> 
</head>
<body>
  <h1>Client-Contact Management System</h1>

<?php
// Check if the client_id parameter is set in the URL
if (isset($_GET['client_id'])) {
    // Retrieve the client ID from the query parameter
    $client_id = $_GET['client_id'];

    // Fetch the client's information from the database
    $client_query = "SELECT * FROM clients WHERE id = $client_id";
    $client_result = $conn->query($client_query);

    // Check if the client with the given ID exists
    if ($client_result->num_rows > 0) {
        $client = $client_result->fetch_assoc();
    } else {
        die("Client not found."); // Stop script execution if client not found
    }
} else {
    die("Client ID not provided."); // Stop script execution if client_id parameter is not set
}
?>

<h2>Link Contacts to Client: <?php echo $client['name']; ?></h2>
<form action="link_contacts.php" method="post">
  <?php
  // Fetch all contacts from the database
  $contact_query = "SELECT * FROM contacts ORDER BY name ASC";
  $contact_result = $conn->query($contact_query);

  // Display the list of contacts with checkboxes to select
  if ($contact_result->num_rows > 0) {
      while ($contact = $contact_result->fetch_assoc()) {
          echo '<input type="checkbox" name="contacts[]" value="' . $contact['id'] . '"> ' . $contact['name'] . ' ' . $contact['surname'] . '<br>';
      }
      echo '<input type="hidden" name="client_id" value="' . $client_id . '">';
      echo '<input type="submit" value="Save">';
  } else {
      echo "No contacts found. Please create contacts first.";
  }
  ?>
</form>

<?php
// Process form submission
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["contacts"])) {
    // Sanitize and validate the input data
    $contacts = $_POST["contacts"];

    // Delete existing links for the client to avoid duplicate links
    $delete_query = "DELETE FROM client_contact_links WHERE client_id = $client_id";
    $conn->query($delete_query);

    // Insert the new links into the database
    if (!empty($contacts)) {
        foreach ($contacts as $contact_id) {
            $insert_query = "INSERT INTO client_contact_links (client_id, contact_id) VALUES ($client_id, $contact_id)";
            $conn->query($insert_query);
        }
    }

    echo "Contacts linked successfully.";
} elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
    echo "No contacts selected for linking.";
}
?>

</body>
</html>
