// Redirect the user back to the login page after the login failed, and add a $_GET parameter to let us know. Courtesy of WordPressFlow.com
add_action( 'wp_login_failed', 'elementor_form_login_fail', 9999999 );
function elementor_form_login_fail( $username ) {
    $referrer = $_SERVER['HTTP_REFERER'];  // where did the post submission come from?
    // if there's a valid referrer, and it's not the default log-in screen
    if ((!empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') )) {
        //redirect back to the referrer page, appending the login=failed parameter and removing any previous query strings
        //maybe could be smarter here and parse/rebuild the query strings from the referrer if they are important
        wp_redirect(preg_replace('/\?.*/', '', $referrer) . '/?login=failed' );
        exit;
    }
}

// This is also important. Make sure that the redirect still runs if the username and/or password are empty.
add_action( 'wp_authenticate', 'elementor_form_login_empty', 1, 2 );
function elementor_form_login_empty( $username, $pwd ) {
    $referrer = $_SERVER['HTTP_REFERER'];  // where did the post submission come from?
 if ( empty( $username ) || empty( $pwd ) ) {
    if ((!strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') )) {
        //redirect back to the referrer page, appending the login=failed parameter and removing any previous query strings
        //maybe could be smarter here and parse/rebuild the query strings from the referrer if they are important
        wp_redirect(preg_replace('/\?.*/', '', $referrer) . '/?login=failed' );
        exit;
    }
   exit();
 }
}
