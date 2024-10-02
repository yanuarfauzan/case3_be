<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\UserItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ItemController extends BaseController
{
    public function index()
    {
        $items = Item::with('category', 'users')->get();
        return $this->sendResponse($items, 'Items retrieved successfully.');
    }

    public function addToFav($id)
    {
        $user = Auth::user();
        $userItem = UserItems::where('user_id', $user->id)->where('item_id', $id)->first();
        if (isset($userItem->favorite)) {
            $user->items()->detach($id);
            $userItem->update(['favorite' => false]);
            return $this->sendResponse($userItem, 'Item removed from favorite successfully.');
        }
        $user->items()->attach($id, ['id' => Str::uuid(), 'favorite' => true]);
        return $this->sendResponse($userItem, 'Item added to favorite successfully.');
    }
    public function addToCart($id, Request $request)
    {
        $user = Auth::user();
        $user->items()->attach($id, ['id' => Str::uuid(), 'ordered' => true, 'level' => $request->level, 'qty' => $request->qty]);
        return $this->sendResponse($user->items()->with('category')->get(), 'Item added to cart successfully.');
    }
    public function favItems()
    {
        $user = Auth::user();
        $items = $user->items()->where('favorite', true)->get();
        if ($items->isEmpty()) {
            return $this->sendError('No favorite items found.');
        }
        return $this->sendResponse($items, 'Favorite items retrieved successfully.');
    }
    public function deleteFromCart()
    {
        $user = Auth::user();
        $user->items()->detach();
        return $this->sendResponse($user->items()->get(), 'Item removed from cart successfully.');
    }
}
