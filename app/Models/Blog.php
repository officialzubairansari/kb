<?php

namespace App\Models;

use App\Models\Scopes\IsDeletedScope;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'content',
        'featured_image',
        'author_id',
        'category_id',
        'is_deleted',
    ];

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::addGlobalScope(new IsDeletedScope());
    }

    public function nameAuthor()
    {
        return $this->belongsTo(Author::class, 'author_id', 'id');
    }

    public function nameBlogCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id', 'id');
    }

    /**
     * Get the creation date.
     *
     * @return string
     */
    public function getCreatedDateAttribute()
    {
        // Using Carbon to get the date
        return Carbon::parse($this->attributes['created_at'])->format('d');
    }

    /**
     * Get the creation month.
     *
     * @return string
     */
    public function getCreatedMonthAttribute()
    {
        // Using Carbon to get the month name
        return Carbon::parse($this->attributes['created_at'])->format('M');
    }

    /**
     * Get the creation year.
     *
     * @return string
     */
    public function getCreatedYearAttribute()
    {
        // Using Carbon to get the year
        return Carbon::parse($this->attributes['created_at'])->format('Y');
    }
}
