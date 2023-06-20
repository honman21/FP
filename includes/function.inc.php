<?php

function emptyInputSignup($email, $pwd, $rppwd) {
    $result;
  if (empty($email) || empty($pwd) || empty($rppwd)) {
    $result = true;
}
  else {
    $result = false;
}
  return $result;
}

function emptyInputlogin($email, $pwd) {
  $result;
  if (empty($email) || empty($pwd)) {
  $result = true;
}
else {
  $result = false;
}
return $result;
}

function invalidemail($email) {
  $result;
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $result = true;
}
else {
  $result = false;
}
return $result;
}

// function pwdlength($pwd, $rppwd) {
//   $result;
//   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//     $result = true;
//     // strlen($pwd, $rppwd) < 8)
// }
//   else {
//     $result = false;
// }
//   return $result;
// }

function pwdmatch($pwd, $rppwd) {
  $result;
  if ($pwd !== $rppwd) {
    $result = true;
  }
  
  else {
   $result = false;
  }
  return $result;
}

function klantExists($connect, $email) {
  $sql = "SELECT * FROM klant WHERE email = ?;";
  $stmt = mysqli_stmt_init($connect);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header ("location: ../demo/signupacc.php?error=stmtfailed");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($resultData)) {
    return $row;
  }

  else {
    $result = false;
    return $result;
  }
  header ("location: ../demo/signupacc.php?error=none");
  exit();

  mysqli_stmt_close($stmt);
}

function createKlant($connect, $email, $pwd) {
  $sql = "INSERT INTO klant (email, wachtwoord) VALUES (?,?);";
  $stmt = mysqli_stmt_init($connect);

  if (!mysqli_stmt_prepare( $stmt, $sql)) {
    header ("location: ../demo/signupacc.php?error=stmtfailed");
    exit();
  }

  $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);

  mysqli_stmt_bind_param($stmt, "ss", $email, $hashedpwd);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header ("location: ../demo/signupacc.php?error=none");
  exit();
}


function loginklant($connect, $email, $pwd) {
    $klantExists = klantExists($connect, $email, $email);

    if ($klantExists === false) {
          header ("location: ../../demo/login.php?error=wronglogin");
          exit();
    }

    $pwdhashed = $klantExists["wachtwoord"];
    $checkpwd = password_verify($pwd, $pwdhashed);

    if ($checkpwd === false) {
      header ("location: ../../demo/login.php?error=wronglogin");
      exit();
    }

    else if ($checkpwd === true) {
      session_start();
      $_SESSION["idklant"] = $klantExists["idklant"];
      $_SESSION["klant"] = $klantExists["email"];
      $_SESSION["voornaam"] = $klantExists["voornaam"];
      $_SESSION["tussenvoegsel"] = $klantExists["tussenvoegsel"];
      $_SESSION["achternaam"] = $klantExists["achternaam"];
      
      header ("location: ../../demo/index.php");
      exit();
    }
  }


  //medewerker

function createMedewerker($connect, $email, $pwd) {
  $sql = "INSERT INTO medewerker (email, wachtwoord) VALUES (?,?);";
  $stmt = mysqli_stmt_init($connect);

  if (!mysqli_stmt_prepare( $stmt, $sql)) {
    header ("location: ../../medewerker/signup.php?error=stmtfailed");
    exit();
  }
  
  $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);

  mysqli_stmt_bind_param($stmt, "ss", $email, $hashedpwd);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header ("location: ../../medewerker/signup.php?error=none");
  exit();
}

function MedewerkerExists($connect, $email) {
    $sql = "SELECT * FROM medewerker WHERE email = ?;";
    $stmt = mysqli_stmt_init($connect);
  
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header ("location: ../../medewerker/signup.php?error=stmtfailed");
      exit();
    }
  
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
  
    $resultData = mysqli_stmt_get_result($stmt);
  
    if ($row = mysqli_fetch_assoc($resultData)) {
      return $row;
    }
  
    else {
      $result = false;
      return $result;
    }
    header ("location: ../../medewerker/signup.php?error=none");
    exit();
  
    mysqli_stmt_close($stmt);
  }

