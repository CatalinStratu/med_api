<?php

namespace App\Http\Controllers;

use JWTAuth;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

/**
 * @group User profile
 *
 * APIs for managing with users data
 */
class UserController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Update User information
     *
     * This endpoint is used to update user information.
     * @unauthenticated
     *
     * @bodyParam first string required First Name of the user Example: John.
     * @bodyParam last string required Last Name of the user  Example: Doe .
     *
     * @response status=201 scenario="OK" {
     * {
     * "message": "User updated successfully!",
     * "user": {
     * "id": 1,
     * "first": "matkks@gmail.comssssa",
     * "last": "123qweasdaaa",
     * "role": 1,
     * "balance": "0.00",
     * "profile_picture": null,
     * "email": "catalinstratu45@gmail.com",
     * "email_verified_at": null,
     * "created_at": "2020-11-05T12:46:10.000000Z",
     * "updated_at": "2020-11-06T22:13:26.000000Z"
     * }
     * }
     * @response status=404 scenario="Not Found" {
     * {
     * "message": "User not found"
     * }
     * @response status=422 scenario="Unprocessable entity" {
     *  "message": "The given data was invalid.",
     *  "errors": {
     *    "field": [
     *        "The field is required."
     *    ],
     *    ...
     *  }
     * }
     */
    public function updateProfile(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'first' => 'required|string|min:3|max:50',
            'last' => 'required|string|min:3|max:50',
        ]);
        try {
            $user = User::findOrFail(Auth::user()->id);
            $user->first = $request->first;
            $user->last = $request->last;
            $user->save();
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'User not found',
            ], 404);
        }

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        return response()->json([
            'message' => 'User updated successfully!',
            'user' => $user
        ], 201);
    }
    /**
     * Update User password
     *
     * This endpoint is used to update user password.
     * @unauthenticated
     *
     * @bodyParam first string required First Name of the user Example: John.
     * @bodyParam last string required Last Name of the user  Example: Doe .
     *
     * @response status=201 scenario="OK" {
     * {
     * "message": "Password updated successfully!",
     * "user": {
     * "id": 1,
     * "first": "matkks@gmail.comssssa",
     * "last": "123qweasdaaa",
     * "role": 1,
     * "balance": "0.00",
     * "profile_picture": null,
     * "email": "catalinstratu45@gmail.com",
     * "email_verified_at": null,
     * "created_at": "2020-11-05T12:46:10.000000Z",
     * "updated_at": "2020-11-06T22:13:26.000000Z"
     * }
     * }
     * @response status=404 scenario="Not Found" {
     * {
     * "message": "User not found"
     * }
     * @response status=422 scenario="Unprocessable entity" {
     *  "message": "The given data was invalid.",
     *  "errors": {
     *    "field": [
     *        "The field is required."
     *    ],
     *    ...
     *  }
     * }
     */
    public function updatePassword(Request $request)
    {

        $validator = \Validator::make($request->all(), [
            'old_password' => 'required',
            //'password' => 'required|confirmed|different:old_password',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $user = Auth::user();

        $auth = \Auth::once([
            'email' => $user->email,
            'password' => $request->get('old_password'),
        ]);
        if (!$token = auth('api')->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        if (!$auth) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $password = bcrypt($request->get('password'));
        $user->update(['password' => $password]);
        return response()->json([
            'message' => 'User updated successfully!',
            'user' => $user
        ], 201);
    }
}
