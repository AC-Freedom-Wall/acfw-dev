<?php
    session_start();

    header('Content-Type: text/html; charset=utf-8');

    $db = new mysqli('localhost', 'acfwdb', 'acfwdb', 'bbs');
    $db->set_charset('utf8');

    function query($sql) {
        global $db;
        return $db->query($sql);
    }
?>