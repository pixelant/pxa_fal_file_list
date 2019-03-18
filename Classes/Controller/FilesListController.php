<?php
declare(strict_types=1);

namespace Pixelant\PxaFalFileList\Controller;

use TYPO3\CMS\Core\LinkHandling\LinkService;
use TYPO3\CMS\Core\Resource\Exception\FolderDoesNotExistException;
use TYPO3\CMS\Core\Resource\Folder;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Frontend\Service\TypoLinkCodecService;

/**
 * Class FilesListController
 * @package Pixelant\PxaFalFileList\Controller
 */
class FilesListController extends ActionController
{
    /**
     * @var Folder
     */
    protected $folder = null;

    /**
     * Initialize
     */
    public function initializeAction()
    {
        $this->folder = $this->getFolderFromTypolink($this->settings['folder'] ?? '');
    }

    /**
     * List files on FE
     */
    public function listAction()
    {
        if ($this->folder !== null) {
            $files = $this->folder->getFiles(
                0,
                0,
                Folder::FILTER_MODE_USE_OWN_AND_STORAGE_FILTERS,
                false,
                $this->settings['order_by'] ?? 'name',
                $this->settings['order_direction'] === 'desc'
            );

            $this->view->assign('files', $files);

        }
        $this->view->assign('folder', $this->folder);
    }

    /**
     * Read typolink selection in flexform and get folder from it
     *
     * @param string $typolink
     * @return Folder|null
     */
    protected function getFolderFromTypolink(string $typolink): ?Folder
    {
        if (!empty($typolink)) {
            /** @var TypoLinkCodecService $typolinkService */
            $typolinkService = GeneralUtility::makeInstance(TypoLinkCodecService::class);
            $linkParts = $typolinkService->decode($typolink);

            /** @var LinkService $linkService */
            $linkService = GeneralUtility::makeInstance(LinkService::class);

            try {
                $linkData = $linkService->resolve($linkParts['url']);
                /** @var Folder $folder */
                $folder = $linkData['folder'];

                return $folder;
            } catch (FolderDoesNotExistException $e) {
                // nothing to do, something wrong with folder
            }
        }

        return null;
    }
}
