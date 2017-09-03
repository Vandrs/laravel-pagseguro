<?php

namespace laravel\pagseguro\PaymentMethodConfig\Config;

class ConfigCollection extends \ArrayObject
{

    public static function factory(array $data = [])
    {
        $collectionItems = [];
        $itr = new \ArrayIterator($data);
        while ($itr->valid()) {
            $item = $itr->current();
            if ($item instanceof ConfigInterface) {
                $collectionItems[] = $item;
            } elseif (is_array($item)) {
                $collectionItems[] = new Config($item);
            } else {
                $exptMsg = sprintf('Invalid item on key: %s', $itr->key());
                throw new \InvalidArgumentException($exptMsg);
            }
            $itr->next();
        }
        return new self($collectionItems);
    }
}
