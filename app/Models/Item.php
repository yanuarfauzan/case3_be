<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory, HasUuids;
    protected $guarded = [];
    public function getIncrementing() {
        return false;
    }
    public function getKeyType() {
        return 'string';
    }
    public function category() {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
    public function users() {
        return $this->belongsToMany(User::class, 'user_items', 'item_id', 'user_id');
    }
}
