<?php

namespace App\Models;

use App\Models\Scopes\IsDeletedScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageSection extends Model
{
    use HasFactory;


    protected $fillable = [
        'page_id',
        'section_id',
    ];

}
