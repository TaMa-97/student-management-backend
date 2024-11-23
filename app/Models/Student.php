<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'parent_name',
        'phone',
        'email',
        'address',
        'birthday',
        'amount',
        'avatar',
    ];

    protected $casts = [
        'birthday' => 'date',
    ];

    public function notes(): HasMany
    {
        return $this->hasMany(Note::class);
    }
}