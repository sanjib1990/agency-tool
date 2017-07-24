<?php

use App\Models\ProjectInfo;

/**
 * Class ProjectInfoSeeder
 */
class ProjectInfoSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProjectInfo::truncate();

        factory(ProjectInfo::class, 100)->create();
    }
}