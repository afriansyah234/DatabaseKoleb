<?php
namespace App\Base\Interfaces\Uploads;
use \Illuminate\Http\UploadedFile;

interface UploadInterface
{
    /**
     * Summary of upload
     * @param string $disk
     * @param UploadedFile $file
     * @param bool $originalname
     * @return string
     */
    public function upload(string $disk, UploadedFile $file, bool $originalname = false): string;

    /**
     * Summary of exists
     * @param string $file
     * @return bool
     */
    public function exists(string $file): bool;

    /**
     * Summary of remove
     * @param string $file
     * @return void
     */
    public function remove(string $file): void;
}
?>