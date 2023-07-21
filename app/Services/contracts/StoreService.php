<?php
declare(strict_types=1);

namespace App\Services\contracts;

use App\Models\News;

interface StoreService
{
    public function store($data):bool;

    public function update(News $news, $data):bool;
}
