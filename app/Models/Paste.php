<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Paste extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'title',
        'lang_id',
        'code',
        'access_mode',
        'slug',
        'expiration_time',
        'created_at',
        'updated_at'
    ];

    public function lang(){
        return $this->belongsTo(Lang::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
