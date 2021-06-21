<?php

namespace SilverheadPageCallback\adapter;

use SilverheadPageCallback\entity\PageCallback;

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
     * @param string $keyCallingPage
     * @return PageCallback|null
     */
    function unStorePageCallback(string $keyCallingPage): ?PageCallback;
}
