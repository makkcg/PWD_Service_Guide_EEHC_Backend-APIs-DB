<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\Employee\UserProfileResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Traits\FileManagement;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rules\Password as PasswordRules;
use Illuminate\Support\Str;

/**
 * @group User Management
 *
 * <aside class="notice">Author Fahmi Moustafa</aside>
 * APIs for managing Users
 */
class DeafController extends Controller
{
    use FileManagement;


    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => ["required", "string", "max:60"],
            "phone" => ["required", "string", "max:60"],
            "UUID" => ["nullable", "string"],
        ]);
        if ($validator->fails()) {
            return response()->error(array($validator->errors()), trans("api/user.check_inputs"), 422);
        }
        $user = User::where('phone', $request->phone)->first();
        if(!isset($user)){
            $user = User::create([
                "name" => $request->name,
                "phone" => $request->phone,
                "UUID" => $request->filled("UUID") ? $request->UUID : null,
            ]);
            if ($user->wasRecentlyCreated) {
                $user->access_token = $user->createToken("khraba", ["user"])->plainTextToken;
                $user->save();
                return response()->success(array(new UserProfileResource($user)), trans("api/user.registered_successfully"));
            } else {
                $error = array(["failed" => [trans("api/user.failed_operation")]]);
                return response()->error($error, trans("api/user.failed_to_register"));
            }
        }
        return response()->success(array(new UserProfileResource($user)), trans("api/user.registered_successfully"));

    }

}
