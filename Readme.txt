# client_contact_management System

## Description

This is a PHP and MySQL project called client_contact_management System that provides a Client-Contact Management System. The system allows users to manage clients and their linked contacts. Clients and contacts can be created, updated, and linked together.

## Features

- Create, read, update, and delete (CRUD) operations for clients and contacts.
- Linking contacts to clients to establish relationships between them.
- Generate unique client codes based on the provided rules in the project requirements.
- Display a list of clients ordered by name with the number of linked contacts for each client.
- Display a list of contacts ordered by full name with the number of linked clients for each contact.

## Requirements

- PHP 
- MySQL 
- Apache
- Web browser

## Installation

1. Download the ZIP file.
2. Extract the files to your web server's root directory.
3. Create a MySQL database and import the database "client_contact_management_system.sql" file.
4. Update the database connection details in `DB_Connect.php` to match your MySQL credentials.

## Usage

1. Access the application by navigating to the project's URL using a web browser.
2. The homepage displays a list of clients and contacts.
3. Click on the General tab to Create Client or Click on Contact tab Create Contact.
4. To link contacts to a client, click on the "Link Contacts" button next to the client's name.
5. Check the checkboxes next to the contacts you want to link and click "Save."

