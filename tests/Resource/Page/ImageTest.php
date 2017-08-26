<?php
namespace MyVendor\Stream\Resource\Page;

use BEAR\Package\AppInjector;
use BEAR\Resource\ResourceInterface;
use BEAR\Resource\ResourceObject;
use PHPUnit\Framework\TestCase;

class ImageTest extends TestCase
{
    /**
     * @var \BEAR\Resource\ResourceInterface
     */
    private $resource;

    protected function setUp()
    {
        parent::setUp();
        $this->resource = (new AppInjector('MyVendor\Stream', 'app'))->getInstance(ResourceInterface::class);
    }

    public function testOnGet()
    {
        $index = $this->resource->uri('page://self/image')(['name' => 'BEAR.Sunday']);
        /* @var $index Image */
        $this->assertSame(200, $index->code);
        $this->assertSame('BEAR.Sunday', $index['name']);

        return $index;
    }

    /**
     * @depends testOnGet
     */
    public function testView(ResourceObject $ro)
    {
        $json = json_decode((string) $ro);
        $this->assertSame('BEAR.Sunday', $json->name);
    }
}
