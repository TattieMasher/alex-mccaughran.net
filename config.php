<?php
// Page array to store the textual reference to navbar pages and the corresponsing URLs
$pages = array(
    'Home' => 'index.php',
    'About' => 'about.php',
    'Projects' => 'projects.php',
    'Contact' => 'contact.php'
);

$current_page = basename($_SERVER['PHP_SELF'], '.php');
?>