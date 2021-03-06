<?php

/*
 * This file is part of the bitgrave barcode library based on forked version of Dinesh Rabara 2D-3D Barcode
 * Generator class/lib (https://github.com/dineshrabara/2D-3D-Barcodes-Generator)
 *
 * BGBarcodeGenerator-1.0.0
 * master/dev branch: https://github.com/paterik/BGBarcodeGenerator
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BG\Barcode\tests;

require(__DIR__.'/../Base1DBarcode.php');
require(__DIR__.'/../Base2DBarcode.php');

use BG\Barcode\Base1DBarcode as barCode;
use BG\Barcode\Base2DBarcode as matrixCode;

/**
 * Class BarcodeBaseTest
 *
 * @package BG\BarcodeBundle
 * @author  Patrick Paechnatz <patrick.paechnatz@gmail.com>
 */
class BarcodeBaseTest extends \PHPUnit_Framework_TestCase
{

    const C_BC_DEFAULT = '1234567';
    const C_BC_EAN2 = '05';
    const C_BC_EAN5 = '12345';
    const C_BC_EAN8 = '40123455';
    const C_BC_EAN13 = '501234567890';
    const C_BC_UPCA = '501234567890';
    const C_BC_UPCE = '127890';
    const C_BC_IS25 = '74380707240152655700';
    const C_BC_C128C = '20140200000057';
    const C_MC_DEFAULT = 'BGBarcodeBundle';

    const C_BC_1D_HEIGHT = 45;
    const C_BC_1D_WIDTH = 1.75;

    const C_MC_2D_HEIGHT = 2;
    const C_MC_2D_WIDTH = 2;

    const C_TMP_PATH = '/tmp/';

    /**
     * gdlib or imagemagic availability check
     */
    public function testImageRenderer()
    {
        $checkCondition = function_exists('imagecreate') || class_exists('imagick');
        $this->assertTrue($checkCondition, 'neither GDlib nor ImageMagick extension found, you\'ve to install on of both to use BGBarcodeGenerator lib.');
    }

    /**
     * C39 Barcode PNG rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodePNGPath();
     */
    public function testC39GetBarcodePNGPath()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;
        $bcPathAbs = $d1->getBarcodePNGPath(self::C_BC_DEFAULT, 'C39', null, self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);

        if (function_exists('imagecreate')) {
            $checkCondition = (file_exists($bcPathAbs)) && (filesize($bcPathAbs) === 144);
        } else {
            $checkCondition = (file_exists($bcPathAbs)) ? true : false;
        }

