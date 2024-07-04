<?php

$current_user = wp_get_current_user();
if( $current_user->exists() ){
	// Авторизован.

  $user_login =  $current_user->user_login;
  $user_email =  $current_user->user_email;
  $user_firstname =  $current_user->user_firstname;
  $user_lastname =  $current_user->user_lastname;
  $user_display_name =  $current_user->display_name;
  $user_id =  $current_user->ID;

}
?>
<head>


<?php
wp_head();

?>
</head>

<body>

