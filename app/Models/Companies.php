<?php

namespace App\Models;

use App\Models\Scopes\IsCancelledScope;
use App\Models\Scopes\IsDeletedScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo',
    ];
}
