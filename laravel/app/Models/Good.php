<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Good
 * @package App\Models
 *
 * @property-read $id
 * @property-read $description
 * @property-read $price
 * @property-read $title
 * @property-read Category $category
 */

class Good extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getImageId()
    {
        return $this->id % 9 + 1;
    }
}
