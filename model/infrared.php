<?php
   session_start();
   require_once 'vendor/autoload.php';
   use vendor/piphp/gpio/GPIO.php;
   use vendor/piphp/gpio/Pin/PinInterface.php;

   // Create a GPIO object
   $gpio = new GPIO();

   // Retrieve pin 4 and configure it as an output pin
   $ir_pin = $gpio->getOutputPin(4);

   // Turn IR LED pins on or off, for nightvision.
   if (!isset($_SESSION['ir_enabled']) {
      $ir_pin->setValue(PinInterface::VALUE_LOW);
   } else if ($_SESSION['ir_enabled'] == '0') {
      $ir_pin->setValue(PinInterface::VALUE_LOW);
   } else if ($_SESSION['ir_enabled'] === '1') {
      $ir_pin->setValue(PinInterface::VALUE_HIGH);
   }
 ?>
