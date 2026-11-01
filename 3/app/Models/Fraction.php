<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Fraction extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'subtitle',
        'description',
        'image_path',
    ];

    protected function foundingDate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value
                ? date('d.m.Y', strtotime($value))
                : null,

            set: fn ($value) => $value
                ? date('Y-m-d', strtotime($value))
                : null,
        );
    }
}