<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Customers;
use App\Http\Resources\CustomerResource as customerResource;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Customers::all();
        return response()->json(customerResource::collection($list), 200);
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
            'nik' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'nomor_telepon' => 'required',
            'fotoktp' => 'required',
            'id_paket' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $customer = new Customers();
        $customer->nik = $input['nik'];
        $customer->nama = $input['nama'];
        $customer->jenis_kelamin = $input['jenis_kelamin'];
        $customer->alamat = $input['alamat'];
        $customer->nomor_telepon = $input['nomor_telepon'];
        $customer->fotoktp = $input['fotoktp'];
        $customer->id_paket = $input['id_paket'];
        $customer->save();

        return response()->json($customer, 201);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $input = $request->all();
        $validator = Validator::make($input, [
            'nik' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'nomor_telepon' => 'required',
            'fotoktp' => 'required',
            'id_paket' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $customer = Customers::find($id);

        if (is_null($customer)) {
            return response()->json(['error' => 'Customer not found'], 404);
        }

        $customer->nik = $input['nik'];
        $customer->nama = $input['nama'];
        $customer->jenis_kelamin = $input['jenis_kelamin'];
        $customer->alamat = $input['alamat'];
        $customer->nomor_telepon = $input['nomor_telepon'];
        $customer->fotoktp = $input['fotoktp'];
        $customer->id_paket = $input['id_paket'];
        $customer->save();

        return response()->json($customer, 200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
