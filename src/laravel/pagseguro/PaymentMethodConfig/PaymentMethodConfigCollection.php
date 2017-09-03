<?php 

namespace laravel\pagseguro\PaymentMethodConfig;

class PaymentMethodConfigCollection extends \ArrayObject
{
	public static function factory(array $data = [])
    {
        $collectionItems = [];
        $itr = new \ArrayIterator($data);
        while ($itr->valid()) {
            $item = $itr->current();
            if ($item instanceof PaymentMethodConfigInterface) {
                $collectionItems[] = $item;
            } elseif (is_array($item)) {
                $collectionItems[] = new PaymentMethodConfig($item);
            } else {
                $exptMsg = sprintf('Invalid item on key: %s', $itr->key());
                throw new \InvalidArgumentException($exptMsg);
            }
            $itr->next();
        }
        return new self($collectionItems);
    }
}