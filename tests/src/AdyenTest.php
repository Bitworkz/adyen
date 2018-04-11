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
}

