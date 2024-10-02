<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalAccessToken extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'personal_access_tokens';
    protected $guared = [];
    public function getIncrementing() {
        return false;
    }
    public function getKeyType() {
        return 'string';
    }
}
