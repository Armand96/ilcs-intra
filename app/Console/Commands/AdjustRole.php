<?php

namespace App\Console\Commands;

use App\Models\Role;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class AdjustRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'adjust:role';

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
        try {
            //code...
            $data = [
                array(
                    'role_name' => 'Admin SDM',
                    'is_admin' => true,
                ),
                array(
                    'role_name' => 'Admin HKP',
                    'is_admin' => true,
                )
            ];
            Role::insert($data);

            $role = Role::where('role_name', 'Admin')->first();
            if($role) {
                $role->role_name = 'Super Admin';
                $role->update();
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        return 0;
    }
}
// - Input Our Team, Welcoming, Farewell, Birthday Employee
// Input Our Regulation