        $this->assertTrue($checkCondition);
    }

    /**
     * C39 Barcode HTML table rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodeHTML();
     */
    public function testC39GetBarcodeHTMLRaw()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcHTMLRaw = $d1->getBarcodeHTML(self::C_BC_DEFAULT, 'C39', self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);
        $bcCheckArray = explode('background-color:black', $bcHTMLRaw);

        $this->assertTrue(count($bcCheckArray)===46);
    }


    /**
     * C39E Barcode PNG rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodePNGPath();
     */
    public function testC39EGetBarcodePNGPath()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcPathAbs = $d1->getBarcodePNGPath(self::C_BC_DEFAULT, 'C39E', null, self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);

        if (function_exists('imagecreate')) {
            $checkCondition = (file_exists($bcPathAbs)) && (filesize($bcPathAbs) === 144);
        } else {
            $checkCondition = (file_exists($bcPathAbs)) ? true : false;
        }

        if ($bcPathAbs!==false) unlink($bcPathAbs);

        $this->assertTrue($checkCondition);
    }

    /**
     * C39E Barcode HTML table rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodeHTML();
     */
    public function testC39EGetBarcodeHTMLRaw()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcHTMLRaw = $d1->getBarcodeHTML(self::C_BC_DEFAULT, 'C39E', self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);
        $bcCheckArray = explode('background-color:black', $bcHTMLRaw);

        $this->assertTrue(count($bcCheckArray)===46);
    }

    /**
     * C39+ Barcode PNG rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodePNGPath();
     */
    public function testC39PlusGetBarcodePNGPath()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcPathAbs = $d1->getBarcodePNGPath(self::C_BC_DEFAULT, 'C39+', null, self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);

        if (function_exists('imagecreate')) {
            $checkCondition = (file_exists($bcPathAbs)) && (filesize($bcPathAbs) === 150);
        } else {
            $checkCondition = (file_exists($bcPathAbs)) ? true : false;
        }

        if ($bcPathAbs!==false) unlink($bcPathAbs);

        $this->assertTrue($checkCondition);
    }

    /**
     * C39+ Barcode HTML table rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodeHTML();
     */
    public function testC39PlusGetBarcodeHTMLRaw()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcHTMLRaw = $d1->getBarcodeHTML(self::C_BC_DEFAULT, 'C39+', self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);
        $bcCheckArray = explode('background-color:black', $bcHTMLRaw);

        $this->assertTrue(count($bcCheckArray)===51);
    }

    /**
     * C93 Barcode PNG rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodePNGPath();
     */
    public function testC93PlusGetBarcodePNGPath()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcPathAbs = $d1->getBarcodePNGPath(self::C_BC_DEFAULT, 'C93', null, self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);

        if (function_exists('imagecreate')) {
            $checkCondition = (file_exists($bcPathAbs)) && (filesize($bcPathAbs) === 130);
        } else {
            $checkCondition = (file_exists($bcPathAbs)) ? true : false;
        }

        if ($bcPathAbs!==false) unlink($bcPathAbs);

        $this->assertTrue($checkCondition);
    }

    /**
     * C39+ Barcode HTML table rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodeHTML();
     */
    public function testC93PlusGetBarcodeHTMLRaw()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcHTMLRaw = $d1->getBarcodeHTML(self::C_BC_DEFAULT, 'C93', self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);
        $bcCheckArray = explode('background-color:black', $bcHTMLRaw);

        $this->assertTrue(count($bcCheckArray)===35);
    }

    /**
     * S25 Barcode PNG rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodePNGPath();
     */
    public function testS25GetBarcodePNGPath()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcPathAbs = $d1->getBarcodePNGPath(self::C_BC_DEFAULT, 'S25', null, self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);

        if (function_exists('imagecreate')) {
            $checkCondition = (file_exists($bcPathAbs)) && (filesize($bcPathAbs) === 139);
        } else {
            $checkCondition = (file_exists($bcPathAbs)) ? true : false;
        }

        if ($bcPathAbs!==false) unlink($bcPathAbs);

        $this->assertTrue($checkCondition);
    }

    /**
     * C39+ Barcode HTML table rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodeHTML();
     */
    public function testS25GetBarcodeHTMLRaw()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcHTMLRaw = $d1->getBarcodeHTML(self::C_BC_DEFAULT, 'S25', self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);
        $bcCheckArray = explode('background-color:black', $bcHTMLRaw);

        $this->assertTrue(count($bcCheckArray)===47);
    }

    /**
     * I25 Barcode PNG rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodePNGPath();
     */
    public function testI25GetBarcodePNGPath()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcPathAbs = $d1->getBarcodePNGPath(self::C_BC_DEFAULT, 'I25', null, self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);

        if (function_exists('imagecreate')) {
            $checkCondition = (file_exists($bcPathAbs)) && (filesize($bcPathAbs) === 120);
        } else {
            $checkCondition = (file_exists($bcPathAbs)) ? true : false;
        }

        if ($bcPathAbs!==false) unlink($bcPathAbs);

        $this->assertTrue($checkCondition);
    }

    /**
     * I25 Barcode HTML table rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodeHTML();
     */
    public function testI25GetBarcodeHTMLRaw()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcHTMLRaw = $d1->getBarcodeHTML(self::C_BC_DEFAULT, 'I25', self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);
        $bcCheckArray = explode('background-color:black', $bcHTMLRaw);

        $this->assertTrue(count($bcCheckArray)===25);
    }

    /**
     * I25+ Barcode PNG rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodePNGPath();
     */
    public function testI25PlusGetBarcodePNGPath()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcPathAbs = $d1->getBarcodePNGPath(self::C_BC_DEFAULT, 'I25+', null, self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);

        if (function_exists('imagecreate')) {
            $checkCondition = (file_exists($bcPathAbs)) && (filesize($bcPathAbs) === 120);
        } else {
            $checkCondition = (file_exists($bcPathAbs)) ? true : false;
        }

        if ($bcPathAbs!==false) unlink($bcPathAbs);

        $this->assertTrue($checkCondition);
    }

    /**
     * I25 Barcode HTML table rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodeHTML();
     */
    public function testI25PlusGetBarcodeHTMLRaw()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcHTMLRaw = $d1->getBarcodeHTML(self::C_BC_DEFAULT, 'I25+', self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);
        $bcCheckArray = explode('background-color:black', $bcHTMLRaw);

        $this->assertTrue(count($bcCheckArray)===25);
    }

    /**
     * C128 (native) Barcode PNG rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodePNGPath();
     */
    public function testC128GetBarcodePNGPath()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcPathAbs = $d1->getBarcodePNGPath(self::C_BC_DEFAULT, 'C128', null, self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);

        if (function_exists('imagecreate')) {
            $checkCondition = (file_exists($bcPathAbs)) && (filesize($bcPathAbs) === 128);
        } else {
            $checkCondition = (file_exists($bcPathAbs)) ? true : false;
        }

        if ($bcPathAbs!==false) unlink($bcPathAbs);

        $this->assertTrue($checkCondition);
    }

    /**
     * C128 (native) Barcode HTML table rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodeHTML();
     */
    public function testC128GetBarcodeHTMLRaw()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcHTMLRaw = $d1->getBarcodeHTML(self::C_BC_DEFAULT, 'C128', self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);
        $bcCheckArray = explode('background-color:black', $bcHTMLRaw);

        $this->assertTrue(count($bcCheckArray)===28);
    }

    /**
     * C128 (A) Barcode PNG rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodePNGPath();
     */
    public function testC128AGetBarcodePNGPath()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcPathAbs = $d1->getBarcodePNGPath(self::C_BC_DEFAULT, 'C128A', null, self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);

        if (function_exists('imagecreate')) {
            $checkCondition = (file_exists($bcPathAbs)) && (filesize($bcPathAbs) === 135);
        } else {
            $checkCondition = (file_exists($bcPathAbs)) ? true : false;
        }

        if ($bcPathAbs!==false) unlink($bcPathAbs);

        $this->assertTrue($checkCondition);
    }

    /**
     * C128 (A) Barcode HTML table rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodeHTML();
     */
    public function testC128AGetBarcodeHTMLRaw()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcHTMLRaw = $d1->getBarcodeHTML(self::C_BC_DEFAULT, 'C128', self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);
        $bcCheckArray = explode('background-color:black', $bcHTMLRaw);

        $this->assertTrue(count($bcCheckArray)===28);
    }

    /**
     * C128 (B) Barcode PNG rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodePNGPath();
     */
    public function testC128BGetBarcodePNGPath()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcPathAbs = $d1->getBarcodePNGPath(self::C_BC_DEFAULT, 'C128B', null, self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);

        if (function_exists('imagecreate')) {
            $checkCondition = (file_exists($bcPathAbs)) && (filesize($bcPathAbs) === 135);
        } else {
            $checkCondition = (file_exists($bcPathAbs)) ? true : false;
        }

        if ($bcPathAbs!==false) unlink($bcPathAbs);

        $this->assertTrue($checkCondition);
    }

    /**
     * C128 (B) Barcode HTML table rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodeHTML();
     */
    public function testC128BGetBarcodeHTMLRaw()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcHTMLRaw = $d1->getBarcodeHTML(self::C_BC_DEFAULT, 'C128B', self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);
        $bcCheckArray = explode('background-color:black', $bcHTMLRaw);

        $this->assertTrue(count($bcCheckArray)===34);
    }

    /**
     * C128 (C) Barcode PNG rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodePNGPath();
     */
    public function testC128CGetBarcodePNGPath()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcPathAbs = $d1->getBarcodePNGPath(self::C_BC_C128C, 'C128B', null, self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);

        if (function_exists('imagecreate')) {
            $checkCondition = (file_exists($bcPathAbs)) && (filesize($bcPathAbs) === 160);
        } else {
            $checkCondition = (file_exists($bcPathAbs)) ? true : false;
        }

        if ($bcPathAbs!==false) unlink($bcPathAbs);

        $this->assertTrue($checkCondition);
    }

    /**
     * C128 (C) Barcode HTML table rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodeHTML();
     */
    public function testC128CGetBarcodeHTMLRaw()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcHTMLRaw = $d1->getBarcodeHTML(self::C_BC_C128C, 'C128C', self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);
        $bcCheckArray = explode('background-color:black', $bcHTMLRaw);

        $this->assertTrue(count($bcCheckArray)===34);
    }

    /**
     * EAN2 Barcode PNG rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodePNGPath();
     */
    public function testEAN2GetBarcodePNGPath()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcPathAbs = $d1->getBarcodePNGPath(self::C_BC_EAN2, 'EAN2', null, self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);

        if (function_exists('imagecreate')) {
            $checkCondition = (file_exists($bcPathAbs)) && (filesize($bcPathAbs) === 106);
        } else {
            $checkCondition = (file_exists($bcPathAbs)) ? true : false;
        }

        if ($bcPathAbs!==false) unlink($bcPathAbs);

        $this->assertTrue($checkCondition);
    }

    /**
     * EAN2 Barcode HTML table rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodeHTML();
     */
    public function testEAN2GetBarcodeHTMLRaw()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcHTMLRaw = $d1->getBarcodeHTML(self::C_BC_EAN2, 'EAN2', self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);
        $bcCheckArray = explode('background-color:black', $bcHTMLRaw);

        $this->assertTrue(count($bcCheckArray)===8);
    }

    /**
     * EAN5 Barcode PNG rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodePNGPath();
     */
    public function testEAN5GetBarcodePNGPath()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcPathAbs = $d1->getBarcodePNGPath(self::C_BC_EAN5, 'EAN5', null, self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);

        if (function_exists('imagecreate')) {
            $checkCondition = (file_exists($bcPathAbs)) && (filesize($bcPathAbs) === 115);
        } else {
            $checkCondition = (file_exists($bcPathAbs)) ? true : false;
        }

        if ($bcPathAbs!==false) unlink($bcPathAbs);

        $this->assertTrue($checkCondition);
    }

    /**
     * EAN5 Barcode HTML table rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodeHTML();
     */
    public function testEAN5GetBarcodeHTMLRaw()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcHTMLRaw = $d1->getBarcodeHTML(self::C_BC_EAN2, 'EAN5', self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);
        $bcCheckArray = explode('background-color:black', $bcHTMLRaw);

        $this->assertTrue(count($bcCheckArray)===17);
    }

    /**
     * EAN13 Barcode PNG rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodePNGPath();
     */
    public function testEAN13GetBarcodePNGPath()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcPathAbs = $d1->getBarcodePNGPath(self::C_BC_EAN5, 'EAN13', null, self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);

        if (function_exists('imagecreate')) {
            $checkCondition = (file_exists($bcPathAbs)) && (filesize($bcPathAbs) === 129);
        } else {
            $checkCondition = (file_exists($bcPathAbs)) ? true : false;
        }

        if ($bcPathAbs!==false) unlink($bcPathAbs);

        if ($bcPathAbs!==false) $this->assertTrue($checkCondition);
    }

    /**
     * EAN13 Barcode HTML table rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodeHTML();
     */
    public function testEAN13GetBarcodeHTMLRaw()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcHTMLRaw = $d1->getBarcodeHTML(self::C_BC_EAN2, 'EAN13', self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);
        $bcCheckArray = explode('background-color:black', $bcHTMLRaw);

        $this->assertTrue(count($bcCheckArray)===31);
    }

    /**
     * EAN8 Barcode PNG rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodePNGPath();
     */
    public function testEAN8GetBarcodePNGPath()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcPathAbs = $d1->getBarcodePNGPath(self::C_BC_EAN5, 'EAN8', null, self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);

        if (function_exists('imagecreate')) {
            $checkCondition = (file_exists($bcPathAbs)) && (filesize($bcPathAbs) === 120);
        } else {
            $checkCondition = (file_exists($bcPathAbs)) ? true : false;
        }

        if ($bcPathAbs!==false) unlink($bcPathAbs);

        $this->assertTrue($checkCondition);
    }

    /**
     * EAN8 Barcode HTML table rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodeHTML();
     */
    public function testEAN8GetBarcodeHTMLRaw()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcHTMLRaw = $d1->getBarcodeHTML(self::C_BC_EAN2, 'EAN13', self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);
        $bcCheckArray = explode('background-color:black', $bcHTMLRaw);

        $this->assertTrue(count($bcCheckArray)===31);
    }

    /**
     * UPCA Barcode PNG rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodePNGPath();
     */
    public function testUPCAGetBarcodePNGPath()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcPathAbs = $d1->getBarcodePNGPath(self::C_BC_UPCA, 'UPCA', null, self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);

        if (function_exists('imagecreate')) {
            $checkCondition = (file_exists($bcPathAbs)) && (filesize($bcPathAbs) === 129);
        } else {
            $checkCondition = (file_exists($bcPathAbs)) ? true : false;
        }

        if ($bcPathAbs!==false) unlink($bcPathAbs);

        $this->assertTrue($checkCondition);
    }

    /**
     * UPCA Barcode HTML table rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodeHTML();
     */
    public function testUPCAGetBarcodeHTMLRaw()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcHTMLRaw = $d1->getBarcodeHTML(self::C_BC_UPCA, 'UPCA', self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);
        $bcCheckArray = explode('background-color:black', $bcHTMLRaw);

        $this->assertTrue(count($bcCheckArray)===31);
    }

    /**
     * UPCE Barcode PNG rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodePNGPath();
     */
    public function testUPCEGetBarcodePNGPath()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcPathAbs = $d1->getBarcodePNGPath(self::C_BC_UPCE, 'UPCE', null, self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);

        if (function_exists('imagecreate')) {
            $checkCondition = (file_exists($bcPathAbs)) && (filesize($bcPathAbs) === 116);
        } else {
            $checkCondition = (file_exists($bcPathAbs)) ? true : false;
        }

        if ($bcPathAbs!==false) unlink($bcPathAbs);

        $this->assertTrue($checkCondition);
    }

    /**
     * UPCE Barcode HTML table rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodeHTML();
     */
    public function testUPCEGetBarcodeHTMLRaw()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcHTMLRaw = $d1->getBarcodeHTML(self::C_BC_UPCE, 'UPCE', self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);
        $bcCheckArray = explode('background-color:black', $bcHTMLRaw);

        $this->assertTrue(count($bcCheckArray)===18);
    }

    /**
     * MSI Barcode PNG rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodePNGPath();
     */
    public function testMSIGetBarcodePNGPath()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcPathAbs = $d1->getBarcodePNGPath(self::C_BC_DEFAULT, 'MSI', null, self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);

        if (function_exists('imagecreate')) {
            $checkCondition = (file_exists($bcPathAbs)) && (filesize($bcPathAbs) === 128);
        } else {
            $checkCondition = (file_exists($bcPathAbs)) ? true : false;
        }

        if ($bcPathAbs!==false) unlink($bcPathAbs);

        $this->assertTrue($checkCondition);
    }

    /**
     * UPCE Barcode HTML table rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodeHTML();
     */
    public function testMSIGetBarcodeHTMLRaw()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcHTMLRaw = $d1->getBarcodeHTML(self::C_BC_DEFAULT, 'MSI', self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);
        $bcCheckArray = explode('background-color:black', $bcHTMLRaw);

        $this->assertTrue(count($bcCheckArray)===32);
    }

    /**
     * MSI+ Barcode PNG rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodePNGPath();
     */
    public function testMSIPlusGetBarcodePNGPath()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcPathAbs = $d1->getBarcodePNGPath(self::C_BC_DEFAULT, 'MSI+', null, self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);

        if (function_exists('imagecreate')) {
            $checkCondition = (file_exists($bcPathAbs)) && (filesize($bcPathAbs) === 133);
        } else {
            $checkCondition = (file_exists($bcPathAbs)) ? true : false;
        }

        if ($bcPathAbs!==false) unlink($bcPathAbs);

        $this->assertTrue($checkCondition);
    }

    /**
     * MSI+ Barcode HTML table rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodeHTML();
     */
    public function testMSIPlusGetBarcodeHTMLRaw()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcHTMLRaw = $d1->getBarcodeHTML(self::C_BC_DEFAULT, 'MSI+', self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);
        $bcCheckArray = explode('background-color:black', $bcHTMLRaw);

        $this->assertTrue(count($bcCheckArray)===36);
    }

    /**
     * POSTNET Barcode PNG rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodePNGPath();
     */
    public function testPOSTNETGetBarcodePNGPath()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcPathAbs = $d1->getBarcodePNGPath(self::C_BC_DEFAULT, 'POSTNET', null, self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);

        if (function_exists('imagecreate')) {
            $checkCondition = (file_exists($bcPathAbs)) && (filesize($bcPathAbs) === 136);
        } else {
            $checkCondition = (file_exists($bcPathAbs)) ? true : false;
        }

        if ($bcPathAbs!==false) unlink($bcPathAbs);

        $this->assertTrue($checkCondition);
    }

    /**
     * POSTNET Barcode HTML table rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodeHTML();
     */
    public function testPOSTNETGetBarcodeHTMLRaw()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcHTMLRaw = $d1->getBarcodeHTML(self::C_BC_DEFAULT, 'POSTNET', self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);
        $bcCheckArray = explode('background-color:black', $bcHTMLRaw);

        $this->assertTrue(count($bcCheckArray)===43);
    }

    /**
     * PLANET Barcode PNG rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodePNGPath();
     */
    public function testPLANETGetBarcodePNGPath()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcPathAbs = $d1->getBarcodePNGPath(self::C_BC_DEFAULT, 'PLANET', null, self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);

        if (function_exists('imagecreate')) {
            $checkCondition = (file_exists($bcPathAbs)) && (filesize($bcPathAbs) === 136);
        } else {
            $checkCondition = (file_exists($bcPathAbs)) ? true : false;
        }

        if ($bcPathAbs!==false) unlink($bcPathAbs);

        $this->assertTrue($checkCondition);
    }

    /**
     * PLANET Barcode HTML table rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodeHTML();
     */
    public function testPLANETGetBarcodeHTMLRaw()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcHTMLRaw = $d1->getBarcodeHTML(self::C_BC_DEFAULT, 'PLANET', self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);
        $bcCheckArray = explode('background-color:black', $bcHTMLRaw);

        $this->assertTrue(count($bcCheckArray)===43);
    }

    /**
     * RMS4CC Barcode PNG rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodePNGPath();
     */
    public function testRMS4CCGetBarcodePNGPath()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcPathAbs = $d1->getBarcodePNGPath(self::C_BC_DEFAULT, 'RMS4CC', null, self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);

        if (function_exists('imagecreate')) {
            $checkCondition = (file_exists($bcPathAbs)) && (filesize($bcPathAbs) === 146);
        } else {
            $checkCondition = (file_exists($bcPathAbs)) ? true : false;
        }

        if ($bcPathAbs!==false) unlink($bcPathAbs);

        $this->assertTrue($checkCondition);
    }

    /**
     * RMS4CC Barcode HTML table rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodeHTML();
     */
    public function testRMS4CCGetBarcodeHTMLRaw()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcHTMLRaw = $d1->getBarcodeHTML(self::C_BC_DEFAULT, 'RMS4CC', self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);
        $bcCheckArray = explode('background-color:black', $bcHTMLRaw);

        $this->assertTrue(count($bcCheckArray)===35);
    }

    /**
     * KIX Barcode PNG rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodePNGPath();
     */
    public function testKIXGetBarcodePNGPath()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcPathAbs = $d1->getBarcodePNGPath(self::C_BC_DEFAULT, 'KIX', null, self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);

        if (function_exists('imagecreate')) {
            $checkCondition = (file_exists($bcPathAbs)) && (filesize($bcPathAbs) === 141);
        } else {
            $checkCondition = (file_exists($bcPathAbs)) ? true : false;
        }

        if ($bcPathAbs!==false) unlink($bcPathAbs);

        $this->assertTrue($checkCondition);
    }

    /**
     * KIX Barcode HTML table rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodeHTML();
     */
    public function testKIXGetBarcodeHTMLRaw()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcHTMLRaw = $d1->getBarcodeHTML(self::C_BC_DEFAULT, 'KIX', self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);
        $bcCheckArray = explode('background-color:black', $bcHTMLRaw);

        $this->assertTrue(count($bcCheckArray)===29);
    }

    /**
     * IMB Barcode PNG rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodePNGPath();
     */
    public function testIMBGetBarcodePNGPath()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcPathAbs = $d1->getBarcodePNGPath(self::C_BC_DEFAULT, 'IMB', null, self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);

        if (function_exists('imagecreate')) {
            $checkCondition = (file_exists($bcPathAbs)) && (filesize($bcPathAbs) === 180);
        } else {
            $checkCondition = (file_exists($bcPathAbs)) ? true : false;
        }

        if ($bcPathAbs!==false) unlink($bcPathAbs);

        $this->assertTrue($checkCondition);
    }

    /**
     * IMB Barcode HTML table rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodeHTML();
     */
    public function testIMBGetBarcodeHTMLRaw()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcHTMLRaw = $d1->getBarcodeHTML(self::C_BC_DEFAULT, 'IMB', self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);
        $bcCheckArray = explode('background-color:black', $bcHTMLRaw);

        $this->assertTrue(count($bcCheckArray)===66);
    }

    /**
     * CODABAR Barcode PNG rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodePNGPath();
     */
    public function testCODABARGetBarcodePNGPath()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcPathAbs = $d1->getBarcodePNGPath(self::C_BC_DEFAULT, 'CODABAR', null, self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);

        if (function_exists('imagecreate')) {
            $checkCondition = (file_exists($bcPathAbs)) && (filesize($bcPathAbs) === 129);
        } else {
            $checkCondition = (file_exists($bcPathAbs)) ? true : false;
        }

        if ($bcPathAbs!==false) unlink($bcPathAbs);

        $this->assertTrue($checkCondition);
    }

    /**
     * CODABAR Barcode HTML table rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodeHTML();
     */
    public function testCODABARGetBarcodeHTMLRaw()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcHTMLRaw = $d1->getBarcodeHTML(self::C_BC_DEFAULT, 'CODABAR', self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);
        $bcCheckArray = explode('background-color:black', $bcHTMLRaw);

        $this->assertTrue(count($bcCheckArray)===37);
    }

    /**
     * CODE11 Barcode PNG rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodePNGPath();
     */
    public function testCODE11GetBarcodePNGPath()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcPathAbs = $d1->getBarcodePNGPath(self::C_BC_DEFAULT, 'CODE11', null, self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);

        if (function_exists('imagecreate')) {
            $checkCondition = (file_exists($bcPathAbs)) && (filesize($bcPathAbs) === 125);
        } else {
            $checkCondition = (file_exists($bcPathAbs)) ? true : false;
        }

        if ($bcPathAbs!==false) unlink($bcPathAbs);

        $this->assertTrue($checkCondition);
    }

    /**
     * CODE11 Barcode HTML table rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodeHTML();
     */
    public function testCODE11GetBarcodeHTMLRaw()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcHTMLRaw = $d1->getBarcodeHTML(self::C_BC_DEFAULT, 'CODE11', self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);
        $bcCheckArray = explode('background-color:black', $bcHTMLRaw);

        $this->assertTrue(count($bcCheckArray)===31);
    }

    /**
     * PHARMA Barcode PNG rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodePNGPath();
     */
    public function testPHARMAGetBarcodePNGPath()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcPathAbs = $d1->getBarcodePNGPath(self::C_BC_DEFAULT, 'PHARMA', null, self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);

        if (function_exists('imagecreate')) {
            $checkCondition = (file_exists($bcPathAbs)) && (filesize($bcPathAbs) === 124);
        } else {
            $checkCondition = (file_exists($bcPathAbs)) ? true : false;
        }

        if ($bcPathAbs!==false) unlink($bcPathAbs);

        $this->assertTrue($checkCondition);
    }

    /**
     * PHARMA Barcode HTML table rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodeHTML();
     */
    public function testPHARMAGetBarcodeHTMLRaw()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcHTMLRaw = $d1->getBarcodeHTML(self::C_BC_DEFAULT, 'PHARMA', self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);
        $bcCheckArray = explode('background-color:black', $bcHTMLRaw);

        $this->assertTrue(count($bcCheckArray)===21);
    }

    /**
     * PHARMA2T Barcode PNG rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodePNGPath();
     */
    public function testPHARMA2TGetBarcodePNGPath()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcPathAbs = $d1->getBarcodePNGPath(self::C_BC_DEFAULT, 'PHARMA2T', null, self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);

        if (function_exists('imagecreate')) {
            $checkCondition = (file_exists($bcPathAbs)) && (filesize($bcPathAbs) === 118);
        } else {
            $checkCondition = (file_exists($bcPathAbs)) ? true : false;
        }

        if ($bcPathAbs!==false) unlink($bcPathAbs);

        $this->assertTrue($checkCondition);
    }

    /**
     * PHARMA2T Barcode HTML table rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodeHTML();
     */
    public function testPHARMA2TGetBarcodeHTMLRaw()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcHTMLRaw = $d1->getBarcodeHTML(self::C_BC_DEFAULT, 'PHARMA2T', self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT);
        $bcCheckArray = explode('background-color:black', $bcHTMLRaw);

        $this->assertTrue(count($bcCheckArray)===14);
    }

    /**
     * DATAMATRIX 2D Matrix-Code PNG rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base2DBarcode::getBarcodePNGPath();
     */
    public function testDATAMATRIXGetBarcodePNGPath()
    {
        $d2 = new matrixCode();
        $d2->savePath = self::C_TMP_PATH;

        $bcPathAbs = $d2->getBarcodePNGPath(self::C_MC_DEFAULT, 'datamatrix', null, self::C_MC_2D_WIDTH, self::C_MC_2D_HEIGHT);

        if (function_exists('imagecreate')) {
            $checkCondition = (file_exists($bcPathAbs)) && (filesize($bcPathAbs) === 227);
        } else {
            $checkCondition = (file_exists($bcPathAbs)) ? true : false;
        }

        if ($bcPathAbs!==false) unlink($bcPathAbs);

        $this->assertTrue($checkCondition);
    }

    /**
     * PDF417 2D Matrix-Code PNG rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base2DBarcode::getBarcodePNGPath();
     */
    public function testPDF417GetBarcodePNGPath()
    {
        $d2 = new matrixCode();
        $d2->savePath = self::C_TMP_PATH;

        $bcPathAbs = $d2->getBarcodePNGPath(self::C_MC_DEFAULT, 'pdf417', null, self::C_MC_2D_WIDTH, self::C_MC_2D_HEIGHT);

        if (function_exists('imagecreate')) {
            $checkCondition = (file_exists($bcPathAbs)) && (filesize($bcPathAbs) === 317);
        } else {
            $checkCondition = (file_exists($bcPathAbs)) ? true : false;
        }

        if ($bcPathAbs!==false) unlink($bcPathAbs);

        $this->assertTrue($checkCondition);
    }

    /**
     * QRCode 2D Matrix-Code PNG rendering test
     *
     * @covers BG\BarcodeBundle\Util\Base2DBarcode::getBarcodePNGPath();
     */
    public function testQRCODEGetBarcodePNGPath()
    {
        $d2 = new matrixCode();
        $d2->savePath = self::C_TMP_PATH;

        $bcPathAbs = $d2->getBarcodePNGPath(self::C_MC_DEFAULT, 'qrcode', null, self::C_MC_2D_WIDTH, self::C_MC_2D_HEIGHT);

        if (function_exists('imagecreate')) {
            $checkCondition = (file_exists($bcPathAbs)) && (filesize($bcPathAbs) > 225 && filesize($bcPathAbs) < 255);
        } else {
            $checkCondition = (file_exists($bcPathAbs)) ? true : false;
        }

        if ($bcPathAbs!==false) unlink($bcPathAbs);

        $this->assertTrue($checkCondition);
    }

    /**
     * I25 Barcode PNG rendering test (rotation
     *
     * @covers BG\BarcodeBundle\Util\Base1DBarcode::getBarcodePNGPath();
     */
    public function testI25GetBarcodePNGPathVertical()
    {
        $d1 = new barCode();
        $d1->savePath = self::C_TMP_PATH;

        $bcPathAbs = $d1->getBarcodePNGPath(self::C_BC_DEFAULT, 'I25', null, self::C_BC_1D_WIDTH, self::C_BC_1D_HEIGHT, array(0,0,0), true);

        $checkCondition = (file_exists($bcPathAbs)) ? true : false;
        if (function_exists('imagecreate')) {
            $checkCondition = (file_exists($bcPathAbs)) && (filesize($bcPathAbs) >= 217);
        }

        if ($bcPathAbs!==false) unlink($bcPathAbs);

        $this->assertTrue($checkCondition);
    }
}