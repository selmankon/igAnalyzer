<?php
include('conn.php');

// Followers Select Query
$query = $conn->query("
    SELECT id, picture, name, username, likes, comments
    FROM follower
    ORDER BY likes DESC, comments DESC
");
$followers = $query->fetch_all();

// Followings Select Query
$query = $conn->query("
    SELECT id, picture, name, username
    FROM following
");
$followings = $query->fetch_all();

// Non Followers Select Query
$query = $conn->query("
    SELECT id, picture, name, username
    FROM following
    WHERE id NOT IN (
        SELECT id 
        FROM follower 
    )
");
$nonFollowers = $query->fetch_all();

// Non Followings Select Query
$query = $conn->query("
    SELECT id, picture, name, username
    FROM follower
    WHERE id NOT IN (
        SELECT id 
        FROM following 
    )
");
$nonFollowings = $query->fetch_all();

// Mutual Followings Select Query
$query = $conn->query("
    SELECT id, picture, username, name
    FROM follower
    WHERE id IN (
        SELECT id 
        FROM following 
    )
");
$mutualFollowings = $query->fetch_all();

// Potential Stalkers Select Query
$query = $conn->query("
    SELECT id, picture, username, name, likes, comments
    FROM stalker
    ORDER BY likes, comments
");
$stalkers = $query->fetch_all();

// Months Select Query
$query = $conn->query("
    SELECT month, followers
    FROM months
");
$monthsQuery = $query->fetch_all(); 


$query->close();