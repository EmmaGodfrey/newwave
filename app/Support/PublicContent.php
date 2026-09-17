<?php

namespace App\Support;

class PublicContent
{
    /** Public article formatting without executable HTML or third-party embeds. */
    public static function render(?string $html): string
    {
        $document = new \DOMDocument('1.0', 'UTF-8');
        $previous = libxml_use_internal_errors(true);
        $document->loadHTML('<?xml encoding="UTF-8"><html><body>'.($html ?? '').'</body></html>', LIBXML_NONET);
        libxml_clear_errors();
        libxml_use_internal_errors($previous);
        $allowed = ['p', 'br', 'strong', 'b', 'em', 'i', 'u', 'h2', 'h3', 'h4', 'ul', 'ol', 'li', 'blockquote', 'a'];
        $clean = function ($node) use (&$clean, $allowed): string {
            if ($node instanceof \DOMText) return htmlspecialchars($node->textContent, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
            if (!$node instanceof \DOMElement) return '';
            $tag = strtolower($node->tagName);
            if (in_array($tag, ['script', 'style', 'iframe', 'object', 'embed', 'svg', 'form', 'template'])) return '';
            $text = '';
            foreach ($node->childNodes as $child) $text .= $clean($child);
            if (!in_array($tag, $allowed)) return $text;
            if ($tag === 'br') return '<br>';
            $attributes = '';
            if ($tag === 'a') {
                $href = trim($node->getAttribute('href'));
                if (preg_match('~^(https?://|mailto:|/(?!/)|#)~i', $href)) {
                    $attributes = ' href="'.htmlspecialchars($href, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8').'" rel="noopener noreferrer"';
                }
            }
            return '<'.$tag.$attributes.'>'.$text.'</'.$tag.'>';
        };
        $result = '';
        foreach ($document->getElementsByTagName('body')->item(0)->childNodes as $node) $result .= $clean($node);
        return $result;
    }
}
