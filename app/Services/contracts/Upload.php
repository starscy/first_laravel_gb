<?php
declare(strict_types=1);

namespace App\Services\contracts;

use Illuminate\Http\UploadedFile;

interface Upload
{
    public function create(UploadedFile $uploadFile): string;

}
