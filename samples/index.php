<?php
namespace BG\Barcode;

include_once('../Base1DBarcode.php');
include_once('../Base2DBarcode.php');

use BG\Barcode\Base1DBarcode as BarCode1D;
use BG\Barcode\Base2DBarcode as BarCode2D;

$bc1d = new BarCode1D();
$bc2d = new BarCode2D();

$bc1d->savePath = $_SERVER['DOCUMENT_ROOT'].'/tmp/';
$bc2d->savePath = $bc1d->savePath;

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Barcode Samples 1D/2D</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="page-wrapper">

            <h1>2D BARCODES, ImageMode</h1>

            <div class="barcode-block">
                <h1>PDF417 2D Code</h1>
                <p>PDF417 (ISO/IEC 15438:2006)</p>
                <img src="/tmp/<?php echo $bc2d->getBarcodeFilenameFromGenPath($bc2d->getBarcodePNGPath('hello world!', 'pdf417', 'imageName', 2, 1.75)) ?>" alt="PDF417 barcode" title="PDF417 Barcode Image">
                <h2>hello world!</h2>
            </div>

            <div class="barcode-block">
                <h1>DATAMATRIX 2D Code</h1>
                <p>Datamatrix (ISO/IEC 16022)</p>
                <img src="/tmp/<?php echo $bc2d->getBarcodeFilenameFromGenPath($bc2d->getBarcodePNGPath('hello world!', 'datamatrix', 'imageName', 4, 4)) ?>" alt="DATAMATRIX barcode" title="DATAMATRIX Barcode Image">
                <h2>hello world!</h2>
            </div>

            <div class="barcode-block">
                <h1>QRCode 2D Code</h1>
                <p>QRCode, Basic</p>
                <img src="/tmp/<?php echo $bc2d->getBarcodeFilenameFromGenPath($bc2d->getBarcodePNGPath('hello world!', 'qrcode', 'imageName', 4, 4)) ?>" alt="qrcode barcode" title="qrcode Barcode Image">
                <h2>hello world!</h2>
            </div>

            <h1>1D BARCODES, ImageMode</h1>

            <div class="barcode-block">
                <h1>C39 Barcode</h1>
                <p>ANSI MH10.8M-1983 - USD3 - 3 of 9</p>
                <img src="/tmp/<?php echo $bc1d->getBarcodeFilenameFromGenPath($bc1d->getBarcodePNGPath('1234567', 'C39', 'imageName', 1.75, 45)) ?>" alt="C32 barcode" title="C32 Barcode Image">
                <h2>1234567</h2>
            </div>

            <div class="barcode-block">
                <h1>C39+ Barcode</h1>
                <p>ANSI MH10.8M-1983 - USD3 - 3 of 9, with checksum</p>
                <img src="/tmp/<?php echo $bc1d->getBarcodeFilenameFromGenPath($bc1d->getBarcodePNGPath('1234567', 'C39+', 'imageName', 1.75, 45)) ?>" alt="C32+ barcode" title="C32+ Barcode Image">
                <h2>1234567</h2>
            </div>

            <div class="barcode-block">
                <h1>C39E Barcode</h1>
                <p>ANSI MH10.8M-1983 - USD3 - 3 of 9, EXTENDED Version</p>
                <img src="/tmp/<?php echo $bc1d->getBarcodeFilenameFromGenPath($bc1d->getBarcodePNGPath('1234567', 'C39E', 'imageName', 1.75, 45)) ?>" alt="C32E barcode" title="C32E Barcode Image">
                <h2>1234567</h2>
            </div>

            <div class="barcode-block">
                <h1>C39E+ Barcode</h1>
                <p>ANSI MH10.8M-1983 - USD3 - 3 of 9, EXTENDED Version with checksum</p>
                <img src="/tmp/<?php echo $bc1d->getBarcodeFilenameFromGenPath($bc1d->getBarcodePNGPath('1234567', 'C39E+', 'imageName', 2, 45)) ?>" alt="C32E+ barcode" title="C32E+ Barcode Image">
                <h2>1234567</h2>
            </div>

            <div class="barcode-block">
                <h1>C93 Barcode</h1>
                <p>USS93</p>
                <img src="/tmp/<?php echo $bc1d->getBarcodeFilenameFromGenPath($bc1d->getBarcodePNGPath('1234567', 'C93', 'imageName', 2, 45)) ?>" alt="C93 barcode" title="C93 Barcode Image">
                <h2>1234567</h2>
            </div>

            <div class="barcode-block">
                <h1>S25 Barcode</h1>
                <p>Standard 2 of 5</p>
                <img src="/tmp/<?php echo $bc1d->getBarcodeFilenameFromGenPath($bc1d->getBarcodePNGPath('1234567', 'S25', 'imageName', 2, 45)) ?>" alt="S25 barcode" title="S25 Barcode Image">
                <h2>1234567</h2>
            </div>

            <div class="barcode-block">
                <h1>S25+ Barcode</h1>
                <p>Standard 2 of 5, with checksum</p>
                <img src="/tmp/<?php echo $bc1d->getBarcodeFilenameFromGenPath($bc1d->getBarcodePNGPath('1234567', 'S25+', 'imageName', 2, 45)) ?>" alt="S25+ barcode" title="S25+ Barcode Image">
                <h2>1234567</h2>
            </div>

            <div class="barcode-block">
                <h1>I25 Barcode</h1>
                <p>Interleaved 2 of 5</p>
                <img src="/tmp/<?php echo $bc1d->getBarcodeFilenameFromGenPath($bc1d->getBarcodePNGPath('1234567', 'I25', 'imageName', 2, 45)) ?>" alt="I25 barcode" title="I25 Barcode Image">
                <h2>1234567</h2>
            </div>

            <div class="barcode-block">
                <h1>I25+ Barcode</h1>
                <p>Interleaved 2 of 5, with checksum</p>
                <img src="/tmp/<?php echo $bc1d->getBarcodeFilenameFromGenPath($bc1d->getBarcodePNGPath('1234567', 'I25+', 'imageName', 2, 45)) ?>" alt="I25+ barcode" title="I25+ Barcode Image">
                <h2>1234567</h2>
            </div>

            <div class="barcode-block">
                <h1>C128 Barcode</h1>
                <p>CODE 128, native</p>
                <img src="/tmp/<?php echo $bc1d->getBarcodeFilenameFromGenPath($bc1d->getBarcodePNGPath('1234567', 'C128', 'imageName', 2, 45)) ?>" alt="C128 barcode" title="C128 Barcode Image">
                <h2>1234567</h2>
            </div>

            <div class="barcode-block">
                <h1>128 A Barcode</h1>
                <p>CODE 128 A</p>
                <img src="/tmp/<?php echo $bc1d->getBarcodeFilenameFromGenPath($bc1d->getBarcodePNGPath('1234567', 'C128A', 'imageName', 2, 45)) ?>" alt="C128A barcode" title="C128A Barcode Image">
                <h2>1234567</h2>
            </div>

            <div class="barcode-block">
                <h1>128 B Barcode</h1>
                <p>CODE 128 B</p>
                <img src="/tmp/<?php echo $bc1d->getBarcodeFilenameFromGenPath($bc1d->getBarcodePNGPath('1234567', 'C128B', 'imageName', 2, 45)) ?>" alt="C128B barcode" title="C128B Barcode Image">
                <h2>1234567</h2>
            </div>

            <div class="barcode-block">
                <h1>128 C Barcode</h1>
                <p>CODE 128 C</p>
                <img src="/tmp/<?php echo $bc1d->getBarcodeFilenameFromGenPath($bc1d->getBarcodePNGPath('20140200000057', 'imageName', 'C128C', 2, 45)) ?>" alt="C128C barcode" title="C128C Barcode Image">
                <h2>20140200000057</h2>
            </div>

            <div class="barcode-block">
                <h1>EAN2 Barcode</h1>
                <p>2-Digits UPC-Based Extention</p>
                <img src="/tmp/<?php echo $bc1d->getBarcodeFilenameFromGenPath($bc1d->getBarcodePNGPath('1234567', 'EAN2', 'imageName', 2, 45)) ?>" alt="EAN2 barcode" title="EAN2 Barcode Image">
                <h2>1234567</h2>
            </div>

            <div class="barcode-block">
                <h1>EAN2 Barcode</h1>
                <p>5-Digits UPC-Based Extention</p>
                <img src="/tmp/<?php echo $bc1d->getBarcodeFilenameFromGenPath($bc1d->getBarcodePNGPath('1234567', 'EAN5', 'imageName', 2, 45)) ?>" alt="EAN5 barcode" title="EAN5 Barcode Image">
                <h2>1234567</h2>
            </div>

            <div class="barcode-block">
                <h1>EAN8 Barcode</h1>
                <p>EAN 8 Product-Code</p>
                <img src="/tmp/<?php echo $bc1d->getBarcodeFilenameFromGenPath($bc1d->getBarcodePNGPath('1234567', 'EAN8', 'imageName', 2, 45)) ?>" alt="EAN8 barcode" title="EAN8 Barcode Image">
                <h2>1234567</h2>
            </div>

            <div class="barcode-block">
                <h1>EAN13 Barcode</h1>
                <p>EAN 13 Product-Code</p>
                <img src="/tmp/<?php echo $bc1d->getBarcodeFilenameFromGenPath($bc1d->getBarcodePNGPath('1234567', 'EAN13', 'imageName', 2, 45)) ?>" alt="EAN13 barcode" title="EAN13 Barcode Image">
                <h2>1234567</h2>
            </div>

            <div class="barcode-block">
                <h1>UPCA Barcode</h1>
                <p>UPC-A</p>
                <img src="/tmp/<?php echo $bc1d->getBarcodeFilenameFromGenPath($bc1d->getBarcodePNGPath('1234567', 'UPCA', 'imageName', 2, 45)) ?>" alt="UPCA barcode" title="UPCA Barcode Image">
                <h2>1234567</h2>
            </div>

            <div class="barcode-block">
                <h1>UPCE Barcode</h1>
                <p>UPC-E</p>
                <img src="/tmp/<?php echo $bc1d->getBarcodeFilenameFromGenPath($bc1d->getBarcodePNGPath('1234567', 'UPCE', 'imageName', 2, 45)) ?>" alt="UPCE barcode" title="UPCE Barcode Image">
                <h2>1234567</h2>
            </div>

            <div class="barcode-block">
                <h1>MSI Barcode</h1>
                <p>MSI (Variation of Plessey code)</p>
                <img src="/tmp/<?php echo $bc1d->getBarcodeFilenameFromGenPath($bc1d->getBarcodePNGPath('1234567', 'MSI', 'imageName', 2, 45)) ?>" alt="MSI barcode" title="MSI Barcode Image">
                <h2>1234567</h2>
            </div>

            <div class="barcode-block">
                <h1>MSI+ Barcode</h1>
                <p>MSI with checksum (modulo 11)</p>
                <img src="/tmp/<?php echo $bc1d->getBarcodeFilenameFromGenPath($bc1d->getBarcodePNGPath('1234567', 'MSI+', 'imageName', 2, 45)) ?>" alt="MSI+ barcode" title="MSI+ Barcode Image">
                <h2>1234567</h2>
            </div>

            <div class="barcode-block">
                <h1>POSTNET Barcode</h1>
                <p>POSTNET Barcode</p>
                <img src="/tmp/<?php echo $bc1d->getBarcodeFilenameFromGenPath($bc1d->getBarcodePNGPath('1234567', 'POSTNET', 'imageName', 2, 45)) ?>" alt="POSTNET barcode" title="POSTNET Barcode Image">
                <h2>1234567</h2>
            </div>

            <div class="barcode-block">
                <h1>PLANET Barcode</h1>
                <p>PLANET Barcode</p>
                <img src="/tmp/<?php echo $bc1d->getBarcodeFilenameFromGenPath($bc1d->getBarcodePNGPath('1234567', 'PLANET', 'imageName', 2, 45)) ?>" alt="PLANET barcode" title="PLANET Barcode Image">
                <h2>1234567</h2>
            </div>

            <div class="barcode-block">
                <h1>RMS4CC Barcode</h1>
                <p>RMS4CC (Royal Mail 4-state Customer Code) - CBC (Customer Bar Code)</p>
                <img src="/tmp/<?php echo $bc1d->getBarcodeFilenameFromGenPath($bc1d->getBarcodePNGPath('1234567', 'RMS4CC', 'imageName', 2, 45)) ?>" alt="RMS4CC barcode" title="RMS4CC Barcode Image">
                <h2>1234567</h2>
            </div>

            <div class="barcode-block">
                <h1>KIX Barcode</h1>
                <p> KIX (Klant index - Customer index)</p>
                <img src="/tmp/<?php echo $bc1d->getBarcodeFilenameFromGenPath($bc1d->getBarcodePNGPath('1234567', 'KIX', 'imageName', 2, 45)) ?>" alt="KIX barcode" title="KIX Barcode Image">
                <h2>1234567</h2>
            </div>

            <div class="barcode-block">
                <h1>IMB Barcode</h1>
                <p>Intelligent Mail Barcode - Onecode - USPS-B-3200</p>
                <img src="/tmp/<?php echo $bc1d->getBarcodeFilenameFromGenPath($bc1d->getBarcodePNGPath('1234567', 'IMB', 'imageName', 2, 45)) ?>" alt="IMB barcode" title="IMB Barcode Image">
                <h2>1234567</h2>
            </div>

            <div class="barcode-block">
                <h1>CODABAR Barcode</h1>
                <p>CODABAR Barcode</p>
                <img src="/tmp/<?php echo $bc1d->getBarcodeFilenameFromGenPath($bc1d->getBarcodePNGPath('1234567', 'CODABAR', 'imageName', 2, 45)) ?>" alt="CODABAR barcode" title="CODABAR Barcode Image">
                <h2>1234567</h2>
            </div>

            <div class="barcode-block">
                <h1>CODE11 Barcode</h1>
                <p>CODE11 Barcode</p>
                <img src="/tmp/<?php echo $bc1d->getBarcodeFilenameFromGenPath($bc1d->getBarcodePNGPath('1234567', 'CODE11', 'imageName', 2, 45)) ?>" alt="CODE11 barcode" title="CODE11 Barcode Image">
                <h2>1234567</h2>
            </div>

            <div class="barcode-block">
                <h1>PHARMA Barcode</h1>
                <p>PHARMACODE</p>
                <img src="/tmp/<?php echo $bc1d->getBarcodeFilenameFromGenPath($bc1d->getBarcodePNGPath('1234567', 'PHARMA', 'imageName', 2, 45)) ?>" alt="PHARMA barcode" title="PHARMA Barcode Image">
                <h2>1234567</h2>
            </div>

            <div class="barcode-block">
                <h1>PHARMA2T Barcode</h1>
                <p>PHARMACODE TWO-TRACKS</p>
                <img src="/tmp/<?php echo $bc1d->getBarcodeFilenameFromGenPath($bc1d->getBarcodePNGPath('1234567', 'PHARMA2T', 'imageName', 2, 45)) ?>" alt="PHARMA2T barcode" title="PHARMA2T Barcode Image">
                <h2>1234567</h2>
            </div>

        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>

    </body>
</html>
