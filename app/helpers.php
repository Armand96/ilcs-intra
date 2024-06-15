<?php

use voku\helper\HtmlDomParser;

if (!function_exists('limit_html_content')) {
    /**
     * Limit the HTML content to a certain number of characters while preserving HTML tags.
     *
     * @param string $htmlContent
     * @param int $limit
     * @return string
     */
    function limit_html_content($htmlContent, $limit = 100)
    {
        // Parse the HTML content
        $dom = HtmlDomParser::str_get_html($htmlContent);
        $output = '';
        $count = 0;

        // Iterate through all elements
        foreach ($dom->find('*') as $element) {
            $text = $element->plaintext;
            $length = mb_strlen($text);

            if ($count + $length > $limit) {
                $remaining = $limit - $count;
                $output .= htmlspecialchars(mb_substr($text, 0, $remaining));
                break;
            }

            $output .= $element->outertext;
            $count += $length;
        }

        // Fix unclosed tags
        $dom = HtmlDomParser::str_get_html($output);

        return $dom->save();
    }
}
