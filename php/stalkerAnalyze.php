<?php

function analyzeStalkers(){
    require 'conn.php';
    $query = $conn->query("
        SELECT * FROM follower
        WHERE likes < (SELECT AVG(likes) FROM follower) 
        AND comments < (SELECT AVG(comments) FROM follower)
        ORDER BY likes, comments;
    ");
    $stalkers = $query->fetch_all();
    
    $query->close();
    $conn->close();
    return $stalkers;
}


