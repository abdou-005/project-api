<?php

namespace App\Http\Controllers;

use App\Transformers\BienTransformer;
use Illuminate\Http\Request;
use App\Http\Requests\CreateBienRequest;
use App\Bien;

use App\Http\Requests;

class BienController extends Controller
{
    public function __construct()
    {
       // $this->middleware('jwt.auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Bien::paginate(3);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return Bien::all();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Bien::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Bien::findOrFail($id);
        return $this->response->item($user, new BienTransformer())->setStatusCode(200);
        //urn $this->response->array($user->toArray());
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
        $bien = Bien::find($id);
        if(!$bien){
            //return $this->response->array(['message'=>'user Not found']);
            return $this->response->errorNotFound();
        }
        $bien->update($request->all());
        return $this->response->array(['message'=>'Bien Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bien = Bien::find($id);
        if(!$bien){
            //return $this->response->array(['message'=>'user Not found']);
            return $this->response->errorNotFound();
        }
        Bien::destroy($id);
        return $this->response->array(['message'=>'Bien '.$bien->name.' deleted']);
    }
}
