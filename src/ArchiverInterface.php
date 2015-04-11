<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 5/19/14
 * Time: 5:42 PM
 */

namespace NadimTuhin\Archiver;

interface ArchiverInterface
{
    /**
     * Sets the filename for the backup.
     *
     * When you provide the filename make sure you obsolete the
     * file extension as this gets added automatically.
     *
     * @param  string  $filename
     * @return void
     */
    public function setInputFilename($filename);

    /**
     * Returns the filename for the backup.
     *
     * @return string
     */
    public function getOutputFilename();

    /**
     * Executes the backup command.
     *
     * @return void
     * @throws \McCool\DatabaseBackup\Processors\ProcessorException
     */
    public function archive();
}