<?php
  function isLogged() {
    $ci =& get_instance();
    return $ci->session->userdata('logged');
  }

  function getUserId() {
    $ci =& get_instance();
    return $ci->session->userdata('userid');
  }

  function getUserName() {
    $ci =& get_instance();
    return $ci->session->userdata('username');
  }

  function getUserLogin() {
    $ci =& get_instance();
    return $ci->session->userdata('userlogin');
  }

  function friendlyDate($date) {
    return date('d/m/Y H:i:s', strtotime($date));
  }
?>
