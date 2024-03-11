<?php
/*
 * This file is part of the TYPO3 CMS project.
 *
 * ©2017 Felix Althaus <felix.althaus@undkonsorten.com>
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */


namespace Undkonsorten\EmailTemplate\Rte;


use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;

/**
 * Class PostProcess
 *
 * You can use this class for stdWrap processing as postUserFunc or similar.
 * See the methods for detailed description
 *
 * @package Undkonsorten\EmailTemplate\Rte
 */
class PostProcess
{

    /**
     * @var ContentObjectRenderer
     */
    protected $cObj;

    /**
     * Use this method to wrap a <button> tag around links for INKY
     * .postUserFunc = Undkonsorten\EmailTemplate\Rte\PostProcess->wrapButton
     * .postUserFunc.className = button
     *
     * @param string $content The content from RTE (i.e. <a class="button">-tag)
     * @param array $conf Configuration for the userFunc
     *      'className' ClassName to look for in <a>-tag from RTE, defaults to "button"
     *      'additionalClasses' You can enter additional CSS classes here, like primary, secondary, rounded, radius etc.
     *          Separate multiple classes with space.
     * @return string The <a>-tag wrapped with <button>-tag
     */
    public function wrapButton(string $content, array $conf = null): string
    {
        $conf = $conf ?? [];
        $className = $conf['className'] ?? 'button';
        $attributes = GeneralUtility::get_tag_attributes($content);
        if (isset($attributes['class']) && in_array($className,
                GeneralUtility::trimExplode(' ', $attributes['class'], true))
        ) {
            $content = strip_tags($content);
            $additionalClasses = isset($conf['additionalClasses']) ? sprintf(' class="%s"', $conf['additionalClasses']) : '';
            $href = sprintf(' data-href="%s"', $attributes['href']);
            $content = sprintf('<button%s%s>%s</button>', $additionalClasses, $href, $content);
        }
        return $content;
    }

    public function setContentObjectRenderer(ContentObjectRenderer $cObj): void
    {
        $this->cObj = $cObj;
    }
}
