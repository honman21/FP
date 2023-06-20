<?php
include_once '../demo/config.php';
include_once '../includes/function.inc.php';
include_once '../demo/header.php';

?>

<section class="updateprofile">
        <H2>Update Profiel</H2>
        <form action="../includes/profile.inc.php" method="POST">
          <input type="text" name="email" placeholder="Email" >
          <br>
          <input type="password" name="pwd" placeholder="Wachtwoord" >
          <br>
          <button type="submit" name="update">Update</button>
        </form>