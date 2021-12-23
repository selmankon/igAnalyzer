if (window.location.pathname == '/index.php' || window.location.pathname == '/' ) {
    $('#index-nav-item').parent().addClass('active');
}
else if (window.location.pathname == '/followers.php') {
    $('#followers-nav-item').parent().addClass('active');
}
else if (window.location.pathname == '/followings.php') {
    $('#followings-nav-item').parent().addClass('active');
}
else if (window.location.pathname == '/nonFollowings.php') {
    $('#non-followings-nav-item').parent().addClass('active');
}
else if (window.location.pathname == '/nonFollowers.php') {
    $('#non-followers-nav-item').parent().addClass('active');
}
else if (window.location.pathname == '/stalkers.php') {
    $('#stalkers-nav-item').parent().addClass('active');
}


