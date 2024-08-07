<!--
	author: Andres Julian Rivera Ariza, haebin yoon, Johann Kenric See 
	date: 2024-08-01
	file name: db.php
	description: This file is used to connect to the database.
-->

<?php
    session_start();

    header('Content-Type: text/html; charset=utf-8');

    $db = new mysqli('localhost', 'acfwdb', 'acfwdb', 'acfwdb');
    $db->set_charset('utf8');

    function query($sql) {
        global $db;
        return $db->query($sql);
    }
?>