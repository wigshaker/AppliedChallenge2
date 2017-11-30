<?php
   session_start();
   include vendor/piphp/gpio/src/GPIO.php;
   include vendor/piphp/gpio/src/Pin/PinInterface.php;

   // Create a GPIO object
   $gpio = new GPIO();

   // Retrieve pin 18 and configure it as an output pin
   $ir_pin = $gpio->getOutputPin(4);

   // Set the value of the pin high or low (turn it on or off)
   if (!isset($_SESSION['ir_enabled']) {
      $ir_pin->setValue(PinInterface::VALUE_LOW);
   } else if ($_SESSION['ir_enabled'] == '0') {
      $ir_pin->setValue(PinInterface::VALUE_LOW);
   } else if ($_SESSION['ir_enabled'] === '1') {
      $ir_pin->setValue(PinInterface::VALUE_HIGH);
   }

 ?>
