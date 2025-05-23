<?php
class evento {
  // Properties
  public $id;
  public $titolo;
  public $descrizione;
  public $data;
  public $luogo;
  public $numeroMassimo;
  public $hashtag;

  // Methods
  function set_name($name) {
    $this->name = $name;
  }
  function get_name() {
    return $this->name;
  }
}
?>