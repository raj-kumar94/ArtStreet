<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/check_relationship_status/{id}', [
        'uses' => 'FriendshipController@check',
        'as' => 'check'
    ]
);

Route::get('/add_friend/{id}', [
        'uses' => 'FriendshipController@add_friend',
        'as' => 'add_friend'
    ]
);

Route::get('/accept_friend/{id}', [
        'uses' => 'FriendshipController@accept_friend',
        'as' => 'accept_friend'
    ]
);

///////////////////////////////private or group messages routes

Route::group(['prefix' => 'messages','middleware'=>'auth'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
});

/////////////////////////////////////////////////////// friend system
Route::get('/', function () {
    return view('welcome');
});

Route::get('/add', function () {
    return \App\User::find(6)->add_friend(8);
});

Route::get('/accept', function () {
    return \App\User::find(7)->accept_friend(6);
});

Route::get('/friends', function () {
    return \App\User::find(1)->friends();
});

Route::get('/pending_requests', function () {
    return \App\User::find(3)->pending_friend_requests();
});

Route::get('/friends_ids', function () {
    return \App\User::find(1)->friends_ids();
});

Route::get('/is_friend', function () {
    return \App\User::find(1)->has_pending_request_sent_to(3);
});


///////////////////notifications


Route::group(['middleware'=>'auth'], function(){
    Route::get('/notifications', [
            'uses' => 'HomeController@notifications',
            'as' => 'notifications'
        ]
    );

    Route::get('/get_unread', function () {
        return Auth::user()->unreadNotifications;
    });

});

/////////////////////////post

Route::group(['middleware'=>'auth'], function(){
    Route::post('/create/post', [
            'uses' => 'PostsController@store',
            'as' => 'post'
        ]
    );

    Route::get('/feed', [
            'uses' => 'FeedsController@feed',
            'as' => 'feed'
        ]
    );

    Route::get('/get_auth_user_data',function(){
        return Auth::user();
    }
    );

    Route::get('/like/{id}', [
            'uses' => 'LikesController@like',
            'as' => 'like'
        ]
    );

    Route::get('/unlike/{id}', [
            'uses' => 'LikesController@unlike',
            'as' => 'unlike'
        ]
    );


});






/////////////////////////////////////////////

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware'=>'auth'], function(){
    Route::get('/profile/{slug}',[
        'uses' => 'ProfileController@index',
        'as' => 'profile',
    ]);

    Route::get('/profile/edit/me',[
        'uses' => 'ProfileController@edit',
        'as' => 'profile.edit',
    ]);

    Route::post('/profile/update/me',[
        'uses' => 'ProfileController@update',
        'as' => 'profile.update',
    ]);
});
