<?php

namespace Silverhead\PageCallback\Tests\Adapter;

use Silverhead\PageCallback\Adapter\StoragePageCallbackInterface;
use Silverhead\PageCallback\Entity\PageCallback;

class StoragePageCallBackMock implements StoragePageCallbackInterface
{
    private array $pageCallbacks;

    function storePageCallback(PageCallback $pageCallback): void
    {
        $this->pageCallbacks[$pageCallback->getKeyCalledPage()] = $pageCallback;
    }

    function unStorePageCallback(string $keyCalledPage): ?PageCallback
    {
        if(isset($this->pageCallbacks[$keyCalledPage])){
            return $this->pageCallbacks[$keyCalledPage];
        }

        return null;
    }
}
