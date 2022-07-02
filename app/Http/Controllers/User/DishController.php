<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
Use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Dish;
use App\User;
use App\Category;

class DishController extends Controller
{
        private function getValidators() {
            return  [
                'name'              => 'required|min:5|max:255',
                'description'       => 'nullable|max:2000',
                'ingredients'       => 'nullable|max:2000',
                'allergies'         => 'required|max:255|nullable',
                'price'             => 'required|max:15',
                'available'         => 'required|between:0,1',
            ];
        }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();

        $dishes = Dish::where('user_id', $user->id)->get();

        $data = [
            'user'      => $user,
            'dishes'    => $dishes,
        ];

        return view('user.dishes.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.dishes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->getValidators());

        $newDishData = $request->all();

        $formData = $newDishData + [
            'user_id'       => Auth::user()->id,
        ];

        $dish = Dish::create($formData);

        return redirect()->route('user.dishes.show', $dish->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        if (Auth::user()->id !== $dish->user_id) abort(403);
        // $user = User::where('id', Auth::user()->id)->first();

        // $dishes = Dish::where('user_id', $user->id)->get();

        return view('user.dishes.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    
    public function edit(Dish $dish)
    {
        if (Auth::user()->id !== $dish->user_id) abort(403);
        
        return view('user.dishes.edit', compact('dish'));       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        $request->validate($this->getValidators());
        $formData = $request->all();
        $dish->update($formData);

        return redirect()->route('user.dishes.show', $dish->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();

        return redirect()->route('user.dishes.index')->with('status', "Il piatto $dish->name è stato eliminato");
    }
}