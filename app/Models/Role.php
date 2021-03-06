<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory, Uuids;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
    ];

    // User relation
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function assignUser(User $user) 
    {
        return $this->users()->save($user);
    }
}
