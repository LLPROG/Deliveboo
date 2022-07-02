<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Category;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $categories = Category::all();

        return view('auth.register', compact('categories'));
    }
    
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // $categories = Category::all();

        // $categories_ids = [];
        
        // foreach ($categories as $category) {
        //     $categories_ids[] = $category->id;
        // };

        $validators = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'street' => ['required', 'string', 'max:255'],
            'cap' => ['required', 'numeric', 'digits:5'],
            'city' => ['required', 'string', 'max:100'],
            'phone_number' => ['required', 'string', 'max:50', 'unique:users'],
            'p_iva' => ['required', 'string', 'max:16', 'unique:users'],
            'categories' => ['required'],
            'day_off' => ['required'],
        ]);

        //dd($validators->errors()->messages()['categories']);

        return $validators;

        // return Validator::make($data, [
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        //     'street' => ['required', 'string', 'max:255'],
        //     'cap' => ['required', 'numeric', 'digits:5'],
        //     'city' => ['required', 'string', 'max:100'],
        //     'phone_number' => ['required', 'string', 'max:50', 'unique:users'],
        //     'p_iva' => ['required', 'string', 'max:16', 'unique:users'],
        //     'categories' => ['required', 'in:([1, 2, 3, 4, 5, 6, 7, 8, 9, 10])'],
        //     'day_off' => ['required'],
        // ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $newUser = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'street' => $data['street'],
            'cap' => $data['cap'],
            'city' => $data['city'],
            'phone_number' => $data['phone_number'],
            'p_iva' => $data['p_iva'],
            'slug' => User::generateSlug($data['name']),
            'day_off' => $data['day_off'],
        ]);

        foreach ($data['categories'] as $categoryId) {
            DB::table('category_user')->insert([
                'category_id'   => $categoryId,
                'user_id'       => $newUser->id,
            ]);
        }

        return $newUser;
    }
}
