<?php

namespace App\Exports;

use App\User;
use Illuminate\Contracts\View\View;
// use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
// class UsersExport implements FromView
{
    // public function view(): View
    // {
    //     return view('users.list', [
    //         'users' => User::all()
    //     ]);
    // }
    public function collection()
    {
        return User::all();
    }
}
