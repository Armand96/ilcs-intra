<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GenerateQuery extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:query';

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
        echo "READ DATA \r";
        $users = $this->readFile();
        if(count($users)) {
            echo "INSERTING DATA.... \r";
            DB::table('users')->insert($users);
        } else {
            echo "DATA KOSONG \r";
        }

        // $query = $this->generateInsertQuery('users', $data);
        // echo $query;
        return 0;
    }

    function readFile()
    {
        // $filename = $this->argument('filename');
        $filename = "public/datawitel.txt";

        // Check if the file exists
        if (!file_exists($filename)) {
            $this->error("The file $filename does not exist.");
            return 1;
        }

        // Read the file contents
        $contents = file_get_contents($filename);

        $data = explode(";", $contents);
        $users = [];
        // Display the contents
        foreach ($data as $key => $value) {
            $split = explode("==", $value);

            $tempUser = [
                'username' => $split[0],
                'name' => $split[0],
                'nip' => $split[1],
                'email' => $split[0].$split[1]."@ilcs.co.id",
                'role_id' => 3,
                'password' => Hash::make($split[1]),
                'jabatan' => 'staff',
                'sub_jabatan' => 'STF',
                'tgl_lahir' => '2000-01-01',
                'tgl_masuk' => date('Y-m-d'),
                'image_user' => ''
            ];

            // echo $tempUser['name'].$tempUser['nip']."\r";
            array_push($users, $tempUser);
            // $this->info($tempUser['name']);
        }

        // dd($users);

        return $users;
    }

    function generateInsertQuery($table, $data)
    {
        // Extract column names from the array keys
        $columns = implode(", ", array_keys($data));

        // Prepare placeholders for the values
        $placeholders = implode(", ", array_map(function ($key) {
            return ":$key";
        }, array_keys($data)));

        // Construct the SQL query
        $query = "INSERT INTO $table ($columns) VALUES ($placeholders)";

        return $query;
    }
}
