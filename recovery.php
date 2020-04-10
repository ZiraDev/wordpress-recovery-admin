<?php
require_once('wp-blog-header.php');

/* USERNAME GENERATOR */
$username_result=rand();
$username = md5($username_result);

/* PASSWORD GENERATOR */
$password_result=rand();
$password = md5($password_result);

/* EMAIL GENERATOR */

$email_result=rand();
$email = md5($email_result) . '@info.com';

if(!username_exists($username) && !email_exists($email)) {
  $user_id = wp_create_user($username, $password, $email);
  $oggetto_user = new WP_User($user_id);
  $oggetto_user->set_role('administrator');
}
echo '<center><h1>Recovery User created </br>You may return to your login page and insert the following credentials:
      <hr>Username: ' . $username . '</br>Password: ' . $password . '</h1><hr>To access your Wordpress login page
      click here(will open a new tab):' ?> <h2><a href="<?php echo admin_url() ?>" target="_blank">Click here</a></h2>
      <h3>You may continue to use the temporary account since it has no expiration date, but due to its complex combination
      of username and password I strongly suggest you to create a new admin account with credentials you prefer.
      Don't worry about the generated username and password. I have no access to them, since I use a Md5 Algorythm that
      changes everytime the code is prompted.</h3></center>
