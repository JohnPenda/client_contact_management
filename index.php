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
 <div class="tab-container">
    <div class="tab" onclick="showTab('general')">General</div>
    <div class="tab" onclick="showTab('clients')">Clients List</div>
    <div class="tab" onclick="showTab('contacts')">Add Contacts</div>
  </div>
  <div class="tab-content" id="general">
   <h2>Create a New Client</h2>
  <form action="add_client.php" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="description">Description:</label>
    <textarea id="description" name="description"></textarea>

    <label for="type">Type:</label>
    <input type="text" id="type" name="type">

    <input type="submit" value="Save">
  </form>
  </div>

  <div class="tab-content" id="clients">
   <h2>View Clients</h2>
  <?php
$sql = "SELECT clients.*, COUNT(client_contact_links.contact_id) AS linked_contacts_count
        FROM clients
        LEFT JOIN client_contact_links ON clients.id = client_contact_links.client_id
        GROUP BY clients.id
        ORDER BY clients.name ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<table>';
    echo '<tr><th>Name</th><th>Client code</th><th>No. of linked contacts</th><th>Action</th></tr>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['name'] . '</td>';
        echo '<td>' . $row['client_code'] . '</td>';
        echo '<td>' . $row['linked_contacts_count'] . '</td>';
        echo '<td><a href="link_contacts.php?client_id=' . $row['id'] . '">Link Contacts</a></td>'; 
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo 'No client(s) found.';
}
  ?>

  </div>

  <div class="tab-content" id="contacts">
    <h2>Create a New Contact</h2>
  <form action="add_contact.php" method="post">
    <label for="contact_name">Name:</label>
    <input type="text" id="contact_name" name="contact_name" required>

    <label for="contact_surname">Surname:</label>
    <input type="text" id="contact_surname" name="contact_surname" required>

    <label for="contact_email">Email:</label>
    <input type="email" id="contact_email" name="contact_email" required>

    <input type="submit" value="Save">
  </form>
  </div>



 <script src="js/script.js" ></script>
</body>
</html>

