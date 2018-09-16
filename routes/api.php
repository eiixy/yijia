<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Auth')->group(function (){
    Route::post('/register', 'RegisterController@register');
});





Route::get('/menus', function () {
    return response()->json(
        [
            [
                "id"    =>  1,
                "name"  =>  "菜单1",
                "url"   =>  "/test",
                "sub_menu"  =>  [
                    [
                        "id"    =>  101,
                        "name"  =>  "菜单1-1",
                        "url"   =>  "/test11",
                        "sub_menu"  =>  [
                            [
                                "id"    =>  10101,
                                "name"  =>  "菜单1-1-1",
                                "url"   =>  "/test"
                            ],
                            [
                                "id"    =>  10102,
                                "name"  =>  "菜单1-1-2",
                                "url"   =>  "/test112"
                            ]
                        ]
                    ]
                ]
            ],
            [
                "id"    =>  2,
                "name"  =>  "菜单2",
                "url"   =>  "/test",
                "sub_menu"  =>  [
                    [
                        "id"    =>  201,
                        "name"  =>  "菜单2-1",
                        "url"   =>  "/test21",
                        "sub_menu"  =>  []
                    ],
                    [
                        "id"    =>  202,
                        "name"  =>  "菜单2-2",
                        "url"   =>  "/test22",
                        "sub_menu"  =>  []
                    ]
                ]
            ],
            [
                "id"    =>  3,
                "name"  =>  "菜单3",
                "url"   =>  "/hello",
                "sub_menu"  =>  []
            ]
        ]
    );
});