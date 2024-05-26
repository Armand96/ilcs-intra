<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GenerateSangfor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:sangfor';

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
        DB::beginTransaction();
        echo "READ DATA \n";
        $users = $this->readFile();
        if(count($users)) {
            echo "INSERTING DATA.... \n";
            DB::table('users')->insert($users);
        } else {
            echo "DATA KOSONG \n";
        }

        DB::commit();
        echo "DONE \n";
        return 0;
    }

    function readFile()
    {
        // $filename = $this->argument('filename');
        $filename = "public/datasangfor.txt";

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
                'username' => trim($split[0]),
                'name' => trim($split[1]),
                'nip' => trim($split[0]),
                'email' => trim($split[0])."@ilcs.co.id",
                'role_id' => 3,
                'password' => Hash::make(trim($split[0])),
                'jabatan' => 'staff',
                'sub_jabatan' => 'STF',
                'tgl_lahir' => '2000-01-01',
                'tgl_masuk' => date('Y-m-d'),
                'image_user' => ''
            ];

            echo $tempUser['name'].$tempUser['nip']."\n";
            array_push($users, $tempUser);
            // $this->info($tempUser['name']);
        }

        // dd($users);

        return $users;
    }
}
