# html-sanitizer-relative

## Installation

`composer require olegatro/html-sanitizer-relative`

### Example

```php

require_once __DIR__ . '/vendor/autoload.php';

use HtmlSanitizer\Extension\Basic\BasicExtension;
use HtmlSanitizer\SanitizerBuilder;

$builder = new SanitizerBuilder();
$builder->registerExtension(new BasicExtension());

//relative-a and relative-image
$builder->registerExtension(new \HtmlSanitizer\Extension\Relative\A\AExtension());
$builder->registerExtension(new \HtmlSanitizer\Extension\Relative\Image\ImageExtension());

$config = [
    'extensions' => ['basic', 'relative-a', 'relative-image'],
    'tags'       => [
        'div' => [
            'allowed_attributes' => ['class', 'title']
        ],
        'img' => [
            'allowed_attributes' => ['src', 'alt', 'title', 'class']
        ]
    ]
];

$sanitizer = $builder->build($config);

//Examples

$rawHtml = '<p><a href="https://github.com">github.com</a></p>';
$rawHtml .= '<p><a href="/github.com">github.com</a></p>';
$safeHtml = $sanitizer->sanitize($rawHtml);

//<p><a href="https://github.com">github.com</a></p>
//<p><a href="/github.com">github.com</a></p>



$rawHtml = '<p><img src="https://github.com/favicon.ico" alt="" class="favicon-class"></p>';
$rawHtml .= '<p><img src="favicon.ico" alt="github favicon"></p>';
$safeHtml = $sanitizer->sanitize($rawHtml);

//<p><img src="https://github.com/favicon.ico" alt class="favicon-class" /></p>
//<p><img src="favicon.ico" alt="github favicon" /></p>

```
