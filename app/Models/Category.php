<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Category extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'parent_id',
    ];
    protected $guarded = false;

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
