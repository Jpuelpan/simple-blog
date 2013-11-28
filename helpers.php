<?php 

# Check if there is a user logged in
function user_signed_in(){
  return session('authenticated');
}

# Get the current user data
function current_user(){
  if( user_signed_in() ){
    return User::find(session('user_id'));
  }else{
    return false;
  }
}

?>