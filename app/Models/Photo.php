<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;






class Photo extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'category_id','featured_id', 'description','image_path'];

    
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    
    public function featured(): BelongsTo
    {
        return $this->belongsTo(Featured::class);
    }
    

}
