<?php declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use SilverheadPageCallback\entity\PageCallback;
use SilverheadPageCallback\adapter\StoragePageCallbackInterface;
use SilverheadPageCallback\PageCallbackHandler;
use Tests\adapter\StoragePageCallBackMock;

class PageCallbackHandlerTest extends TestCase
{
    /**
     * @var StoragePageCallbackInterface
     */
    private $storage;

    public function setUp(){
        $this->storage = new StoragePageCallBackMock();
    }

    public function testCanBeCreatedPageCallback(): void
    {
        $pageCallBackHandler = new PageCallbackHandler($this->storage);

        $pageCallBackHandler->setPageCallback('test', 'test.php', array('key'=>'value'), 'anchor');

        $this->assertInstanceOf(PageCallback::class, $pageCallBackHandler->getPageCallback('test'));
    }

    public function testPageCallbackNotFound(): void
    {
        $pageCallBackHandler = new PageCallbackHandler($this->storage);

        $pageCallBackHandler->setPageCallback('test', 'test.php', array('key'=>'value'), 'anchor');

        $this->assertNull($pageCallBackHandler->getPageCallback('test2'));
    }
}
