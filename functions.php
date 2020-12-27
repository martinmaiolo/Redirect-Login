// Redirect Registration Page
function my_registration_page_redirect()
{
    global $pagenow;
 
    if ( ( strtolower($pagenow) == 'wp-login.php') && ( strtolower( $_GET['action']) == 'register' ) ) {
        wp_redirect( home_url('/registration'));
    }
}
 
add_filter( 'init', 'my_registration_page_redirect' );



// Redirect Password Page
function my_password_page_redirect()
{
    global $pagenow;
 
    if ( ( strtolower($pagenow) == 'wp-login.php') && ( strtolower( $_GET['action']) == 'lostpassword' ) ) {
        wp_redirect( home_url('/lost-password'));
    }
}
 
add_filter( 'init', 'my_password_page_redirect' );
