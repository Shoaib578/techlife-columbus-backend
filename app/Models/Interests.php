<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interests extends Model
{
    protected $primaryKey = 'interest_id';

    protected $fillable = [
        "interest_title",
        "interest_image",
        "interest_tags"
    ];
    use HasFactory;
}
