<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UrlShortener extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'url',
        'short_url',
        'clicks',
        'user_id',
        'active',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setShortUrl($value)
    {
        $this->attributes['short_url'] = strtolower($value);

        return $this;
    }

    public function getShortUrlAttribute($value)
    {
        return config('app.url').'/redirect/'.$value;
    }
}
