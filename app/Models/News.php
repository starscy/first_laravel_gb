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
    protected $guarded = [];

    public function source()
    {
        return $this->belongsTo(Source::class, 'source_id', 'id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_has_news', 'news_id', 'category_id');
    }
}
