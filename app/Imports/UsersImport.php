<?php

namespace App\Imports;

use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $user = $this->getUser($row[1]);

        $date = str_replace('/', '-', $row[2]);
        $date = date('Y-m-d', strtotime($date));

        if($user) {
            $user->name = $row[0];
            $user->tgl_lahir = $date;
            $user->jabatan = $row[3];
            $user->dept = $row[4];
            $user->divisi = $row[5];
            $user->update();
            return $user;
        } else {
            return new User([
                'username' => strtolower(str_replace(' ', '.' , $row[0])),
                'email' => strtolower(str_replace(' ', '.' , $row[0]))."@ilcs.co.id",
                'name' => $row[0],
                'nip' => $row[1],
                'password' => Hash::make($row[1]),
                'tgl_lahir' => $date,
                'tgl_masuk' => $date,
                'image_user' => '',
                'jabatan' => $row[3],
                'sub_jabatan' => $row[3],
                'dept' => $row[4],
                'divisi' => $row[5],
                'role_id' => 3
            ]);
        }

    }

    public function getUser($nip)
    {
        return User::where('nip', $nip)->first();
    }
}
