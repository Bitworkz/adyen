<?php

namespace bitworkz\Adyen;

use Adyen\Client;
use Adyen\Service\DirectoryLookup;
use Adyen\Util\Util;
use Adyen\Service\Payment;

/**
 * Adyen class to handle all kind of Adyen payment actions
 * @author erikwillems
 *
 */
class Adyen
{
    /**
     * adyen merchant account
     * @var string
     */
    protected $merchant;
    
    /**
     * Adyen environment
     * @var string
     */
    protected $environment;
    
    /**
     * Adyen skin code
     * @var string
     */
    protected $skinCode;
    
    /**
     * amount to pay
     * @var integer
     */
    protected $amount;
    
    /**
     * payment currency
     * @var string
     */
    protected $currency;
    
    /**
     * merchant reference
     * @var string
     */
    protected $merchantReference;
    
    /**
     * HMAC code from the payment skin
     * @var string
     */
    protected $hmac;
    
    /**
     * 2 character country ISO code
     * @var string
     */
    protected $countryCode;
    
    /**
     * Client locale
     * @var string
     */
    protected $locale;
    
    /**
     * Adyen WS user
     * @var string
     */
    protected $wsUser;
    
    /**
     * Adyen WS user password
     * @var string
     */
    protected $wsPassword;
    
    /**
     * Application name
     * @var string
     */
    protected $applicationName;
    
    /**
     * credit card number
     * @var integer
     */
    protected $cardNumber;
    
    /**
     * credit card cvc code
     * @var integer
     */
    protected $cvc;
    
    /**
     * credit card expiry month
     * @var integer
     */
    protected $expiryMonth;
    
    /**
     * credit card expiry year
     * @var integer
     */
    protected $expiryYear;
    
    /**
     * credit card holder name
     * @var string
     */
    protected $holderName;
    
    /**
     * payment reference
     * @var integer
     */
    protected $paymentReference;
    
    /**
     * the clients email address
     * @var string
     */
    protected $clientEmail;
    
    /**
     * the clients reference
     * @var string
     */
    protected $clientReference;
    
    /**
     * encrypted form data
     * @var string
     */
    protected $encryptedData;
    
    /**
     * Adyen authentication url
     * @var string
     */
    protected $authUrl;
    
    /**
     * Adyen payment method brand code
     * @var string
     */
    protected $brandCode;
    
    /**
     * Adyen payment form result url
     * @var string
     */
    protected $resultUrl;
    
    /**
     * Adyen payment ID
     * @var integer
     */
    protected $payId;
    
    /**
     * Adyen url to post refunds
     * @var string
     */
    protected $refundUrl;
    
    /**
     * set the merchant account
     * @param string $merchant
     * @return \bitworkz\Adyen\Adyen
     */
    public function setMerchant($merchant)
    {
        $this->merchant = $merchant;
        return $this;
    }
    
    /**
     * set the Adyen environment
     * @param string $environment
     * @return \bitworkz\Adyen\Adyen
     */
    public function setEnvironment($environment)
    {
        $this->environment = $environment;
        return $this;
    }
    
    /**
     * set the skin code (displayed in Adyen account under skin)
     * @param unknown $skinCode
     * @return \bitworkz\Adyen\Adyen
     */
    public function setSkinCode($skinCode)
    {
        $this->skinCode = $skinCode;
        return $this;
    }
    
    /**
     * set the amount to pay
     * @param float $amount
     * @return \bitworkz\Adyen\Adyen
     */
    public function setAmount($amount)
    {
        $this->amount = $amount * 100;
        return $this;
    }
    
    /**
     * set the payment currency
     * @param string $currency
     * @return \bitworkz\Adyen\Adyen
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }
    
    /**
     * set the merchant reference
     * @param string $merchantReference
     * @return \bitworkz\Adyen\Adyen
     */
    public function setMerchantReference($merchantReference)
    {
        $this->merchantReference = $merchantReference;
        return $this;
    }
    
    /**
     * set the HMAC payment skin code (displayed in Adyen account under skin)
     * @param string $hmacCode
     * @return \bitworkz\Adyen\Adyen
     */
    public function setHmacCode($hmacCode)
    {
        $this->hmac = $hmacCode;
        return $this;
    }
    
