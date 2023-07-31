<?php
declare(strict_types=1);

namespace App\Services\contracts;

use App\Models\News;

interface StoreService
{
    public function store(array $data): News|string;

    public function update(News $news, array $data): News|string;
}
