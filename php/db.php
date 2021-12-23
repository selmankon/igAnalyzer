<?php
require('conn.php');       // DB credentials and connection
require('instagram.php');  // IG credentials and connection

function clearDBs(){
    $conn = $GLOBALS['conn'];
    $query = $conn->query("TRUNCATE `iganalyzer`.`follower`");
    $query = $conn->query("TRUNCATE `iganalyzer`.`following`");
    $query = $conn->query("TRUNCATE `iganalyzer`.`stalker`");
}

function updateFollowersDB($count=1000){
    $conn = $GLOBALS['conn'];

    $arrayClient = newInstagramClient();
    $instagram = $arrayClient[0];
    $account   = $arrayClient[1];

    // Get $count followings, 100 a time with random delay between requests
    $followers      = $instagram->getFollowers($account->getId(), $count, 100, true); 

    foreach ($followers as $follower){ 
        $query = $conn->prepare("
            INSERT INTO follower
                (id, picture, name, username) 
            VALUES 
                (?, ?, ?, ?)
        ");
        $query->bind_param(
            'ssss', 
            $follower['id'], 
            $follower['profile_pic_url'], 
            $follower['full_name'], 
            $follower['username'], 
        );
        $query->execute();
        $query->close();
    } 
    
}

function updateLikesAndCommentsDB($mediaCount=500,$commentCount=10000,$likeCount=1000000){
    $conn = $GLOBALS['conn'];
    
    $arrayClient = newInstagramClient();
    $instagram = $arrayClient[0];

    // Get $count medias
    $medias = $instagram->getMedias('liiis4ma', $mediaCount);

    foreach ($medias as $media){
        $mediaShortCode = $media->getShortCode();

        $comments = $instagram->getMediaCommentsByCode($mediaShortCode, $commentCount);
        foreach ($comments as $comment) {
            $userId = $comment->getOwner()->getId();
            $query = $conn->prepare("
                UPDATE follower 
                SET comments = comments + 1 
                WHERE id = ?
            ");
            $query->bind_param(
                's', 
                $userId
            );
            $query->execute();
            $query->close();
        }

        $likes = $instagram->getMediaLikesByCode($mediaShortCode, $likeCount);
        foreach ($likes as $like) {
            $userId = $like->getId();
            $query = $conn->prepare("
                UPDATE follower 
                SET likes = likes + 1 
                WHERE id = ?
            ");
            $query->bind_param(
                's', 
                $userId
            );
            $query->execute();
            $query->close();
        }
    }
}

function updateFollowingsDB($count=1000){
    $conn = $GLOBALS['conn'];

    $arrayClient = newInstagramClient();
    $instagram = $arrayClient[0];
    $account   = $arrayClient[1];

    // Get $count followings, 100 a time with random delay between requests
    $followings = $instagram->getFollowing($account->getId(), $count, 100, true);     
    $followings = $followings["accounts"];

    foreach($followings as $following) { 
        $query = $conn->prepare("
            INSERT INTO following
                (id, picture, name, username)
            VALUES 
                (?, ?, ?, ?)
        ");
        $query->bind_param(
            'ssss',
            $following['id'], 
            $following['profile_pic_url'], 
            $following['full_name'], 
            $following['username']
        );
        
        $query->execute();
        $query->close();
    }
}

function updateStalkersDB($stalkers){
    $conn = $GLOBALS['conn'];

    foreach ($stalkers as $stalker) {
        $id       = $stalker[0];
        $picture  = $stalker[1];
        $name     = $stalker[2];
        $username = $stalker[3];
        $likes    = intval($stalker[4]);
        $comments = intval($stalker[5]);

        $query = $conn->prepare("
            INSERT INTO stalker
                (id, picture, name, username, likes, comments) 
            VALUES 
                (?, ?, ?, ?, ?, ?);
        ");
        $query->bind_param(
            'ssssdd', 
            $id, 
            $picture, 
            $name, 
            $username,
            $likes,
            $comments
        );
        $query->execute();
    }
    $query->close();
}

function updateMonth(){
    require('queries.php');
    $conn = $GLOBALS['conn'];

    $currentMonth = date('m');
    $query = $conn->query("
        UPDATE aylar 
        SET followers =".count($followers)."
        WHERE month = ".$currentMonth."
    ");
}
