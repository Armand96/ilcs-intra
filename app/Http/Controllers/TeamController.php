<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function teams(Request $request)
    {
        $query = User::query();

        if ($request->filled('dept')) {
            $query->where('dept', 'like', '%' . $request->dept . '%')->orWhere('dept', 'like', '%' . $request->dept . '%');
        }

        $users = $query->paginate(12);
        $depts = User::select('dept')->distinct('dept')->get();

        foreach ($users as $key => $reg) {
            if (Storage::disk('public')->exists("profile_picture/" . $reg->image_user)) {
                $reg->image_user = Storage::disk('public')->url('profile_picture/' . $reg->image_user);
            }
        }

        return view('intranet.pages.our_team', compact('users', 'depts'));
    }
}
