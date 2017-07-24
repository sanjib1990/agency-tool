<?php

use App\Utils\Database;
use Illuminate\Database\Migrations\Migration;

/**
 * Class InsertRoles
 */
class InsertRoles extends Migration
{
    /**
     * @var array
     */
    private $roles  = ['client', 'dev', 'admin', 'super'];

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
            ->table('roles');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $data   = [];
        foreach ($this->roles as $role) {
            $data[] = [
                'uuid'          => uuid(),
                'name'          => $role,
                'slug'          => snake_case($role),
                'created_at'    => carbon()->now()
            ];
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
