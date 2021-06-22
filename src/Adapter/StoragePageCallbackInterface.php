<?php

namespace Silverhead\PageCallback\Adapter;

use Silverhead\PageCallback\Entity\PageCallback;

interface StoragePageCallbackInterface
{
    /**
     * Put pageCallback in memory (session, database etc..)
     * @param PageCallback $pageCallback
     * @return void
     */
    function storePageCallback(PageCallback $pageCallback): void;

    /**
     * Get pageCallback of memory (session, database etc..)
     * @param string $keyCalledPage
     * @return PageCallback|null
     */
    function unStorePageCallback(string $keyCalledPage): ?PageCallback;
}
