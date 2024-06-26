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

        if ($request->filled('divisi')) {
            $query->where('divisi', 'like', '%' . $request->divisi . '%');
        }

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        $users = $query->orderBy('name')->where('is_active', true)->paginate(12);
        $divisi = User::where('divisi', '!=', '')->orderBy('divisi', 'asc')->select('divisi')->distinct('divisi')->get();

        foreach ($users as $key => $reg) {
            if (Storage::disk('public')->exists("profile_picture/" . $reg->image_user)) {
                $reg->image_user = Storage::disk('public')->url('profile_picture/' . $reg->image_user);
            }
        }

        return view('intranet.pages.our_team', compact('users', 'divisi'));
    }
}
