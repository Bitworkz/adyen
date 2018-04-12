<?php

use bitworkz\Adyen\Adyen;
use PHPUnit\Framework\TestCase;

/**
 * Adyen test case.
 */
class AdyenTest extends TestCase
{

    /**
     *
     * @var Adyen
     */
    private $adyen;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        
        $this->adyen = new Adyen();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        // TODO Auto-generated AdyenTest::tearDown()
        $this->adyen = null;
        
        parent::tearDown();
    }

    /**
     * Tests Adyen->listPaymentMethods()
     */
    public function testListPaymentMethods()
    {
        $this->adyen
            ->setEnvironment('test')
            ->setAmount('10')
            ->setCurrency('EUR')
            ->setMerchantReference('Get payment methods')
            ->setMerchant('InsidersEU')
            ->setSkinCode('hXk0ZPAJ')
            ->setCountryCode('BE')
            ->setLocale('nl_BE')
            ->setHmacCode('2EB62F7FBEF75B82CC7608A0D892724B13F9DEB55BC41E3F3B73D4F610373B8D')
            ;

        $paymentMethods = $this->adyen->listPaymentMethods();

        $this->addToAssertionCount(1);
    }

    public function testPay()
    {
        $this->adyen
            ->setWsUser('ws@Company.Insiders')
            ->setWsPassword('K?%3v]tYuE25s3y>k!hX+Le1R')
            ->setEnvironment('test')
            ->setApplicationName('The insiders payment')
            ->setMerchant('InsidersEU')
            ->setAmount(1)
            ->setCurrency('EUR')
            ->setPaymentReference('Order123')
            ->setClientEmail('erik.willems1@outlook.com')
            ->setClientReference('client123')
            ->setEncryptedData('adyenjs_0_1_18$MQJGpfZmqt0sHV7BJFedtw3LyLOvC1iNDaJQk2E45g5TubN/mNwacBuVBG3++5tZ0B2ROcyEXo9JRtWtJISgKrufGd1RC4s7+wsHHuukM++6VUyXYqDD6Ke7cAa7Rri9FgdtrRJDOHtyLJV2IwjoSZ/ULJavdTRuBz90X1FLArrLHLDp/+i4W3seuAfUIYhrpGxseFU8EckF9j8DHFfOQEdU1WibQCPpJxjsX94eqn5cnU+6a6UlnVDk1A0ndVzTceMlg3a+ewv8u1SutTeReArO+llOukp548z5xcI8U3JYYKjm9IIiqJ9wEjZ4/65cekQMKJm9puY/jMQnjjiFxg==$mFeETB9k7BEKudriOPXGiO+qHIodh+8NOjbR8g9cMvAk/oHHY6LRDadAZYyoyPS9X89sRbNJd80qRJOS+rblcdFjBX/2QXMk+BOC7YnDDOxoCdkFew4Ov2L5r8Hivu0a3aO9VrPT1MgkooV0Z8UDBeSyojcHf0m3AI2iZFVESKMZPCjpOP9F9wROVVv05jcnIJwV3aZUcCQI3zAjzCmDnzb64iduwdGnhEWaMnTkx1+u5Ir9rEipxNPVtNbUmvnTnZptSy5uyrWvyM2IJ8AACYKTRKKyoUOuu9if89Fw2JxF7srTyNreKxs3I0fEPUDU2405gT1+p+TW8pQ=');
        $this->adyen->pay();
    }
}

