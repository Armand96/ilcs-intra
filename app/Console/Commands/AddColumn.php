<?php

namespace App\Console\Commands;

use App\Imports\UsersImport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class AddColumn extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:addcol';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->checkTable();
        Excel::import(new UsersImport, $this->readFile());
        return 0;
    }

    function readFile()
    {
        echo "Read File Karyawan \n";

        $filePath = public_path('karyawan.csv');

        // Check if the file exists
        if (!file_exists($filePath)) {
            $this->error("The file $filePath does not exist.");
            return 1;
        }

        return $filePath;
    }

    public function checkTable()
    {
        echo "Check Existing Column \n";

        $db = env('DB_DATABASE');

        $sql = "SELECT COLUMN_NAME
        FROM information_schema.COLUMNS
        WHERE TABLE_SCHEMA = '$db'
          AND TABLE_NAME = 'users'
          AND COLUMN_NAME = 'dept'";

        $results = DB::select(DB::raw($sql));

        if(count($results) == 0) {
            $alterTblSql = "ALTER TABLE `$db`.`users`
            ADD COLUMN `dept` varchar(100) NULL AFTER `sub_jabatan`,
            ADD COLUMN `divisi` varchar(100) NULL AFTER `dept`";
            DB::statement($alterTblSql);
        }
    }
}
