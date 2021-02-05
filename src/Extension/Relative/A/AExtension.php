<?php

namespace HtmlSanitizer\Extension\Relative\A;

use HtmlSanitizer\Extension\ExtensionInterface;
use HtmlSanitizer\Extension\Relative\A\NodeVisitor\ANodeVisitor;

final class AExtension implements ExtensionInterface
{
    public function getName(): string
    {
        return 'relative-a';
    }

    public function createNodeVisitors(array $config = []): array
    {
        return [
            'a' => new ANodeVisitor($config['tags']['a'] ?? [])
        ];
    }


}
