<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Transformers\UserTransformer;

class UserController extends Controller
{

    public function __construct()
    {
       // $this->middleware('jwt.auth', ['except' => ['authenticate']]);
       // $this->middleware('jwt.auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $users =  User::all();
         return $this->response->collection($users, new UserTransformer)->setStatusCode(200);
          // return $this->response->noContent();
          // ->withHeader('X-Foo', 'Bar');
            //return $this->response->created();
          // return $this->response->created();
          //return $this->response->error('This is an error.', 404);
          // A not found error with an optional message as the first parameter.
        // return $this->response->errorNotFound();
            // A bad request error with an optional message as the first parameter.
         // return $this->response->errorBadRequest();
        // A forbidden error with an optional message as the first parameter.
        //return $this->response->errorForbidden();
         // An internal error with an optional message as the first parameter.
        // return $this->response->errorInternal();
         // An unauthorized error with an optional message as the first parameter.
          // return $this->response->errorUnauthorized();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cryptPass = bcrypt($request->input('password'));
        $request->merge(['password' => $cryptPass]);
        return User::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return $this->response->item($user, new UserTransformer)->setStatusCode(200);
        //return $this->response->array($user->toArray());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if(!$user){
            //return $this->response->array(['message'=>'user Not found']);
            return $this->response->errorNotFound();
        }
        $user->update($request->all());
        return $this->response->array(['message'=>'user Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if(!$user){
            //return $this->response->array(['message'=>'user Not found']);
            return $this->response->errorNotFound();
        }
        $user->delete();
        return $this->response->array(['message'=>'user '.$user->name.' deleted']);
    }
}
