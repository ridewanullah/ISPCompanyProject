<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;
use App\Models\list_pakets;
use App\Http\Resources\paket as paketResource;


class PaketController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paket = list_pakets::all();
        return $this->sendResponse(paketResource::collection($paket), 'Data ditampilkan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'nama_paket' => 'required',
            'kecepatan' => 'required',
            'harga' => 'required'
        ]);
        if($validator->fails()) {
            return $this->sendError($validator->errors());
        }
        
        $paket = new list_pakets();
        $paket->nama_paket = $input['nama_paket'];
        $paket->kecepatan = $input['kecepatan'];
        $paket->harga = $input['harga'];
        $paket->save();

        return $this->sendResponse(new paketResource($paket), 'Data ditambahkan!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\list_pakets  $list_pakets
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paket = list_pakets::find($id);
        if(is_null($paket)) {
            return $this->sendError('Data does not exist.');
        }
        return $this->sendResponse(new paketResource($paket), 'Data ditampilkan.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\list_pakets  $list_pakets
     * @return \Illuminate\Http\Response
     */
    public function edit(list_pakets $list_pakets)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\list_pakets  $list_pakets
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $input = $request->all();

        $paket = list_pakets::find($id);
        if(!is_null($paket)) {
            $validator = Validator::make($input, [
                'nama_paket' => 'required',
                'kecepatan' => 'required',
                'harga' => 'required'
            ]);
    
            if($validator->fails()){
                return $this->sendError($validator->errors());       
            }
    
            $paket->nama_paket = $input['nama_paket'];
            $paket->kecepatan = $input['kecepatan'];
            $paket->harga = $input['harga'];
            $paket->save();
        }

        return $this->sendResponse(new paketResource($paket), 'Data updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\list_pakets  $list_pakets
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paket = list_pakets::find($id);
        if(!is_null($paket)) {
            $paket->delete();
        }

        return $this->sendResponse([], 'Data deleted');
    }
}
