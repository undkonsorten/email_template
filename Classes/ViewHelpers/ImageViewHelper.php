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


namespace Undkonsorten\EmailTemplate\ViewHelpers;

/**
 * Class ImageViewHelper
 *
 * @package Undkonsorten\EmailTemplate\ViewHelpers
 */
class ImageViewHelper extends \Undkonsorten\HtmlMailUtility\ViewHelpers\ImageViewHelper
{

    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerArgument('overrideWidthAttribute', 'string', 'override width attribute with this value');
        $this->registerArgument('overrideHeightAttribute', 'string', 'override height attribute with this value');
    }

    public function render()
    {
        if ($this->hasArgument('overrideWidthAttribute')) {
            $this->tag->addAttribute('width', $this->arguments['overrideWidthAttribute']);
            $this->arguments['omitDimensionAttributes'] = true;
        }
        if ($this->hasArgument('overrideHeightAttribute')) {
            $this->tag->addAttribute('height', $this->arguments['overrideHeightAttribute']);
            $this->arguments['omitDimensionAttributes'] = true;
        }
        return parent::render();
    }

}
