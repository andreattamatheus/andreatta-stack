<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'img_url', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCreatedAtAttribute($createdAt)
    {
        return Carbon::parse($createdAt)->format('d/m/Y');
    }

    // public function setCreatedAtAttribute($createdAt)
    // {
    //   $this->attributes['created_at'] = Carbon::parse($createdAt)->format('d/m/Y');
    // }
}
