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
        'value'
    ];
    protected $guarded = false;

    protected $hidden = [
        'type_id',
        'slug',
        'product_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class)->withDefault();
    }
    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class)->withDefault();
    }
}
