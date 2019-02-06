<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
public $successStatus = 200;
/**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(){
        if(Auth::attempt(['username' => request('username'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            return response()->json(['success' => $success], $this-> successStatus);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }
/**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required|numeric',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
$input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        // $success['token'] =  $user->createToken('MyApp')-> accessToken;
        $success['name'] =  $user->name;
return response()->json(['success'=>$success], $this-> successStatus);
    }
/**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        $user = Auth::user();
        $profil = \App\mMahasiswa::with(['user'])->first();
        $profil->user->user_id;

         $res['message'] = "Success!";
         $res['profiles'] = $profil;
         return response($res);

        // return response()->json(['success' => $profil], $this-> successStatus);
    }
    public function history()
    {
        $user = Auth::user()->id;
        // dd($user);
        $history = DB::table('m_detail_pertemuans')
            ->where('id_mhs', $user)
            // ->paginate(20);
            ->take(20)
            ->get();

         $res['message'] = "Success!";
         $res['values'] = $history;
         return response($res);
    }

    public function update(Request $request, $id)
    {
      $user = User::find($id);
      // $user = Auth::user()->id;
      // dd($user);
      // $detail = \App\mDetailPertemuan::find($id);
       if ($user){
            // $input = $request->all();
            //   $input['password'] = bcrypt($input['password']);
            $password = $request->input('password');


              $data = \App\User::where('id',$id)->first();
              $data->password = bcrypt($password);

              if($data->save()){
                return response()->json([
                        'message' => 'Post has been updated',
                        'result'  => $data
                    ]);
              }
              else{
                return response()->json([
                    'message' => 'Post not found',
                ], 404);
              }
        }
      }
}