    /**
     * set the 2 character country ISO code of the client
     * @param string $countryCode
     * @return \bitworkz\Adyen\Adyen
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
        return $this;
    }
    
    /**
     * set the client locale code (fi. nl_BE)
     * @param string $locale
     * @return \bitworkz\Adyen\Adyen
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
        return $this;
    }
    
    /**
     * set the Adyen WS user (Found in Adyen panel under users)
     * @param string $wsUser
     * @return \bitworkz\Adyen\Adyen
     */
    public function setWsUser($wsUser)
    {
        $this->wsUser = $wsUser;
        return $this;
    }
    
    /**
     * set the Adyen WS user password (Found in Adyen panel under users)
     * @param string $wsPassword
     * @return \bitworkz\Adyen\Adyen
     */
    public function setWsPassword($wsPassword)
    {
        $this->wsPassword = $wsPassword;
        return $this;
    }
    
    /**
     * set the application name
     * @param string $applicationName
     * @return \bitworkz\Adyen\Adyen
     */
    public function setApplicationName($applicationName)
    {
        $this->applicationName = $applicationName;
        return $this;
    }
    
    /**
     * set the credit card number
     * @param integer $cardNumber
     * @return \bitworkz\Adyen\Adyen
     */
    public function setCardNumber($cardNumber)
    {
        $this->cardNumber = $cardNumber;
        return $this;
    }
    
    /**
     * set the credit card CVC code
     * @param integer $cvc
     * @return \bitworkz\Adyen\Adyen
     */
    public function setCvc($cvc)
    {
        $this->cvc = $cvc;
        return $this;
    }
    
    /**
     * set the credit card holder name
     * @param string $holderName
     * @return \bitworkz\Adyen\Adyen
     */
    public function setHolderName($holderName)
    {
        $this->holderName = $holderName;
        return $this;
    }
    
    /**
     * set the credit card expiry month
     * @param integer $expiryMonth
     * @return \bitworkz\Adyen\Adyen
     */
    public function setExpiryMonth($expiryMonth)
    {
        $this->expiryMonth = $expiryMonth;
        return $this;
    }
    
    /**
     * set the credit card expiry year
     * @param integer $expiryYear
     * @return \bitworkz\Adyen\Adyen
     */
    public function setExpiryYear($expiryYear)
    {
        $this->expiryYear = $expiryYear;
        return $this;
    }
    
    /**
     * set the payment reference
     * @param integer $paymentReference
     * @return \bitworkz\Adyen\Adyen
     */
    public function setPaymentReference($paymentReference)
    {
        $this->paymentReference = $paymentReference;
        return $this;
    }
    
    /**
     * set the clients email
     * @param string $email
     * @return \bitworkz\Adyen\Adyen
     */
    public function setClientEmail($email)
    {
        $this->clientEmail = $email;
        return $this;
    }
    
    /**
     * set the clients reference
     * @param string $reference
     * @return \bitworkz\Adyen\Adyen
     */
    public function setClientReference($reference)
    {
        $this->clientReference = $reference;
        return $this;
    }
    
    /**
     * set the encrypted form data
     * @param string $data
     * @return \bitworkz\Adyen\Adyen
     */
    public function setEncryptedData($data)
    {
        $this->encryptedData = $data;
        return $this;
    }
    
    /**
     * set the adyen authentication url
     * @param string $url
     * @return \bitworkz\Adyen\Adyen
     */
    public function setAuthUrl($url)
    {
        $this->authUrl = $url;
        return $this;
    }
    
    /**
     * set the Adyen payment method brand code
     * @param string $brandCode
     * @return \bitworkz\Adyen\Adyen
     */
    public function setBrandCode($brandCode)
    {
        $this->brandCode = $brandCode;
        return $this;
    }
    
    /**
     * set the Adyen payment form result url
     * @param string $url
     * @return \bitworkz\Adyen\Adyen
     */
    public function setResultUrl($url)
    {
        $this->resultUrl = $url;
        return $this;
    }
    
    /**
     * set the Adyen payment id
     * @param integer $id
     * @return \bitworkz\Adyen\Adyen
     */
    public function setPayId($id)
    {
        $this->payId = $id;
        return $this;
    }
    
    /**
     * set the Adyen refund url
     * @param string $url
     * @return \bitworkz\Adyen\Adyen
     */
    public function setRefundUrl($url)
    {
        $this->refundUrl = $url;
        return $this;
    }
    
