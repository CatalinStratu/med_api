<?php

namespace App\Http\Controllers;

//use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;

/**
 * @group Authentication
 *
 * APIs for managing users
 */
class AuthController extends Controller
{

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Login
     *
     * This endpoint is used to authenticate a user.
     * @unauthenticated
     *
     * @bodyParam email string required Email address of the user. Example: john.doe@mailinator.com
     * @bodyParam password string required Password. Example: ********
     *
     * @response status=200 scenario="OK" {
     *  "user": {
     *   "id": 1,
     *   "name": "John Doe",
     *   "email": "john.doe@mailinator.com",
     *   "email_verified_at": null,
     *   "created_at": "2020-11-04T01:48:03.000000Z",
     *   "updated_at": "2020-11-04T01:48:03.000000Z"
     *  },
     *  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiNTUzOGFjYjRjYjFjN2E4OTI2ZDVhNDc5NTIxYmZiM2IzYTlmYzgwOTQ0MjI1MDY3ODMzY2FhYTRhZmQ5YmM3N2UwMTBhMjg5YmQ4YWNjOTMiLCJpYXQiOjE2MDQ0ODAyNjYsIm5iZiI6MTYwNDQ4MDI2NiwiZXhwIjoxNjA0NTY2NjY1LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.kh8iMbKMpeSrLywBV9t734Zh_K6llrQxeBUt2aJnUfLw-G-rQw6o67MqdVAXtM74OsqDX-InveY8laIKGw50oniZ2YzVzqHOIbbuN3ZVe7kq8HFPziDD73296QRs0LGZxAADyZsJIU05_aLgOGvtBOz4dXXkfOlAyQ7T3p7w_JqWoBMd8PCxWn7wtN6EC8hmUQ9mAVJYLT85ucjVWEgaLeSjpWTN9g9aIUFKwtiw7sFNTSow76855rbao3u59O3rE_nKD7C9F2TC7XbuUcb1swmuo4zI_-uxVmt7qO9EsmbAjr78eps_3XZEpYxpt-RnQWSPs50K4y9pQzvmscauc1vD8ZXpEff_NR4uMTfhLockazZiM7G2O7-_RPqdELfubFSkTwb2CPklPAy6atVtwcBPULgZUa7olPP9Fs4CJvZn4rWV8rUJnou4wD2iEWwHLq5UN8wuRupUKoKPIlyPgHFVIZglXVvhlDo-FGwuprVmiNfF6xpEFKmeqnX5SjTuBKZ04tPGraclRn9PR89k_Dcw1mHFW6vVtX2iPj6ZXFx3tJVSpvmtpb67JiGK41vocd48XFMAdT5qQf2miOxRQjr-Qsp5c9Zk_Zm26ip8HasDjPk5IKgOYzXB1x4bLIqRKslUUPPdhE-NBUzapOEFr5Zb7K2kkyZE4VVXRPT4RjY",
     *  "token_type": "Bearer",
     *  "expires_at": "2020-11-05 08:57:45"
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
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (!$token = auth('api')->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->createNewToken($token);
    }

    /**
     * Register new user
     *
     * This endpoint is used to register a new user.
     * @unauthenticated
     *
     * @bodyParam first string required First Name of the user Example: John.
     * @bodyParam last string required Last Name of the user  Example: Doe .
     * @bodyParam email string required Email address of the user. Example: john.doe@mailinator.com
     * @bodyParam password string required Password. Example: ********
     * @bodyParam password_confirmation string required Confirm password. Example: ********
     *
     * @response status=201 scenario="OK" {
     *  {
     * "message": "User successfully registered",
     *  "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODAwMFwvYXBpXC92MVwvcmVnaXN0ZXIiLCJpYXQiOjE2MDQ2NjkyOTgsImV4cCI6MTYwNDY3Mjg5OCwibmJmIjoxNjA0NjY5Mjk4LCJqdGkiOiJQNnZIVzZ4aEIyODR5MFVhIiwic3ViIjo0LCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.GXmKChKDsG-SXRaDl39LfNz_Ip4pY80Zmkp6qfFB4fs",
     *  "token_type": "bearer",
     *  "expires_in": 3600,
     *  "user": {
     *      "first": "Catalin",
     *      "last": "Stratu",
     *      "role": "1",
     *      "email": "test@gmail.com",
     *      "updated_at": "2020-11-05T13:38:40.000000Z",
     *      "created_at": "2020-11-05T13:38:40.000000Z",
     *      "id": 2
     *      }
     *  }
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
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first' => 'required|string',
            'last' => 'required|string',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|confirmed|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }
        $user = new User();
        $user->first = $request->first;
        $user->last = $request->last;
        $user->role = '1';
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        if (!$token = auth('api')->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->createNewToken($token);
    }


    /**
     * Logout
     *
     * This endpoint is used to revoke user's access token.
     *
     * @response status=200 scenario="OK" {
     *  "message": "Token successfully revoked"
     * }
     */
    public function logout()
    {
        auth('api')->logout();

        return response()->json(['message' => 'User successfully signed out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->createNewToken(auth('api')->refresh());
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile()
    {
        try {
            $user = auth('api')->user();
        } catch (\Exception $e) {
            throw new HttpException(500, $e->getMessage());
            throw new HttpException(405, $e->getMessage());
        }
        return response()->json($user);
    }
}
