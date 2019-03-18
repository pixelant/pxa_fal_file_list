<?php
declare(strict_types=1);

namespace Pixelant\PxaFalFileList\ViewHelpers;

use TYPO3\CMS\Core\Resource\File;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;

/**
 * Class IsFileNewViewHelper
 * @package Pixelant\PxaFalFileList\ViewHelpers
 */
class IsFileNewViewHelper extends \TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper
{
    /**
     * Initialize arguments
     */
    public function initializeArguments()
    {
        $this->registerArgument('file', File::class, 'File object', true);
        $this->registerArgument('newDuration', 'string', 'New for amount of days', true);
    }

    /**
     * @param array $arguments
     * @param \Closure $renderChildrenClosure
     * @param RenderingContextInterface $renderingContext
     * @return mixed
     */
    public static function renderStatic(array $arguments, \Closure $renderChildrenClosure, RenderingContextInterface $renderingContext)
    {
        /** @var File $file */
        $file = $arguments['file'];
        $newDuration = (int)$arguments['newDuration'];
        if ($newDuration <= 0) {
            return false;
        }

        $newUntil = (new \DateTime())->modify("-{$newDuration} days");

        return $file->getProperties()['crdate'] > $newUntil->getTimestamp();
    }
}
