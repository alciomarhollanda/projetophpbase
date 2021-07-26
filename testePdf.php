
<!-- 

1  -  https://getcomposer.org/download/


2  -  https://github.com/mpdf/mpdf 

    -- composer require mpdf/mpdf

3  -  PHP mbstring and gd extensions have to be loaded. 
    -- change php.ini

 -->

<?php
// Require composer autoload
require_once __DIR__ . '/vendor/autoload.php';
// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf();

// Write some HTML code:
$mpdf->WriteHTML('Hello World');

// Output a PDF file directly to the browser
$mpdf->Output();