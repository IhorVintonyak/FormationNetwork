<?php
class utente {
  // Properties
  public $id;
  public $nome;
  public $email;
  public $password;
  public $tipo;

  // Methods
  function set_name($name) {
    $this->name = $name;
  }
  function get_name() {
    return $this->name;
  }
}
?>