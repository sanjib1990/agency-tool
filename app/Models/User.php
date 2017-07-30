<?php

namespace App\Models;

use Illuminate\Auth\Events\Registered;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 *
 * @package App\Models
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid', 'lname', 'fname', 'email', 'password', 'active', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Store User information.
     *
     * @param array $data
     *
     * @return User
     */
    public function store(array $data)
    {
        $user   = $this->create([
            'uuid'          => uuid(),
            'created_at'    => carbon()->now(),
            'fname'         => $data['fname'],
            'lname'         => $data['lname'],
            'email'         => $data['email'],
            'password'      => ! empty($data['password']) ? bcrypt($data['password']) : null,
            'avatar'        => get_data($data, 'avatar')
        ]);

        event(new Registered($user));

        return $user;
    }

    /**
     * Find a user or create a user.
     *
     * @param array $userData
     *
     * @return User|mixed
     */
    public function findByEmailOrCreate(array $userData)
    {
        $user = $this->where('email', $userData['email'])->first();

        if (!empty($user)) {
            return $user;
        }

        // Create user
        return $this->store($userData);
    }
}
