<?php
   session_start();
   // require_once 'vendor/autoload.php';
   // use PiPHP\GPIO\GPIO;
   // use PiPHP\GPIO\Pin\OutputPinInterface;
   //
   // // Create a GPIO object
   // $gpio = new GPIO();
   //
   // // Retrieve pin 4 and configure it as an output pin
   // $ir_pin = $gpio->getOutputPin(4);

   // Turn IR LED pins on or off, for nightvision.
   try {
      if (!isset($_SESSION['ir_enabled']) {
         system ( "gpio -g write 0 0" );
      } else if ($_SESSION['ir_enabled'] == '0') {
         system ( "gpio -g write 0 0" );
      } else if ($_SESSION['ir_enabled'] === '1') {
         system ( "gpio -g write 0 1" );
      }
   } catch (Exception $e) {
      $error_message = $e->getMessage();
      include('view/error.php');
      exit();
   }

?>
