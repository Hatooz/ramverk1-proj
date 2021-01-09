<?php


namespace Hami\MyTextFilter;

use Michelf\MarkdownExtra;

/**
 * Filter and format text content.
 *
 * @SuppressWarnings(PHPMD.UnusedFormalParameter)
 * @SuppressWarnings(PHPMD.UnusedPrivateField)
 */
class MyTextFilter
{
    



    /**
     * Format text according to Markdown syntax.
     *
     * @param string $text The text that should be formatted.
     *
     * @return string as the formatted html text.
     */
    public function markdown($text)
    {
        return MarkdownExtra::defaultTransform($text);
    }



}
