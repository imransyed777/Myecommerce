<?php

// TODO PHP7.x; declare(strict_type=1);
// TODO PHP7.x; type hints & return types

namespace WPStaging\Backup\Entity;

use WPStaging\Backup\BackupFileIndex;
use WPStaging\Framework\Filesystem\PathIdentifier;
use WPStaging\Framework\Traits\ResourceTrait;

/**
 * Class ExtractingFileEntity
 *
 * This is a OOP representation of a file being extracted.
 *
 * @see     \WPStaging\Backup\Service\Extractor
 *
 * @package WPStaging\Backup\Entity\Service
 */
class FileBeingExtracted
{
    use ResourceTrait;

    /** @var string */
    private $identifiablePath;

    /** @var string */
    private $relativePath;

    /** @var int */
    private $start;

    /** @var int */
    private $totalBytes;

    /** @var int */
    private $writtenBytes = 0;

    protected $extractFolder;

    /** @var PathIdentifier */
    protected $pathIdentifier;

    /** @var int 1 if yes, 0 if no. */
    protected $isCompressed;

    public function __construct($identifiablePath, $extractFolder, PathIdentifier $pathIdentifier, BackupFileIndex $backupFileIndex)
    {
        $this->identifiablePath = $identifiablePath;
        $this->extractFolder = trailingslashit($extractFolder);
        $this->start = $backupFileIndex->bytesStart;
        $this->totalBytes = $backupFileIndex->bytesEnd;
        $this->pathIdentifier = $pathIdentifier;
        $this->isCompressed = $backupFileIndex->isCompressed;
        $this->relativePath = $this->pathIdentifier->getPathWithoutIdentifier($this->identifiablePath);
    }

    public function getBackupPath()
    {
        return $this->extractFolder . $this->pathIdentifier->getPathWithoutIdentifier($this->identifiablePath);
    }

    public function findReadTo()
    {
        $maxLengthToWrite = 512 * KB_IN_BYTES;

        $remainingBytesToWrite = $this->totalBytes - $this->writtenBytes;

        return max(0, min($remainingBytesToWrite, $maxLengthToWrite));
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->identifiablePath;
    }

    /**
     * @return string
     */
    public function getRelativePath()
    {
        return $this->relativePath;
    }

    /**
     * @return int
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @return int
     */
    public function getTotalBytes()
    {
        return $this->totalBytes;
    }

    /**
     * @return int
     */
    public function getWrittenBytes()
    {
        return $this->writtenBytes;
    }

    /**
     * @param int $writtenBytes
     */
    public function setWrittenBytes($writtenBytes)
    {
        $this->writtenBytes = $writtenBytes;
    }

    public function addWrittenBytes($writtenBytes)
    {
        $this->writtenBytes += $writtenBytes;
    }

    public function isFinished()
    {
        return $this->writtenBytes >= $this->totalBytes;
    }

    /**
     * @return bool|int
     */
    public function getIsCompressed()
    {
        return $this->isCompressed;
    }
}
