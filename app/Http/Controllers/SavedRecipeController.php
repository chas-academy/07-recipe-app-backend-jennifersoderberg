<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\SavedRecipe;
use App\User;

class SavedRecipeController extends Controller
{
    public function index(Request $request)
    {
        $recipes = auth()->user()->recipes()->get();

        return response()->json(
            [
                'status' => 'success',
                'data' => $recipes
            ]
        );
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        $savedRecipe = SavedRecipe::create(
            [
                'user_id' => $user->id,
                'recipe_id' => $request->recipe_id,
                'name' => $request->name,
                'image' => $request->image
            ]
        );

        return response()->json(
            ['message' => 'Recipe saved!']
        );
    }

    public function destroy($recipeId, Request $request)
    {
        //
    }
}
