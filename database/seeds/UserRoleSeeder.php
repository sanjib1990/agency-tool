<?php

use App\Models\Profile;
use App\Models\Role;
use App\Models\User;

/**
 * Class UserRoleSeeder
 */
class UserRoleSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = Role::where('slug', '<>', 'super')->get()->pluck('id')->toArray();

        foreach (User::all() as $user) {
            $user->role()->attach($roles[array_rand($roles)]);
        }

        // create dev, client, super users
        foreach (['dev', 'client', 'super'] as $role) {
            $user   = User::create($this->user($role));
            Profile::create($this->profile($user->id));

            $role   = Role::where('slug', $role)->first();
            $user->role()->attach($role->id);
        }
    }

    /**
     * @param $type
     *
     * @return array
     */
    public function user($type)
    {
        return [
            'uuid'          => uuid(),
            'lname'         => $type,
            'fname'         => $type,
            'email'         => $type.'@'.$type.'.com',
            'password'      => bcrypt('123123'),
            'created_at'    => $this->faker->date(),
        ];
    }

    /**
     * @param $userId
     *
     * @return array
     */
    public function profile($userId)
    {
        return [
            'uuid'          => uuid(),
            'user_id'       => $userId,
            'avatar'        => $this->faker->imageUrl(),
            'created_at'    => carbon()->now()
        ];
    }
}