function loginMedewerker($connect, $email, $pwd) {
    $MedewerkerExists = MedewerkerExists($connect, $email);

    if ($MedewerkerExists === false) {
          header ("location: ../../medewerker/signup.php?error=wronglogin");
          exit();
    }

    $pwdhashed = $MedewerkerExists["wachtwoord"];
    $checkpwd = password_verify($pwd, $pwdhashed);

    if ($checkpwd === false) {
      header ("location: ../../medewerker/signup.php?error=wronglogin");
      exit();
    }

    else if ($checkpwd === true) {
      session_start();
      $_SESSION["idmedewerker"] = $MedewerkerExists["idmedewerker"];
      $_SESSION["medewerker"] = $MedewerkerExists["email"];
      $_SESSION["klant"] = $klantExists["email"];
      $_SESSION["voornaam"] = $MedewerkerExists["voornaam"];
      $_SESSION["tussenvoegsel"] = $MedewerkerExists["tussenvoegsel"];
      $_SESSION["achternaam"] = $MedewerkerExists["achternaam"];
      
      header ("location: ../../demo/index.php");
      exit();
    }
  }


  //PRODUCTIMG

  function addproduct($connect, $naam, $omschrijving, $prijs, $image) {
    $sql = "INSERT INTO artikel (naam, omschrijving, prijs, `image`) VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($connect);
  
    if (!mysqli_stmt_prepare( $stmt, $sql)) {
      header ("location: ../../demo/signupacc.php?error=stmtfailed");
      exit();
    }
  }
  
  function emptyinput($naam, $omschrijving, $prijs, $image) {
    $result;
  if (empty($naam) || empty($omschrijving) || empty($prijs)|| empty($image)) {
    $result = true;
}
  else {
    $result = false;
}
  return $result;
}

// function imagefile($imagetype) {
//   $result;
// if ($imagetype == 'jpg' || $imagetype == 'png' || $imagetype == 'jpeg' ||$imagetype == 'gif') {
//   $result = true;
// }
// else {
//   $result = false;
// }
// return $result;
// }

// function fileexists($upload_file) {
//   $result;
//   if(fileexists($upload_file)) {
//     $result = true;
//   }
//   else {
//     $result = false;
// }
// return $result;
// }


//SHOPPINGCART



// if(isset($_POST['order_btn'])){

//   $voornaam = $_POST['voornaam'];
//   $telefoon = $_POST['telefoon'];
//   $email = $_POST['email'];
//   $method = $_POST['method'];
//   $street = $_POST['street'];
//   $plaats = $_POST['plaats'];
//   $postcode = $_POST['postcode'];

//   $cart_query = mysqli_query($connect, "SELECT * FROM `cart`");
//   $kosttotaal = 0;
//   if(mysqli_num_rows($cart_query) > 0){
//      while($product_item = mysqli_fetch_assoc($cart_query)){
//         $naam[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';
//         $product_price = number_format($product_item['price'] * $product_item['quantity']);
//         $kosttotaal += $product_price;
//      };
//   };

//   $total_product = implode(', ',$naam);
//   $detail_query = mysqli_query($connect, "INSERT INTO `order`(naam, telefoon, email, method, flat, street, plaats, state, country, postcode, total_products, total_price) VALUES('$name','$number','$email','$method','$flat','$street','$plaats','$state','$country','$postcode','$total_product','$kosttotaal')") or die('query failed');

//   if($cart_query && $detail_query){
//      echo "
//      <div class='order-message-container'>
//      <div class='message-container'>
//         <h3>thank you for shopping!</h3>
//         <div class='order-detail'>
//            <span>".$total_product."</span>
//            <span class='total'> total : $".$kosttotaal."/-  </span>
//         </div>
//         <div class='customer-details'>
//            <p> your name : <span>".$name."</span> </p>
//            <p> your telefoon : <span>".$telefoon."</span> </p>
//            <p> your email : <span>".$email."</span> </p>
//            <p> your address : <span>".$flat.", ".$street.", ".$plaats.", - ".$postcode."</span> </p>
//            <p> your payment mode : <span>".$method."</span> </p>
//            <p>(*pay when product arrives*)</p>
//         </div>
//            <a href='products.php' class='btn'>continue shopping</a>
//         </div>
//      </div>
//      ";
//   }

// }

//EDIT PROFILE GEGEVENS


   