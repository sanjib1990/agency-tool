<?php

use App\Models\Project;

/**
 * Class ProjectSeeder
 */
class ProjectSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::truncate();

        factory(Project::class, 50)->create();
    }
}
