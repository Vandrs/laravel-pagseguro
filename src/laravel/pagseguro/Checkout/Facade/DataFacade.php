<?php

namespace laravel\pagseguro\Checkout\Facade;

use laravel\pagseguro\Address\Address;
use laravel\pagseguro\Item\ItemCollection;
use laravel\pagseguro\Receiver\Receiver;
use laravel\pagseguro\Receiver\ReceiverInterface;
use laravel\pagseguro\Sender\Sender;
use laravel\pagseguro\Sender\SenderInterface;
use laravel\pagseguro\Shipping\Shipping;
use laravel\pagseguro\Shipping\ShippingInterface;
use laravel\pagseguro\AcceptedPaymentMethod\AcceptedPaymentMethod;
use laravel\pagseguro\AcceptedPaymentMethod\AcceptPaymentMethodInterface;
use laravel\pagseguro\AcceptedPaymentMethod\IncludeTag\IncludeTag;
use laravel\pagseguro\AcceptedPaymentMethod\IncludeTag\IncludeTagInterface;
use laravel\pagseguro\AcceptedPaymentMethod\ExcludeTag\ExcludeTag;
use laravel\pagseguro\AcceptedPaymentMethod\ExcludeTag\ExcludeTagInterface;
use laravel\pagseguro\AcceptedPaymentMethod\PaymentMethod\PaymentMethod;
use laravel\pagseguro\AcceptedPaymentMethod\PaymentMethod\PaymentMethodInterface;


/**
 * Checkout Data Facade
 *
 * @category   Checkout
 * @package    Laravel\PagSeguro\Checkout
 *
 * @author     Isaque de Souza <isaquesb@gmail.com>
 * @since      2016-01-12
 *
 * @copyright  Laravel\PagSeguro
 */
class DataFacade
{

    /**
     * @param array $data
     * @return array
     */
    public function ensureInstances(array $data)
    {
        if (array_key_exists('sender', $data)) {
            $data['sender'] = $this->ensureSenderInstance($data['sender']);
        }
        if (array_key_exists('receiver', $data)) {
            $data['receiver'] = $this->ensureReceiverInstance($data['receiver']);
        }
        if (array_key_exists('items', $data)) {
            $data['items'] = $this->ensureItemsInstance($data['items']);
        }
        if (array_key_exists('shipping', $data)) {
            $data['shipping'] = $this->ensureShippingInstance($data['shipping']);
        }
        if (array_key_exists('acceptedPaymentMethod', $data)) {
            $data['acceptedPaymentMethod'] = $this->ensurePaymentMethodInstance($data['acceptedPaymentMethod']);
        }
        return $data;
    }

    /**
     * @param array|SenderInterface $sender
     * @return SenderInterface
     */
    private function ensureSenderInstance($sender)
    {
        if ($sender instanceof SenderInterface) {
            return $sender;
        }
        if (!is_array($sender)) {
            throw new \InvalidArgumentException('Invalid sender data');
        }
        return new Sender($sender);
    }

    /**
     * @param array|ReceiverInterface $receiver
     * @return ReceiverInterface
     */
    private function ensureReceiverInstance($receiver)
    {
        if ($receiver instanceof ReceiverInterface) {
            return $receiver;
        }
        if (!is_array($receiver)) {
            throw new \InvalidArgumentException('Invalid receiver data');
        }
        return new Receiver($receiver);
    }

    /**
     * @param array|ItemCollection $items
     * @return ItemCollection
     */
    private function ensureItemsInstance($items)
    {
        if ($items instanceof ItemCollection) {
            return $items;
        }
        if (!is_array($items)) {
            throw new \InvalidArgumentException('Invalid items data');
        }
        return ItemCollection::factory($items);
    }

    /**
     * @param array|ShippingInterface $shipping
     * @return ShippingInterface
     */
    private function ensureShippingInstance($shipping)
    {
        if ($shipping instanceof ShippingInterface) {
            return $shipping;
        }
        if (!is_array($shipping)) {
            throw new \InvalidArgumentException('Invalid shipping data');
        }
        if (array_key_exists('address', $shipping)
            && is_array($shipping['address'])
        ) {
            $shipping['address'] = new Address($shipping['address']);
        }
        return new Shipping($shipping);
    }

    /**
     * @param array|AcceptedPaymentMethod
     * @return AcceptPaymentMethodInterface
     */
    private function ensurePaymentMethodInstance($acceptedPaymentMethod)
    {
        if ($acceptedPaymentMethod instanceof PaymentMethodInterface) {
            return $acceptedPaymentMethod;
        }
        if (!is_array($acceptedPaymentMethod)) {
            throw new \InvalidArgumentException('Invalid AcceptedPaymentMethod');
        }
        if (array_key_exists('include', $acceptedPaymentMethod)) {
            $acceptedPaymentMethod['include'] = $this->ensureIncludeInstance($acceptedPaymentMethod['include']);
        }
        if (array_key_exists('exclude', $acceptedPaymentMethod)) {
            $acceptedPaymentMethod['exclude'] = $this->ensureExcludeInstance($acceptedPaymentMethod['exclude']);
        }
        return new AcceptedPaymentMethod($acceptedPaymentMethod);
    }

    /**
     * @param array|IncludeTagInterface $include
     */
    private function ensureIncludeInstance($include)
    {
        if ($include instanceof IncludeTagInterface) {
            return $include;
        }
        if (!is_array($include)) {
            throw new \InvalidArgumentException('Invalid Include');
        }
        if (array_key_exists('paymentMethod', $include) && is_array($include['paymentMethod'])) {
            $include['paymentMethod'] = new PaymentMethod($include['paymentMethod']);
        }
        return new IncludeTag($include);
    }

    private function ensureExcludeInstance($exclude)
    {
        if ($exclude instanceof ExcludeTagInterface) {
            return $exclude;
        }
        if (!is_array($exclude)) {
            throw new \InvalidArgumentException('Invalid Exclude');
        }
        if (array_key_exists('paymentMethod', $exclude) && is_array($exclude['paymentMethod'])) {
            $exclude['paymentMethod'] = new PaymentMethod($exclude['paymentMethod']);
        }
        return new ExcludeTag($exclude);
    }
}
