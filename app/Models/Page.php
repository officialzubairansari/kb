<?php

namespace App\Models;

use App\Models\Scopes\IsDeletedScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'route',
    ];

    public function sections()
    {
        return $this->belongsToMany(Section::class, 'page_sections');
    }

}
