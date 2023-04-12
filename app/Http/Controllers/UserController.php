<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\AddMoneyFormRequest;
use Illuminate\Support\Facades\Auth;
use Excpetion;

class UserController extends Controller
{
    public function addMoney(AddMoneyFormrequest $request)
    {
        try{
            $data = $request->validated();
            $user = Auth::user();
            $user->wallet += $data['amount'];
            $user->save();
            return response()->json(['message' => 'Money added successfully']);

        }catch(Exception $e)
        {
            Log::error($e->getMessage());
        }
    }

    public function buyCookie()
    {
        try{
            $user = Auth::user(); // Assuming you're using Laravel's built-in authentication
            $price = 1; // The price of a cookie in dollars
            if ($user->wallet < $price) {
                return response()->json(['message' => 'Not enough money in wallet'], 400);
            }
            $user->wallet -= $price;
            $user->save();
            return response()->json(['message' => 'Cookie bought successfully']);
        }
        catch(Ecxeption $e)
        {
            Log::error($e->getMessage());
        }
    }
}
