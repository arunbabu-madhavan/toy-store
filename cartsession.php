<?php
  //implement add/remove item from cart
  session_start();

  //the cartItems is an array of objects. Not associative array.
  if(isset($_POST["cartItem"])  && isset($_POST["operation"]))
  {

      $cartItem = json_decode($_POST["cartItem"] );
      $operation = $_POST["operation"];
      $cartItems = empty($_SESSION['cartItems']) ? array() : $_SESSION['cartItems'] ;
      $qty =  isset($_POST["updateQty"]) ? $_POST["updateQty"]  : 1;

      if($operation == 1) //ADD
      {
          $itemExists = false;

          for($i=0;$i<count($cartItems);$i++){
              if($cartItems[$i]->ID == $cartItem->ID)
                  {
                    $cartItems[$i]->qty = $cartItems[$i]->qty + $qty;
                    $itemExists = true;
                  }
          }
          if(!$itemExists)
              $cartItems[] = $cartItem;

      }
      else if($operation == 2)//REMOVE
      {
          for($i=0;$i<count($cartItems);$i++){
              if($cartItems[$i]->ID == $cartItem->ID)
                    {
                  $cartItems[$i]->qty = $cartItems[$i]->qty - $qty;
                  if($cartItems[$i]->qty == 0)
                  {
                      array_splice($cartItems, $i, 1);
                  }
              }
          }
      }

      $_SESSION['cartItems'] =  $cartItems;
  }
  else{
      $cartItems = empty($_SESSION['cartItems']) ? array() : $_SESSION['cartItems'] ;
      echo json_encode($cartItems);
  }

?>