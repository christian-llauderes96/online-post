<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Cj_users extends Model implements Authenticatable
{
    use HasFactory, AuthenticableTrait;
    protected $table = 'cj_users';
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'first_name', 'last_name', 'user_name', 'email', 'dob', 'password'
    ];

    public function getUsers($uid)
    {
        return $this->select('user_id', DB::raw("CONCAT(first_name, ' ', last_name) AS full_name"))
            ->where('user_id', $uid)->first();
    }
}
