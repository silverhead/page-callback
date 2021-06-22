<?php

namespace Silverhead\PageCallback;

use Silverhead\PageCallback\Adapter\StoragePageCallbackInterface;
use Silverhead\PageCallback\Entity\PageCallback;

class PageCallbackHandler
{
    private StoragePageCallbackInterface $storagePageCallback;

    public function __construct(StoragePageCallbackInterface $storagePageCallback)
    {
        $this->storagePageCallback = $storagePageCallback;
    }

    public function setPageCallback($keyCalledPage, $callBackUrl, $urlParams = [], $anchor = null): self
    {
        $pageCallBack = new PageCallback();
        $pageCallBack->setKeyCalledPage($keyCalledPage)
            ->setCallingPageUrl($callBackUrl)
            ->setUrlParams($urlParams)
            ->setAnchor($anchor);

        $this->storagePageCallback->storePageCallback($pageCallBack);

        return $this;
    }

    /**
     * @param string $keyCalledPage
     * @return PageCallback|null
     */
    public function getPageCallback(string $keyCalledPage): ?PageCallback
    {
        return $this->storagePageCallback->unStorePageCallback($keyCalledPage);
    }
}
