<?php

namespace AydinHassan\MagentoCoreComposerInstaller;

/**
 * Class Exclude
 * @package AydinHassan\MagentoCoreComposerInstaller
 */
class Exclude
{

    /**
     * @var array
     */
    private $excludes;

    /**
     * @param array $excludes
     */
    public function __construct(array $excludes = array())
    {
        $this->excludes = $excludes;
    }

    /**
     * Should we exclude this file from the install?
     *
     * @param string $filePath
     * @return bool
     */
    public function exclude($filePath)
    {
        $filePath = $this->normalizePath($filePath);
        foreach ($this->excludes as $exclude) {
            if (substr($filePath, 0, strlen($exclude)) === $exclude) {
                return true;
            }
        }

        return false;
    }

    /**
     * Normalizes paths to UNIX format
     *
     * @param string $file
     * @return string
     */
    private function normalizePath($file)
    {
        return str_replace(DIRECTORY_SEPARATOR, '/', $file);
    }
}
