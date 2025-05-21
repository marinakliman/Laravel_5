<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;

class EmployeeController extends Controller
{

    public function showEmployees()
    {
        $data = Storage::get('data.json');
        $users = json_decode($data, true);
        return view('employeesTable', ['users' => $users]);
    }




    public function index()
    {
        return view('employeeForm');
    }



    public function store(Request $request)
    {
        $getPath = $request->path();
        $getUrl = $request->url();
        echo "getPath: $getPath<br>getUrl: $getUrl<br>";

        $data = Storage::get('data.json');
        $users = json_decode($data, true);

        if (empty($users)) {
            $newId = 0;
        } else {
            $newId = end($users)['id'] + 1;
        }

        $users[] =
            [
                'id' => $newId,
                'name' => $request->input('name'),
                'lastname' => $request->input('lastname'),
                'position' => $request->input('position'),
                'email' => $request->input('email'),
                'address' => $request->input('address')
            ];

        $newusers = json_encode($users);
        Storage::put('data.json', $newusers);

        return redirect('/');
    }



    public function storeJSON(Request $request)
    {
        $getPath = $request->path();
        $getUrl = $request->url();
        echo "getPath: $getPath<br>getUrl: $getUrl<br>";

        $data = Storage::get('data.json');
        $users = json_decode($data, true);

        if (empty($users)) {
            $newId = 0;
        } else {
            $newId = end($users)['id'] + 1;
        }

        $newUser = json_decode($request->workData, true);

        $users[] =
            [
                'id' => $newId,
                'name' => $newUser['name'],
                'lastname' => $newUser['lastname'],
                'position' => $newUser['position'],
                'email' => $newUser['email'],
                'address' => $newUser['address']
            ];

        $newusers = json_encode($users);
        Storage::put('data.json', $newusers);

        return redirect('/');
    }




    public function changeEmployeeForm()
    {
        $id = Route::input('id');
        return view('changeEmployeeForm', ['id' => $id]);
    }



    public function update(Request $request, $id)
    {
        $getPath = $request->path();
        $getUrl = $request->url();
        echo "getPath: $getPath<br>getUrl: $getUrl<br><br>";

        $findId = (int) $id;
        $data = Storage::get('data.json');
        $users = json_decode($data, true);

        for ($i = 0; $i < count($users); $i++) {
            if ($users[$i]["id"] == $findId) {
                $key = $i;
                break;
            }
        };

        $users[$key] = [
            'id' => $id,
            'name' => $request->input('name'),
            'lastname' => $request->input('lastname'),
            'position' => $request->input('position'),
            'email' => $request->input('email'),
            'address' => $request->input('address')
        ];

        $newusers = json_encode($users);
        Storage::put('data.json', $newusers);
        return redirect('/');
    }
}
