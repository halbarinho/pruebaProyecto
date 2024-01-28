<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\DniNieValidationRule;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Docente;
use App\Models\Estudiante;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view("CRUD.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("CRUD.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'dni' => [
                'required',
                // 'regex:/^((([XYZ])[0-9]{7}[A-Z])|([0-9]{8}[A-Z]))$/',
                new DniNieValidationRule,
            ],
            'name' => [
                'required',
                'max:50',
                'regex:/^[A-Za-zñáéíóú]+(?: [A-Za-zñáéíóú]+)?(?: [A-Za-zñáéíóú]+)?$/',

            ],
            'last_name_1' => [
                'required',
                'max:100',
                'regex:/^[A-Za-zñáéíóú]+(?: [A-Za-zñáéíóú]+)?(?: [A-Za-zñáéíóú]+)?$/',
            ],
            'last_name_2' => [
                'required',
                'max:100',
                'regex:/^[A-Za-zñáéíóú]+(?: [A-Za-zñáéíóú]+)?(?: [A-Za-zñáéíóú]+)?$/',
            ],
            'user_type' => [
                'required',
                'string',
                'in:docente,alumno'
            ],
            'gender' => [
                'required',
            ],
            'email' => [
                'required',
                'email',
            ],
            'password' => [
                'required',
                'min:6',
                'max:50',
                'confirmed',
            ],
            'speciality' => [
                'required_if:user_type,docente',
                'string',
                'max:50',
            ],
            'date_of_birth' => [
                'required_if:user_type,alumno',
                'string',
                'max:50',
            ],
            'history' => [
                'required_if:user_type,alumno',
                'string',
                'max:50',
            ],
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            // Handle validation errors
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        /**
         * No ha fallado la validacion se procede a crear USER
         */
        $user = new User();
        $user->dni = $request->dni;
        $user->name = $request->name;
        $user->last_name_1 = $request->last_name_1;
        $user->last_name_2 = $request->last_name_2;
        $user->gender = $request->gender;
        $user->user_type = $request->user_type;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->profile_photo_path = $request->profile_photo_path;


        $user->save();

        /**
         * Condicionales docente y alumno
         */
        if ($request->user_type == 'docente') {
            $docente = new Docente();
            $docente->speciality = $request->speciality;

            $docente->save();

        } else {
            $estudiante = new Estudiante();
            $estudiante->date_of_birth = $request->date_of_birth;
            $estudiante->history = $request->history;

            $estudiante->save();
        }

        return redirect('welcome');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
