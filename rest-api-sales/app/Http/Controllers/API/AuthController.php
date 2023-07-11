<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends BaseController
{

    public function signin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $authUser = Auth::user();
            $success['id'] = $authUser->id;
            $success['token'] =  $authUser->createToken('MyAuthApp')->plainTextToken;
            $success['name'] =  $authUser->name;

            return $this->sendResponse($success, 'User signed in');
        } else {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }
    }

    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nip' => 'required',
            'name' => 'required',
            'alamat' => 'required',
            'divisi' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Error validation', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyAuthApp')->plainTextToken;
        $success['name'] =  $user->name;

        return $this->sendResponse($success, 'User created successfully.');
    }

    public function getUser()
    {
        $user = User::all();
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
    
        $user = User::find($id);
        if (is_null($user)) {
            return $this->sendError('User record not found.');
        }
    
        $validator = Validator::make($input, [
            'nip' => 'required',
            'name' => 'required',
            'alamat' => 'required',
            'divisi' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);
    
        if ($validator->fails()) {
            return $this->sendError('Error validation', $validator->errors());
        }
    
        $input['password'] = bcrypt($input['password']);
        $user->update($input);
    
        return $this->sendResponse([], 'User updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (!is_null($user)) {
            $user->delete();
        }

        return $this->sendResponse([], 'Data deleted');
    }
}
