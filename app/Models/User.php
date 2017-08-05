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
     * @var string
     */
    protected $defaultLoginProvider = 'portal';

    /**
     * @var string
     */
    protected $defaultRole  = 'dev';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid', 'lname', 'fname', 'email', 'password', 'active'
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
     * User has one profile.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * User can have many roles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function role()
    {
        return $this->belongsToMany(Role::class, 'user_role');
    }

    /**
     * Get the default role.
     *
     * @return mixed
     */
    public function defaultRole()
    {
        return Role::where('slug', $this->defaultRole)->first();
    }

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
            'password'      => ! empty($data['password']) ? bcrypt($data['password']) : null
        ]);

        $loginProvider  = $this->defaultLoginProvider;
        if (get_data($data, 'login_provider')) {
            $loginProvider  = $data['login_provider'];
        }

        // create profile
        $user->profile()->create([
            'uuid'              => uuid(),
            'avatar'            => get_data($data, 'avatar'),
            'login_provider'    => $loginProvider,
            'created_at'        => carbon()->now()
        ]);

        // Assgine default role
        $user->role()->attach($this->defaultRole());

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

        return $this->store($userData);
    }
}
