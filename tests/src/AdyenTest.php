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
     * Tests Adyen->setMerchant()
     */
    public function testSetMerchant()
    {
        // TODO Auto-generated AdyenTest->testSetMerchant()
        $this->adyen->setMerchant('yourMerchantId');
    }

    /**
     * Tests Adyen->setEnvironment()
     */
    public function testSetEnvironment()
    {
        $this->adyen->setEnvironment('test');
    }

    /**
     * Tests Adyen->setSkinCode()
     */
    public function testSetSkinCode()
    {
        $this->adyen->setSkinCode('YourSkinCode');
    }

    /**
     * Tests Adyen->setAmount()
     */
    public function testSetAmount()
    {
        $this->adyen->setAmount(10);
    }

    /**
     * Tests Adyen->setCurrency()
     */
    public function testSetCurrency()
    {
        $this->adyen->setCurrency('EUR');
    }

    /**
     * Tests Adyen->setMerchantReference()
     */
    public function testSetMerchantReference()
    {
        $this->adyen->setMerchantReference('MerchantRef');
    }

    /**
     * Tests Adyen->setHmacCode()
     */
    public function testSetHmacCode()
    {
        $this->adyen->setHmacCode('YourHmacCode');
    }

    /**
     * Tests Adyen->setCountryCode()
     */
    public function testSetCountryCode()
    {
        $this->adyen->setCountryCode('BE');
    }

    /**
     * Tests Adyen->setLocale()
     */
    public function testSetLocale()
    {
        $this->adyen->setLocale('nl_be');
    }

    /**
     * Tests Adyen->setWsUser()
     */
    public function testSetWsUser()
    {
        $this->adyen->setWsUser('YourWsUser');
    }

    /**
     * Tests Adyen->setWsPassword()
     */
    public function testSetWsPassword()
    {
        $this->adyen->setWsPassword('YourWsPassword');
    }

    /**
     * Tests Adyen->setApplicationName()
     */
    public function testSetApplicationName()
    {
        $this->adyen->setApplicationName('ApplicationName');
    }

    /**
     * Tests Adyen->setCardNumber()
     */
    public function testSetCardNumber()
    {
        $this->adyen->setCardNumber('4111111111111111');
    }

    /**
     * Tests Adyen->setCvc()
     */
    public function testSetCvc()
    {
        $this->adyen->setCvc('737');
    }

    /**
     * Tests Adyen->setHolderName()
     */
    public function testSetHolderName()
    {
        $this->adyen->setHolderName('Holder name');
    }

    /**
     * Tests Adyen->setExpiryMonth()
     */
    public function testSetExpiryMonth()
    {
        $this->adyen->setExpiryMonth('08');
    }

    /**
     * Tests Adyen->setExpiryYear()
     */
    public function testSetExpiryYear()
    {
        $this->adyen->setExpiryYear('2018');
    }

    /**
     * Tests Adyen->setPaymentReference()
     */
    public function testSetPaymentReference()
    {
        $this->adyen->setPaymentReference('Order123');
    }

    /**
     * Tests Adyen->setClientEmail()
     */
    public function testSetClientEmail()
    {
        $this->adyen->setClientEmail('client@adyen.com');
    }

    /**
     * Tests Adyen->setClientReference()
     */
    public function testSetClientReference()
    {
        $this->adyen->setClientReference('123');
    }

    /**
     * Tests Adyen->setEncryptedData()
     */
    public function testSetEncryptedData()
    {
        $this->adyen->setEncryptedData('EncryptedData');
    }

    /**
     * Tests Adyen->setAuthUrl()
     */
    public function testSetAuthUrl()
    {
        $this->adyen->setAuthUrl('AuthUrl');
    }

    /**
     * Tests Adyen->setBrandCode()
     */
    public function testSetBrandCode()
    {
        $this->adyen->setBrandCode('BrandCode');
    }

    /**
     * Tests Adyen->setResultUrl()
     */
    public function testSetResultUrl()
    {
        $this->adyen->setResultUrl('TestUrl');
    }

    /**
     * Tests Adyen->setPayId()
     */
    public function testSetPayId()
    {
        $this->adyen->setPayId('12345');
    }

    /**
     * Tests Adyen->setRefundUrl()
     */
    public function testSetRefundUrl()
    {
        $this->adyen->setRefundUrl('https://pal-test.adyen.com/pal/Payment.wsdl');
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
        
        $this->adyen->listPaymentMethods();
    }

    /**
     * Tests Adyen->generatePaymentForm()
     */
    public function testGeneratePaymentForm()
    {
        $this->adyen->generatePaymentForm();
    }
}

