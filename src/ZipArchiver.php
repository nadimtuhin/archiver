<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 5/19/14
 * Time: 5:42 PM
 */

namespace NadimTuhin\Archiver;
use Symfony\Component\Process\Process;

class ZipArchiver implements ArchiverInterface
{
    /**
     * The process instance.
     *
     * @var \Symfony\Component\Process\Process
     */
    protected $process;


    /**
     * The password.
     *
     * @var string
     */
    protected $password;

    /**
     * The filename.
     *
     * @var string
     */
    protected $filename;

    /**
     * Initializes the ZipArchiver instance.
     * @param Process $process
     */
    public function __construct(Process $process)
    {
        $this->process = $process;
    }


    /**
     * Sets the filename for the file.
     *
     * When you provide the filename make sure you obsolete the
     * file extension as this gets added automatically.
     *
     * @param  string  $filename
     * @return void
     */
    public function setInputFilename($filename)
    {
        $this->filename = $filename;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }


    /**
     * Returns the filename for the backup.
     *
     * @return string
     */
    public function getOutputFilename()
    {
        return $this->filename . '.zip';
    }


    /**
     * Executes the backup command.
     */
    public function archive()
    {
        $this->process->setCommandLine($this->getCommand());
        $this->process->run();

        if ($this->process->getErrorOutput()) {
            throw new \RuntimeException($this->process->getErrorOutput());
        }
    }


    /**
     * Returns the backup command.
     *
     * @return string
     */
    protected function getCommand()
    {
        return sprintf('zip --password %s %s %s',
            escapeshellarg($this->password),
            escapeshellarg($this->getOutputFilename()),
            escapeshellarg($this->filename)
        );
    }
}