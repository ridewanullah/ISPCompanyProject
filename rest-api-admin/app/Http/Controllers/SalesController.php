<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\sales;
use App\Http\Resources\listsales as listResource;

class SalesController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = sales::all();
        return $this->sendResponse(listResource::collection($list), 'Data ditampilkan');
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
            'nip' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'divisi' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);
        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }

        $list = new sales();
        $list->nip = $input['nip'];
        $list->nama = $input['nama'];
        $list->alamat = $input['alamat'];
        $list->divisi = $input['divisi'];
        $list->email = $input['email'];
        $list->password = Hash::make($input['password']);
        $list->save();

        return $this->sendResponse(new listResource($list), 'Data ditambahkan!');
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
     * @param  \App\Models\sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $list = sales::find($id);
        if (is_null($list)) {
            return $this->sendError('Data does not exist.');
        }
        return $this->sendResponse(new listResource($list), 'Data Ditampilkan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function edit(sales $sales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    $input = $request->all();

    $list = Sales::find($id);
    if (is_null($list)) {
        return $this->sendError('Sales record not found.');
    }

    $validator = Validator::make($input, [
        'nip' => 'required',
        'nama' => 'required',
        'alamat' => 'required',
        'divisi' => 'required',
        'email' => 'required|email',
        'password' => 'required',
        'confirm_password' => 'required|same:password'
    ]);

    if ($validator->fails()) {
        return $this->sendError($validator->errors()->all());
    }

    $list->nip = $input['nip'];
    $list->nama = $input['nama'];
    $list->alamat = $input['alamat'];
    $list->divisi = $input['divisi'];
    $list->email = $input['email'];
    $list->password = $input['password'];
    $list->save();

    return $this->sendResponse(new ListResource($list), 'Data updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $list = sales::find($id);
        if (!is_null($list)) {
            $list->delete();
        }

        return $this->sendResponse([], 'Data deleted');
    }
}
