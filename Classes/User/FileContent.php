<?php
namespace Undkonsorten\EmailTemplate\User;
/*
 * This file is part of the TYPO3 CMS project.
 *
 * ©2021 Karsten Nowak <nowak@undkonsorten.com>
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

use TYPO3\CMS\Core\Resource\Exception\FileDoesNotExistException;
use TYPO3\CMS\Core\Resource\Exception\InvalidFileException;
use TYPO3\CMS\Core\Resource\Exception\InvalidFileNameException;
use TYPO3\CMS\Core\Resource\Exception\InvalidPathException;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Frontend\Resource\FilePathSanitizer;

class FileContent
{
    /**
     * Output the content of given file
     *
     * @param string   Empty string (no content to process)
     * @param array    TypoScript configuration
     * @return string   File content
     * @throws FileDoesNotExistException
     * @throws InvalidFileException
     * @throws InvalidFileNameException
     * @throws InvalidPathException
     */
    public function getContent(string $content, array $conf): string
    {
        $file = GeneralUtility::makeInstance(FilePathSanitizer::class)->sanitize($conf['file']);
        return file_get_contents($file);
    }
}
