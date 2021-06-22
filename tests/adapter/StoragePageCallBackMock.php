<?php

namespace Tests\adapter;

use SilverheadPageCallback\adapter\StoragePageCallbackInterface;
use SilverheadPageCallback\entity\PageCallback;

class StoragePageCallBackMock implements StoragePageCallbackInterface
{
    private array $pageCallbacks;

    function storePageCallback(PageCallback $pageCallback): void
    {
        $this->pageCallbacks[$pageCallback->getKeyCalledPage()] = $pageCallback;
    }

    function unStorePageCallback(string $keyCallingPage): ?PageCallback
    {
        if(isset($this->pageCallbacks[$keyCallingPage])){
            return $this->pageCallbacks[$keyCallingPage];
        }

        return null;
    }
}
