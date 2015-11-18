<?php

namespace Entity\Proxy\__CG__\Entity\NascarIllustrated;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Purchase extends \Entity\NascarIllustrated\Purchase implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', '' . "\0" . 'Entity\\NascarIllustrated\\Purchase' . "\0" . 'purchase_id', '' . "\0" . 'Entity\\NascarIllustrated\\Purchase' . "\0" . 'is_complete', '' . "\0" . 'Entity\\NascarIllustrated\\Purchase' . "\0" . 'merchandise_batch_file', '' . "\0" . 'Entity\\NascarIllustrated\\Purchase' . "\0" . 'subscription_batch_file', '' . "\0" . 'Entity\\NascarIllustrated\\Purchase' . "\0" . 'cart_id', '' . "\0" . 'Entity\\NascarIllustrated\\Purchase' . "\0" . 'amount', '' . "\0" . 'Entity\\NascarIllustrated\\Purchase' . "\0" . 'first_name', '' . "\0" . 'Entity\\NascarIllustrated\\Purchase' . "\0" . 'last_name', '' . "\0" . 'Entity\\NascarIllustrated\\Purchase' . "\0" . 'email', '' . "\0" . 'Entity\\NascarIllustrated\\Purchase' . "\0" . 'phone', '' . "\0" . 'Entity\\NascarIllustrated\\Purchase' . "\0" . 'address1', '' . "\0" . 'Entity\\NascarIllustrated\\Purchase' . "\0" . 'address2', '' . "\0" . 'Entity\\NascarIllustrated\\Purchase' . "\0" . 'city', '' . "\0" . 'Entity\\NascarIllustrated\\Purchase' . "\0" . 'state_province', '' . "\0" . 'Entity\\NascarIllustrated\\Purchase' . "\0" . 'postal_code', '' . "\0" . 'Entity\\NascarIllustrated\\Purchase' . "\0" . 'country', '' . "\0" . 'Entity\\NascarIllustrated\\Purchase' . "\0" . 'has_billing_eq_shipping', '' . "\0" . 'Entity\\NascarIllustrated\\Purchase' . "\0" . 'transaction_code', '' . "\0" . 'Entity\\NascarIllustrated\\Purchase' . "\0" . 'transaction_metadata', '' . "\0" . 'Entity\\NascarIllustrated\\Purchase' . "\0" . 'created_at', '' . "\0" . 'Entity\\NascarIllustrated\\Purchase' . "\0" . 'updated_at', '' . "\0" . 'Entity\\NascarIllustrated\\Purchase' . "\0" . 'PurchaseItems', '' . "\0" . 'Entity\\NascarIllustrated\\Purchase' . "\0" . 'Cart');
        }

        return array('__isInitialized__', '' . "\0" . 'Entity\\NascarIllustrated\\Purchase' . "\0" . 'purchase_id', '' . "\0" . 'Entity\\NascarIllustrated\\Purchase' . "\0" . 'is_complete', '' . "\0" . 'Entity\\NascarIllustrated\\Purchase' . "\0" . 'merchandise_batch_file', '' . "\0" . 'Entity\\NascarIllustrated\\Purchase' . "\0" . 'subscription_batch_file', '' . "\0" . 'Entity\\NascarIllustrated\\Purchase' . "\0" . 'cart_id', '' . "\0" . 'Entity\\NascarIllustrated\\Purchase' . "\0" . 'amount', '' . "\0" . 'Entity\\NascarIllustrated\\Purchase' . "\0" . 'first_name', '' . "\0" . 'Entity\\NascarIllustrated\\Purchase' . "\0" . 'last_name', '' . "\0" . 'Entity\\NascarIllustrated\\Purchase' . "\0" . 'email', '' . "\0" . 'Entity\\NascarIllustrated\\Purchase' . "\0" . 'phone', '' . "\0" . 'Entity\\NascarIllustrated\\Purchase' . "\0" . 'address1', '' . "\0" . 'Entity\\NascarIllustrated\\Purchase' . "\0" . 'address2', '' . "\0" . 'Entity\\NascarIllustrated\\Purchase' . "\0" . 'city', '' . "\0" . 'Entity\\NascarIllustrated\\Purchase' . "\0" . 'state_province', '' . "\0" . 'Entity\\NascarIllustrated\\Purchase' . "\0" . 'postal_code', '' . "\0" . 'Entity\\NascarIllustrated\\Purchase' . "\0" . 'country', '' . "\0" . 'Entity\\NascarIllustrated\\Purchase' . "\0" . 'has_billing_eq_shipping', '' . "\0" . 'Entity\\NascarIllustrated\\Purchase' . "\0" . 'transaction_code', '' . "\0" . 'Entity\\NascarIllustrated\\Purchase' . "\0" . 'transaction_metadata', '' . "\0" . 'Entity\\NascarIllustrated\\Purchase' . "\0" . 'created_at', '' . "\0" . 'Entity\\NascarIllustrated\\Purchase' . "\0" . 'updated_at', '' . "\0" . 'Entity\\NascarIllustrated\\Purchase' . "\0" . 'PurchaseItems', '' . "\0" . 'Entity\\NascarIllustrated\\Purchase' . "\0" . 'Cart');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Purchase $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getPurchaseId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPurchaseId', array());

        return parent::getPurchaseId();
    }

    /**
     * {@inheritDoc}
     */
    public function setIsComplete($isComplete)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIsComplete', array($isComplete));

        return parent::setIsComplete($isComplete);
    }

    /**
     * {@inheritDoc}
     */
    public function getIsComplete()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIsComplete', array());

        return parent::getIsComplete();
    }

    /**
     * {@inheritDoc}
     */
    public function setMerchandiseBatchFile($merchandiseBatchFile)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMerchandiseBatchFile', array($merchandiseBatchFile));

        return parent::setMerchandiseBatchFile($merchandiseBatchFile);
    }

    /**
     * {@inheritDoc}
     */
    public function getMerchandiseBatchFile()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMerchandiseBatchFile', array());

        return parent::getMerchandiseBatchFile();
    }

    /**
     * {@inheritDoc}
     */
    public function setSubscriptionBatchFile($subscriptionBatchFile)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSubscriptionBatchFile', array($subscriptionBatchFile));

        return parent::setSubscriptionBatchFile($subscriptionBatchFile);
    }

    /**
     * {@inheritDoc}
     */
    public function getSubscriptionBatchFile()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSubscriptionBatchFile', array());

        return parent::getSubscriptionBatchFile();
    }

    /**
     * {@inheritDoc}
     */
    public function setCartId($cartId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCartId', array($cartId));

        return parent::setCartId($cartId);
    }

    /**
     * {@inheritDoc}
     */
    public function getCartId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCartId', array());

        return parent::getCartId();
    }

    /**
     * {@inheritDoc}
     */
    public function setAmount($amount)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAmount', array($amount));

        return parent::setAmount($amount);
    }

    /**
     * {@inheritDoc}
     */
    public function getAmount()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAmount', array());

        return parent::getAmount();
    }

    /**
     * {@inheritDoc}
     */
    public function setFirstName($firstName)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFirstName', array($firstName));

        return parent::setFirstName($firstName);
    }

    /**
     * {@inheritDoc}
     */
    public function getFirstName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFirstName', array());

        return parent::getFirstName();
    }

    /**
     * {@inheritDoc}
     */
    public function setLastName($lastName)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLastName', array($lastName));

        return parent::setLastName($lastName);
    }

    /**
     * {@inheritDoc}
     */
    public function getLastName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLastName', array());

        return parent::getLastName();
    }

    /**
     * {@inheritDoc}
     */
    public function setEmail($email)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmail', array($email));

        return parent::setEmail($email);
    }

    /**
     * {@inheritDoc}
     */
    public function getEmail()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmail', array());

        return parent::getEmail();
    }

    /**
     * {@inheritDoc}
     */
    public function setPhone($phone)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPhone', array($phone));

        return parent::setPhone($phone);
    }

    /**
     * {@inheritDoc}
     */
    public function getPhone()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPhone', array());

        return parent::getPhone();
    }

    /**
     * {@inheritDoc}
     */
    public function setAddress1($address1)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAddress1', array($address1));

        return parent::setAddress1($address1);
    }

    /**
     * {@inheritDoc}
     */
    public function getAddress1()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAddress1', array());

        return parent::getAddress1();
    }

    /**
     * {@inheritDoc}
     */
    public function setAddress2($address2)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAddress2', array($address2));

        return parent::setAddress2($address2);
    }

    /**
     * {@inheritDoc}
     */
    public function getAddress2()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAddress2', array());

        return parent::getAddress2();
    }

    /**
     * {@inheritDoc}
     */
    public function setCity($city)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCity', array($city));

        return parent::setCity($city);
    }

    /**
     * {@inheritDoc}
     */
    public function getCity()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCity', array());

        return parent::getCity();
    }

    /**
     * {@inheritDoc}
     */
    public function setStateProvince($stateProvince)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStateProvince', array($stateProvince));

        return parent::setStateProvince($stateProvince);
    }

    /**
     * {@inheritDoc}
     */
    public function getStateProvince()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStateProvince', array());

        return parent::getStateProvince();
    }

    /**
     * {@inheritDoc}
     */
    public function setPostalCode($postalCode)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPostalCode', array($postalCode));

        return parent::setPostalCode($postalCode);
    }

    /**
     * {@inheritDoc}
     */
    public function getPostalCode()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPostalCode', array());

        return parent::getPostalCode();
    }

    /**
     * {@inheritDoc}
     */
    public function setCountry($country)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCountry', array($country));

        return parent::setCountry($country);
    }

    /**
     * {@inheritDoc}
     */
    public function getCountry()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCountry', array());

        return parent::getCountry();
    }

    /**
     * {@inheritDoc}
     */
    public function setHasBillingEqShipping($hasBillingEqShipping)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setHasBillingEqShipping', array($hasBillingEqShipping));

        return parent::setHasBillingEqShipping($hasBillingEqShipping);
    }

    /**
     * {@inheritDoc}
     */
    public function getHasBillingEqShipping()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getHasBillingEqShipping', array());

        return parent::getHasBillingEqShipping();
    }

    /**
     * {@inheritDoc}
     */
    public function setTransactionCode($transactionCode)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTransactionCode', array($transactionCode));

        return parent::setTransactionCode($transactionCode);
    }

    /**
     * {@inheritDoc}
     */
    public function getTransactionCode()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTransactionCode', array());

        return parent::getTransactionCode();
    }

    /**
     * {@inheritDoc}
     */
    public function setTransactionMetadata($transactionMetadata)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTransactionMetadata', array($transactionMetadata));

        return parent::setTransactionMetadata($transactionMetadata);
    }

    /**
     * {@inheritDoc}
     */
    public function getTransactionMetadata()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTransactionMetadata', array());

        return parent::getTransactionMetadata();
    }

    /**
     * {@inheritDoc}
     */
    public function setCreatedAt($createdAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreatedAt', array($createdAt));

        return parent::setCreatedAt($createdAt);
    }

    /**
     * {@inheritDoc}
     */
    public function getCreatedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreatedAt', array());

        return parent::getCreatedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setUpdatedAt($updatedAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUpdatedAt', array($updatedAt));

        return parent::setUpdatedAt($updatedAt);
    }

    /**
     * {@inheritDoc}
     */
    public function getUpdatedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUpdatedAt', array());

        return parent::getUpdatedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function addPurchaseItem(\Entity\NascarIllustrated\PurchaseItem $purchaseItems)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addPurchaseItem', array($purchaseItems));

        return parent::addPurchaseItem($purchaseItems);
    }

    /**
     * {@inheritDoc}
     */
    public function removePurchaseItem(\Entity\NascarIllustrated\PurchaseItem $purchaseItems)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removePurchaseItem', array($purchaseItems));

        return parent::removePurchaseItem($purchaseItems);
    }

    /**
     * {@inheritDoc}
     */
    public function getPurchaseItems()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPurchaseItems', array());

        return parent::getPurchaseItems();
    }

    /**
     * {@inheritDoc}
     */
    public function setCart(\Entity\NascarIllustrated\Cart $cart = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCart', array($cart));

        return parent::setCart($cart);
    }

    /**
     * {@inheritDoc}
     */
    public function getCart()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCart', array());

        return parent::getCart();
    }

}
