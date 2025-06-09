<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class Type extends Model
{

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'slug',
    ];
    protected $guarded = false;

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function property(): HasMany
    {
        return $this->hasMany(Property::class);//->where('slug', 'product');
    }
}
