<?php declare(strict_types=1);

namespace Silverhead\PageCallback\Tests;

use PHPUnit\Framework\TestCase;
use Silverhead\PageCallback\entity\PageCallback;
use Silverhead\PageCallback\adapter\StoragePageCallbackInterface;
use Silverhead\PageCallback\PageCallbackHandler;
use Silverhead\PageCallback\Tests\Adapter\StoragePageCallBackMock;

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
