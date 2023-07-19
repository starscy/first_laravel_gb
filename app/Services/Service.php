<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\News;

interface Service
{
    public function store($data):bool;

    public function update(News $news, $data):bool;
}
