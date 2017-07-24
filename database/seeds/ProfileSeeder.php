<?php

use App\Models\User;
use App\Models\Profile;

/**
 * Class ProfileSeeder
 */
class ProfileSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::truncate();

        $profiles   = [];

        User::all()->pluck('id')->each(function ($userId) use (&$profiles) {
            $profiles[] = [
                'uuid'          => uuid(),
                'user_id'       => $userId,
                'avatar'        => $this->faker->imageUrl(),
                'created_at'    => carbon()->now()
            ];
        });

        Profile::insert($profiles);
    }
}
