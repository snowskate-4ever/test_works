<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'category_id',
        'is_active',
        'property',
        'properties'
    ];
    protected $guarded = false;

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function property(): HasMany
    {
        return $this->hasMany(Property::class);//->where('slug', 'product');
    }
}
