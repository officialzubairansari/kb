<?php

namespace App\Models;

use App\Models\Scopes\IsDeletedScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'contact',
        'whatsapp',
        'country_id',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::addGlobalScope(new IsDeletedScope());
    }

}
