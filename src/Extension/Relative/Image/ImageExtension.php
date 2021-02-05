<?php

namespace HtmlSanitizer\Extension\Relative\Image;

use HtmlSanitizer\Extension\ExtensionInterface;
use HtmlSanitizer\Extension\Relative\Image\NodeVisitor\ImgNodeVisitor;

final class ImageExtension implements ExtensionInterface
{
    public function getName(): string
    {
        return 'relative-image';
    }

    public function createNodeVisitors(array $config = []): array
    {
        return [
            'img' => new ImgNodeVisitor($config['tags']['img'] ?? [])
        ];
    }


}