    /**
     * list all payment methods
     * needed elements: environment, amount, currency, merchant reference, skin code, merchant, country code, locale, hmac
     * @return mixed
     */
    public function listPaymentMethods()
    {
        $client = new Client();
        $client->setEnvironment($this->environment);
        
        $service = new DirectoryLookup($client);
        
        $request = [
            "paymentAmount" => $this->amount,
            "currencyCode" => $this->currency,
            "merchantReference" => $this->merchantReference,
            "skinCode" => $this->skinCode,
            "merchantAccount" => $this->merchant,
            "sessionValidity"   => date("c",strtotime("+1 days")),
            "countryCode"       => $this->countryCode,
            "shopperLocale" => $this->locale
        ];
        
        $request['merchantSig'] = Util::calculateSha256Signature($this->hmac, $request);
        
        $result = $service->directoryLookup($request);
        
        return $result;
    }
    
    /**
     * make a payment to adyen
     * needed elements: merchant, amount, currency, reference, clientEmail, clientReference, encryptedData, authUrl, wsUser, wsPassword
     * @return mixed
     */
    public function pay()
    {
        $request = [
            "merchantAccount" => $this->merchant,
            "amount" => [
                "value" => $this->amount,
                "currency" => $this->currency
            ],
            "reference" => $this->paymentReference,
            "shopperIP" => $_SERVER['REMOTE_ADDR'],
            "shopperEmail" => $this->clientEmail,
            "shopperReference" => $this->clientReference,
            "fraudOffset" => "0",
            "additionalData"=> [
                "card.encrypted.json" => $this->encryptedData
            ],
            "browserInfo"=> [
                "acceptHeader" => $_SERVER['HTTP_USER_AGENT'],
                "userAgent" => $_SERVER['HTTP_ACCEPT']
            ]
        ];
        
        $result = $this->post($this->authUrl, $this->wsUser, $this->wsPassword, $request);
        return $result;
    }
    
    /**
     * generate a payment form for bank transfers
     * needed elements: merchantReference, merchant, currency, amount, locale, skinCode, brandCode, clientEmail, clientReference, HMAC, resultUrl
     * @return string[]|number[]|unknown[]
     */
    public function generatePaymentForm()
    {
        $formData = [
            "merchantReference" => $this->merchantReference,
            "merchantAccount"   => $this->merchant,
            "currencyCode"      => $this->currency,
            "paymentAmount"     => $this->amount,
            "sessionValidity"   => date("c",strtotime("+1 days")),
            "shopperLocale"     => $this->locale,
            "skinCode"          => $this->skinCode,
            "brandCode"         => $this->brandCode,
            "shopperEmail"      => $this->clientEmail,
            "shopperReference"  => $this->clientReference,
            "resURL"            => $this->resultUrl
        ];
        
        ksort($formData, SORT_STRING);
        
        $escapeval = function($val) {
            return str_replace(':','\\:',str_replace('\\','\\\\',$val));
        };
        
        $signData = implode(":",array_map($escapeval,array_merge(array_keys($formData), array_values($formData))));
        
        $merchantSig = base64_encode(hash_hmac('sha256',$signData,pack("H*" , $this->hmac),true));
        $formData["merchantSig"] = $merchantSig;
        
        return $formData; 
    }
    
    /**
     * Make a refund from an Adyen payment
     * needed elements: merchant, amount, currency, payId, merchantReference, wsUser, wsPassword, refundUrl
     * @return boolean
     */
    public function refund()
    {
        $data = [
            'merchantAccount' => $this->merchant,
            'modificationAmount' => [
                'value' => $this->amount,
                'currency' => $this->currency
            ],
            'originalReference' => $this->payId,
            'reference' => $this->merchantReference
        ];
        
        $client = new \SoapClient($this->refundUrl, [
            'login' => $this->wsUser,
            'password' => $this->wsPassword,
            'style' => SOAP_DOCUMENT,
            'encoding' => SOAP_LITERAL,
            'cache_wsdl' => WSDL_CACHE_BOTH,
            'trace' => 1
        ]);
        
        $result = $client->refund([
            'modificationRequest' => $data
        ]);
        
        if ($result->refundResult->response == '[refund-received]') {
            return true;
        }
        
        return false;
    }
    
    /**
     * make a post to the Adyen web service
     * @param string $url
     * @param string $wsUser
     * @param string $wsPassword
     * @param array $data
     * @return mixed
     */
    private function post($url, $wsUser, $wsPassword, $data)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC  );
        curl_setopt($ch, CURLOPT_USERPWD, $wsUser . ":" . $wsPassword);
        curl_setopt($ch, CURLOPT_POST,count(json_encode($data)));
        curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER,array("Content-type: application/json"));
        
        $result = curl_exec($ch);
        
        if($result === false) {
            echo "Error: " . curl_error($ch);
        } else {
            curl_close($ch);
            return $result;
        }
    }
}