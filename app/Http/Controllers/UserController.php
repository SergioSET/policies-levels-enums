<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $rol = $request->get('buscarpor');

        $Usuarios = User::where('level', 'like', "%$rol%")->paginate();

        return view('users.index')->with('users', $Usuarios);
    }

    public function indexTable(Request $request, UsersDataTable $dataTable)
    {

        return $dataTable->render('users.indexTable');

        // $rol = $request->get('buscarpor');

        // $users = User::query()->when($request->get('buscarpor'), function ($query, $buscarpor) {
        //     $query->where('level', 'like', "%$buscarpor%");
        // })->paginate();

        // return view('users.indexTable')->with('users', $users);
    }
    public function destroy(User $user)
    {
        // $this->authorize is not needed here, because the UserPolicy is linked automatically with the 7 CRUD verbs:
        // index, show, create, store, edit, update and delete
        // more info at https://laravel.com/docs/9.x/authorization#registering-policies -> Policy Auto-Discovery
        $user->delete();
        return redirect()->back();
    }
}
