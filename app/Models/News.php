<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    public function getNews ():Collection
    {
       return DB::table($this->table)->get();
    }

    public function getNewsById (int $id)
    {
        return DB::table($this->table)->find($id);
    }
}
