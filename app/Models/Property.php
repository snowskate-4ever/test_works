<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class Property extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'product_id',
        'type_id',
        'slug',
        'value'
    ];
    protected $guarded = false;

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }
}
