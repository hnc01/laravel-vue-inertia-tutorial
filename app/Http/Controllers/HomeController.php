<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class HomeController extends Controller {
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request) {
        return inertia('Home', [
            'users' => User::when($request->has('search'), function (Builder $query) use ($request) {
                $query->whereAny(['name', 'email'], 'like', "%{$request->search}%");
            })->paginate(5)->withQueryString(),

            'searchTerm' => $request->search,
        ]);
    }
}
