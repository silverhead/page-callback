<?php

namespace Silverhead\PageCallback\Tests\Entity;

use PHPUnit\Framework\TestCase;
use Silverhead\PageCallback\Entity\PageCallback;

class PageCallbackTest extends TestCase
{
    public function testSetterGetterPageCallback(): void
    {
        $pageCallback = new PageCallback();
        $pageCallback->setKeyCalledPage('test');
        $pageCallback->setUrlParams(['id'=>1,'name'=>'test1']);
        $pageCallback->setCallingPageUrl('test.php');
        $pageCallback->setAnchor('testAnchor');

        $this->assertEquals('test', $pageCallback->getKeyCalledPage());
        $this->assertEquals(['id'=>1,'name'=>'test1'], $pageCallback->getUrlParams());
        $this->assertEquals('test.php', $pageCallback->getCallingPageUrl());
        $this->assertEquals('testAnchor', $pageCallback->getAnchor());

        $this->assertEquals('test.php?id=1&name=test1#testAnchor', $pageCallback->getFormatedUrl());
    }
}
