<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('login', 'Auth\AuthController@LoginPage');

Route::get('/facebook/callback', function(SammyK\LaravelFacebookSdk\LaravelFacebookSdk $fb)
{
    // Obtain an access token.
    try {
        $token = $fb->getAccessTokenFromRedirect();
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        dd($e->getMessage());
    }

    // Access token will be null if the user denied the request
    // or if someone just hit this URL outside of the OAuth flow.
    if (! $token) {
        // Get the redirect helper
        $helper = $fb->getRedirectLoginHelper();

        if (! $helper->getError()) {
            abort(403, 'Unauthorized action.');
        }

        // User denied the request
        dd(
            $helper->getError(),
            $helper->getErrorCode(),
            $helper->getErrorReason(),
            $helper->getErrorDescription()
        );
    }

    if (! $token->isLongLived()) {
        // OAuth 2.0 client handler
        $oauth_client = $fb->getOAuth2Client();

        // Extend the access token.
        try {
            $token = $oauth_client->getLongLivedAccessToken($token);
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
            dd($e->getMessage());
        }
    }

    $fb->setDefaultAccessToken($token);

    // Save for later
    Session::put('fb_user_access_token', (string) $token);

    // Get basic info on the user from Facebook.
    try {
        $response = $fb->get('/me?fields=id,name,email,picture');
    } catch (Facebook\Exceptions\FacebookSDKException $e) {
        dd($e->getMessage());
    }

    // Convert the response to a `Facebook/GraphNodes/GraphUser` collection
    $facebook_user = $response->getGraphUser();

    // Create the user if it does not exist or update the existing entry.
    // This will only work if you've added the SyncableGraphNodeTrait to your User model.
    $user = App\User::createOrUpdateGraphNode($facebook_user);

    // Log the user into Laravel
    Auth::login($user);

    return redirect('/')->with('message', 'Successfully logged in with Facebook');
});


Route::resource('attributes','AttributesController');
Route::resource('users','UsersController');
Route::resource('children','ChildrenController');
Route::resource('vaccineHistory','VaccineHistoryController');
Route::resource('reminders','RemindersController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' =>'Auth\PasswordController',
]);



Route::group(['prefix' => 'api/v1'], function()
{
	Route::post('authenticate','APIController@authenticate');
	Route::post('signup','APIController@signup');
	Route::get('facebook/{token}','APIController@fbLogin');
	Route::resource('users','UsersAPIController');
	Route::post('users/{id}/upload','UsersAPIController@upload');
	Route::resource('children','ChildrenAPIController');
	Route::resource('attributes','AttributesAPIController');
	Route::resource('reminders','RemindersAPIController');
	Route::get('attributes/shows/{type}','AttributesAPIController@shows');
	Route::resource('histories','VaccineHistoriesAPIController');
	Route::resource('users.children','ChildrenAPIController', ['only' => ['index', 'show']]);
	Route::resource('children.histories','VaccineHistoriesAPIController', ['only' => ['index', 'show']]);
});