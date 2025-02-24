<?php

namespace App\Models;

use App\Models\Scopes\IsDeletedScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
    ];

    public function pages()
    {
        return $this->belongsToMany(Page::class, 'page_sections');
    }
}
