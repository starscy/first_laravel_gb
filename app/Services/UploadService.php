<?php
declare(strict_types=1);

namespace App\Services;

use App\Services\contracts\Upload;
use Illuminate\Http\UploadedFile;

class UploadService implements Upload
{
    public function create(UploadedFile $uploadFile): string
    {
        $path = $uploadFile->storeAs('news_images', $uploadFile->hashName(), 'public');

        if(!$path) {
            throw new \Exception('file was not upload');
        }

        return  $path;
    }
}
