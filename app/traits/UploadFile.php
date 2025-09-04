<?php
namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait UploadFile
{
    public function upload(string $disk = 'public', UploadedFile $file, bool $originalname = false): string
    {
        if (!Storage::disk('public')->exists($disk)) {
            Storage::disk('public')->makeDirectory($disk);
        }

        if ($originalname) {
            return $file->storeAs($disk, $file->getClientOriginalName(), 'public');
        }

        return $file->store($disk, 'public');
    }

    public function exists(string $file): bool
    {
        return Storage::disk('public')->exists($file);
    }

    public function remove(string $file): void
    {
        if ($this->exists($file)) {
            Storage::disk('public')->delete($file);
        }
    }
}
?>