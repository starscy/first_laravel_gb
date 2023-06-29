<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CategoryHasNews extends Model
{
    use HasFactory;

    protected $table = 'category_has_news';
    protected $guarded = [];


}
