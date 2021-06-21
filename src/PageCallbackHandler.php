<?php

namespace SilverheadPageCallback;

use SilverheadPageCallback\adapter\StoragePageCallbackInterface;
use SilverheadPageCallback\entity\PageCallback;

class PageCallbackHandler
{
    private StoragePageCallbackInterface $storagePageCallback;

    public function __construct(StoragePageCallbackInterface $storagePageCallback)
    {
        $this->storagePageCallback = $storagePageCallback;
    }

    public function setPageCallback($keyCallingPage, $callBackUrl, $urlParams = [], $anchor = null): self
    {
        $pageCallBack = new PageCallback();
        $pageCallBack->setKeyCallingPage($keyCallingPage)
            ->setCallingPageUrl($callBackUrl)
            ->setUrlParams($urlParams)
            ->setAnchor($anchor);

        $this->storagePageCallback->storePageCallback($pageCallBack);

        return $this;
    }

    /**
     * @param string $keyCallingPage
     * @return PageCallback|null
     */
    public function getPageCallback(string $keyCallingPage): ?PageCallback
    {
        return $this->storagePageCallback->unStorePageCallback($keyCallingPage);
    }
}
