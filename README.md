# page-callback

component to permit to change the return url of page in function of the calling page.

Calling page 1 -> page 3 -> click button "return" -> return to calling page 1
Calling page 2 -> page 3 -> click button "return"  return to calling page 2

The calling page url is stored by the adapter "StoragePageCallbackInterface"

example (replace the array property by a session storage or other) :

```php
<?php

namespace Tests\adapter;

use SilverheadPageCallback\adapter\StoragePageCallbackInterface;
use SilverheadPageCallback\entity\PageCallback;

class StoragePageCallBackMock implements StoragePageCallbackInterface
{
private array $pageCallbacks;

    function storePageCallback(PageCallback $pageCallback): void
    {
        $this->pageCallbacks[$pageCallback->getKeyCallingPage()] = $pageCallback;
    }

    function unStorePageCallback(string $keyCallingPage): ?PageCallback
    {
        if(isset($this->pageCallbacks[$keyCallingPage])){
            return $this->pageCallbacks[$keyCallingPage];
        }

        return null;
    }
}
```

Usage example in calling page :

```php
<?php

namespace App\Controller;

use StoragePageCallBackMock;
use \SilverheadPageCallback\PageCallbackHandler;

class CallingPageController
{
    //...

    public function myCallingPageAction()
    {
     //...
     
     // link for callback to here for any link of the page
     $StoragePageCallBackMock = new StoragePageCallBackMock();
     $pageCallBack = new PageCallbackHandler($StoragePageCallBackMock);
     
     // example for link-1.php
     $pageCallBack->setPageCallback('link-1', 'myControllerAction.php', ['id'=>1], 'anchor');
      // example for link-2.php
     $pageCallBack->setPageCallback('link-2', 'myControllerAction.php', ['id'=>1], 'anchor'); 
     
     //...
    } 

    //...
}
```
Usage example in link-1 page :

```php
<?php

namespace App\Controller;

use StoragePageCallBackMock;
use \SilverheadPageCallback\PageCallbackHandler;

class LinkPageController
{

    //...

    public function myLink1Action()
    {
     //...
     
     // init pageCallbackHandler
     $StoragePageCallBackMock = new StoragePageCallBackMock();
     $pageCallBack = new PageCallbackHandler($StoragePageCallBackMock);
     
     // example for link-1.php -> for the return button of the page, return tu calling page url
     $returnUrl = $pageCallBack->getPageCallback('link-1');
     if (null === $returnUrl){
        $returnUrl = 'returnUrlByDefault.php';
     }
     
     //...
    }
}
```
