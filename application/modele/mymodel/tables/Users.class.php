<?php

class Users extends Table {
  public $user_password_hash;
  public $user_email;

  public function __construct($user_email="",$user_password_hash="") {
    parent::__construct();
    $this->user_email = $user_email;
    $this->user_password_hash = $user_password_hash;
  }
  
}
