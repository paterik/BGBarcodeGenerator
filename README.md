BGBarcodeGenerator Class
========================

PHP5+ refactored code version of Dinesh Rabara's 2D-3D Barcode Generator class/lib. This barcode generator class supports ImageMagick/GDLib based image rendering, svg and html table drawn output of the following 1D/2D bar codes:
Due to some licensing problems of origin pre-refactored code base we've to decide to change the base license from MIT to GNU-LGPLv3. You can found the TCPDF source license under LICENSE.TCPDF and the current (project) license under LICENSE

[![Build Status](https://travis-ci.org/paterik/BGBarcodeGenerator.png?branch=master)](https://travis-ci.org/paterik/BGBarcodeGenerator)

1D barcodes
-----------

* C39 : CODE 39 - ANSI MH10.8M-1983 - USD-3 - 3 of 9.
* C39+ : CODE 39 with checksum
* C39E : CODE 39 EXTENDED
* C39E+ : CODE 39 EXTENDED + CHECKSUM
* C93 : CODE 93 - USS-93
* S25 : Standard 2 of 5
* S25+ : Standard 2 of 5 + CHECKSUM
* I25 : Interleaved 2 of 5
* I25+ : Interleaved 2 of 5 + CHECKSUM
* C128 : CODE 128
* C128A : CODE 128 A
* C128B : CODE 128 B
* C128C : CODE 128 C
* EAN2 : 2-Digits UPC-Based Extention
* EAN5 : 5-Digits UPC-Based Extention
* EAN8 : EAN 8
* EAN13 : EAN 13
* UPCA : UPC-A
* UPCE : UPC-E
* MSI : MSI (Variation of Plessey code)
* MSI+ : MSI + CHECKSUM (modulo 11)
* POSTNET : POSTNET
* PLANET : PLANET
* RMS4CC : RMS4CC (Royal Mail 4-state Customer Code) - CBC (Customer Bar Code)
* KIX : KIX (Klant index - Customer index)
* IMB: Intelligent Mail Barcode - Onecode - USPS-B-3200
* CODABAR : CODABAR
* CODE11 : CODE 11
* PHARMA : PHARMACODE
* PHARMA2T : PHARMACODE TWO-TRACKS

2D barcodes
-----------
* DATAMATRIX : Datamatrix (ISO/IEC 16022)
* PDF417 : PDF417 (ISO/IEC 15438:2006) / a,e,t,s,f,o0,o1,o2,o3,o4,o5,o6
* QRCODE : QRcode Low error correction
* QRCODE, L : QRcode Low error correction
* QRCODE, M : QRcode Medium error correction
* QRCODE, Q : QRcode Better error correction
* QRCODE, H : QR-CODE Best error correction
* QR, RAW : raw mode - comma-separad list of array rows
* QR, RAW2 : raw mode - array rows are surrounded by square parenthesis.

How To Contribute
-----------------
To contribute changes, fixes, additions/features please open a pull request with your new code. please take not, that if you add new features or modify existing ones you have to doc this in projects README file (also update projects CHANGELOG file!)

License
-------
See: LICENSE

Credits
-------
just another fork of Dinesh Rabara's 2D-3D Barcode Generator class on any open questions or problems feel free to contact me directly or just open an issue ...