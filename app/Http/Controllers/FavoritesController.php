<?php

namespace App\Http\Controllers;

use App\Favorite;
use App\Reply;
use Illuminate\Support\Facades\DB;

class FavoritesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Reply $reply)
   {
//       $reply->favorites()->create([
//           'user_id' => auth()->id()
//       ]);

        $reply->favorite();
        return back();
   } 
}
