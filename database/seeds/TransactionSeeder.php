<?php

use App\Models\Project;
use App\Models\Transaction;

/**
 * Class TransactionSeeder
 */
class TransactionSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaction::truncate();

        foreach (Project::all() as $project) {
            Transaction::insert($this->getProjectData($project));
        }
    }

    /**
     * @param Project $project
     *
     * @return array
     */
    private function getProjectData(Project $project)
    {
        $data = [];

        for ($index = 1; $index <= 2; $index++) {
            $data[] = [
                'uuid'          => uuid(),
                'project_id'    => $project->id,
                'stage_id'      => $index,
                'created_by'    => $project->created_by,
                'created_at'    => $project->created_at,
                'updated_at'    => carbon()->now()
            ];
        }

        return $data;
    }
}
