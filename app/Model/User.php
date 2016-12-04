<?php

namespace Simpeg\Model;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Model
{
    use EntrustUserTrait;

    protected $table = 'users';

    protected $fillable = [
        'nip',
        'pegawai_id',
        'name',
        'email',
        'password'
    ];

    public function role_user()
    {
        return $this->belongsTo('Simpeg\Model\RoleUser', 'id', 'user_id');
    }
}
