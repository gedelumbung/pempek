<?php

namespace Simpeg\Model;

use Caffeinated\Shinobi\Traits\ShinobiTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use ShinobiTrait;

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
