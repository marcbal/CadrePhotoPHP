<?php

class Users extends Table {
  public $user_password_hash;
  public $user_email;
  public $user_address = null;
  public $user_phone = null;

  public function __construct($user_email="",$user_password_hash="") {
    parent::__construct();
	$this->user_password_hash = $user_password_hash;
    $this->user_email = $user_email;
  }
  
}
