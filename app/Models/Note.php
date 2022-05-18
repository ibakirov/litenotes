<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{
    use HasFactory;

    // Enable soft deletes
    use SoftDeletes;

    // protected $fillable or
    protected $guarded = [];

    // To pass note in views by uuid column
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    // Define inverse relationship with User model
    public function user() {
        return $this->belongsTo(User::class);
    }
}
