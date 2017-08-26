<?php
namespace MyVendor\Stream\Resource\Page;

use BEAR\RepositoryModule\Annotation\Cacheable;
use BEAR\Resource\ResourceObject;
use BEAR\Streamer\StreamTransferInject;

/**
 * @Cacheable()
 */
class Image extends ResourceObject
{
    use StreamTransferInject;

    public function onGet(string $name = 'inline image') : ResourceObject
    {
        $fp = fopen(__DIR__ . '/BEAR.jpg', 'r');
        stream_filter_append($fp, 'convert.base64-encode'); // image base64 format
        $this->body = [
            'name' => $name,
            'image' => $fp
        ];

        return $this;
    }
}
