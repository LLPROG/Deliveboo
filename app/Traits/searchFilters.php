<?php

namespace App\Traits;

use App\User;

trait searchFilters {
    function composeQuery($request) {
        $userQuery = User::whereRaw('1 = 1')->join('category_user', 'users.id', '=', 'category_user.user_id');

        
        $userQuery->where('category_id', $request->category);
        

        return $userQuery;
    }
}