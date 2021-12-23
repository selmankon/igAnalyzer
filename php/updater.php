<?php
require('db.php');
require('stalkerAnalyze.php');

function updateAll(){   // Let the sparks fly.
    updateFollowersDB();
    updateFollowingsDB();

    updateLikesAndCommentsDB();
    updatePictures();

    updateMonth();  // Updates only current month
    
    $stalkers = analyzeStalkers();
    updateStalkersDB($stalkers);
    
    $conn = $GLOBALS['conn'];
    $conn->close();
}

function updatePictures(){
    require('queries.php');
    
    foreach ($followers as $user) {
        $id         = $user[0];
        $pictureUrl = $user[1];

        $imageData = base64_encode(file_get_contents($pictureUrl));
        $image = base64ToJpeg($imageData,'img/'.$id.'.jpeg');
    }
    foreach ($notFollowers as $user) {
        $id         = $user[0];
        $pictureUrl = $user[1];

        $imageData = base64_encode(file_get_contents($pictureUrl));
        $image = base64ToJpeg($imageData,'img/'.$id.'.jpeg');
    }
}

function base64ToJpeg($base64_string, $output_file) {
    $ifp = fopen($output_file, 'wb'); 

    // Split the string on commas
    $data = explode(',', $base64_string);

    fwrite($ifp, base64_decode($data[0]));
    fclose($ifp); 

    return $output_file; 
}



function shutDownFunction() {
    // For Response code 429. 
    // Response's body: message => rate limited; status => fail; Something went wrong.
    // It means you cant get data from Instagram until next day.

    $error = error_get_last();
    if (@$error['type'] === E_ERROR) {
        echo '<script>alert("Günlük veri yenileme limitini doldurdunuz.")</script>;';
        header('Location: /index.php');
        die();
    }
}
register_shutdown_function('shutDownFunction');