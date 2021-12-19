<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password as PasswordRules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function index()
    {
        $items=User::where('type', '1')->get();
        return view('admin.users.index',compact('items'));
    }

    public function ban($id){

     $user= User::find($id);
     $user->ban = 1;
     $user->update();
     return redirect(route('users'))->withFlashMessage('Banned');
    }

    public function unban($id){

     $user= User::find($id);
     $user->ban = 0;
     $user->update();
     return redirect(route('users'))->withFlashMessage('Un Banned');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => ["required", "string", "max:60"],
            "phone" => ["required", "string", "max:60"],
            "email" => ["required", "email:rfc,filter", "unique:users,email"],
            "password" => ["required", "confirmed", PasswordRules::min(8)],
            "UUID" => ["nullable", "string"],
        ]);
        if ($validator->fails()) {
            return response()->error(array($validator->errors()), trans("api/user.check_inputs"), 422);
        }
        $folder = $this->uniqueDirName("Users");
        $user = User::create([
            "name" => $request->name,
            "phone" => $request->phone,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "access_token" => "",
            "UUID" => $request->filled("UUID") ? $request->UUID : null,
        ]);
        if ($user->wasRecentlyCreated) {
            $user->access_token = $user->createToken("khraba", ["user"])->plainTextToken;
            // $user->assignRole("user");
            $user->save();
           // $user->sendEmailVerificationNotification();
       //     return response()->success(array(new UserLoginResource($user)), trans("api/user.registered_successfully"));
        } else {
            $error = array(["failed" => [trans("api/user.failed_operation")]]);
       //     return response()->error($error, trans("api/user.failed_to_register"));
        }
    }
}
