<?php
declare(strict_types=1);

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Pagination\LengthAwarePaginator;


class  News extends Model
{
    use HasFactory;
    use Filterable;

    protected $table = 'news';
    protected $fillable = [
        'title',
        'description',
        'image',
        'author',
        'source_id',
    ];


    public function source(): BelongsTo
    {
        return $this->belongsTo(Source::class, 'source_id', 'id');
    }

    public function categories() :BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_has_news', 'news_id', 'category_id');
    }

    ////Scopes

    public function scopeActive(Builder $query):LengthAwarePaginator
    {
        return $query->where('active',1)->paginate(10);
    }
}
