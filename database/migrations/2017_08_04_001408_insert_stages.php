<?php

use App\Utils\Database;
use Illuminate\Database\Migrations\Migration;

/**
 * Class InsertStages
 */
class InsertStages extends Migration
{
    /**
     * @var array
     */
    private $stages  = [
        'INFO_SUBMITTED'            => 5,
        'REQUIRMENT_SUBMITTED'      => 10,
        'ASSIGNED_FOR_DEVELOPMENT'  => 15,
        'SIGNED_OFF_CLIENT'         => 20,
        'SIGNED_OFF_DEVELOPER'      => 25,
        'FREEZED_REQUIREMENT'       => 30,
        'WORK_PROGRESS'             => 80,
        'QA_TESTED'                 => 95,
        'DEPLOYED'                  => 100
    ];

    /**
     * @var \Illuminate\Database\Connection
     */
    public $database;

    /**
     * InsertRoles constructor.
     */
    public function __construct()
    {
        $this->database = app()
            ->make(Database::class)
            ->mysql()
            ->table('stages');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $data       = [];
        $sequence   = 1;

        foreach ($this->stages as $stage => $percentage) {
            $data[] = [
                'name'          => $stage,
                'percentage'    => $percentage,
                'description'   => $stage,
                'sequence'      => $sequence,
                'created_at'    => carbon()->now()
            ];

            $sequence++;
        }

        $this->database->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->database->truncate();
    }
}
