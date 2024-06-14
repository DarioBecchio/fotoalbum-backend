<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



class Photo extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','image_path','category_id','featured'];

    
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

}
