<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
  public function mahasiswaRegister(Request $request, User $user, mMahasiswa $mahasiswa)
  {
      $this->validate($request, [
          'niu'      => 'required|unique:users',
          'email'     => 'required|email|unique:users',
          'password'  => 'required|min:8',
          'nif'       => 'required|size:5|unique:students',
          'majors'    => 'required',
      ]);
      $user = $user->create([
          'niu'          => $request->niu,
          'password'       => bcrypt($request->password),
          'as'             => "mahasiswa",
          'api_token'      => bcrypt($request->niu),
      ]);
      $userRegister = DB::table('users')
          ->where('email', $request->email)
          ->first();
      $student = $student->create([
          'name'      => $request->name,
          'nif'       => $request->nif,
          'majors'    => $request->majors,
          'user_id'   => $userRegister->id
      ]);
      $response = fractal()
          ->item($user)
          ->transformWith(new RegisterTransformer)
          ->addMeta([
              'token' => $user->api_token,
          ])
          ->toArray();
      return response()->json($response, 201);
  }
  public function operatorRegister(Request $request, User $user, Operator $operator)
  {
      $this->validate($request, [
          'name'              => 'required',
          'email'             => 'required|email|unique:users',
          'password'          => 'required|min:8',
          'operator_number'   => 'required|unique:operators',
      ]);
      $user = $user->create([
          'email'          => $request->email,
          'password'       => bcrypt($request->password),
          'as'             => "Operator",
          'api_token'      => bcrypt($request->email),
      ]);
      $userRegister = DB::table('users')
          ->where('email', $request->email)
          ->first();
      $operator = $operator->create([
          'name'                  => $request->name,
          'operator_number'       => $request->operator_number,
          'user_id'               => $userRegister->id
      ]);
      $response = fractal()
          ->item($user)
          ->transformWith(new RegisterTransformer)
          ->addMeta([
              'token' => $user->api_token,
          ])
          ->toArray();
      return response()->json($response, 201);
  }
  public function Login(Request $request, User $user)
  {
      if (!Auth::attempt([
          'email'     => $request->email,
          'password'  => $request->password
          ])
      ) {
          return response()
              ->json(['error' => 'Your credential is wrong'], 401);
      }
      $user = $user->find(Auth::user()->id);
      return fractal()
          ->item($user)
          ->transformWith(new UserTransformer)
          ->addMeta([
              'token' => $user->api_token,
          ])
          ->toArray();
  }
}
