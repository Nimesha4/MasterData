<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'code', 'name', 'status'];

    // Optional: get all items for a category
    public function items() {
        return $this->hasMany(Item::class);
    }
}
