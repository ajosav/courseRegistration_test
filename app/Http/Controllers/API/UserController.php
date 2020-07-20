<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\User;
use App\Photo;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize("isAdmin");
        return User::with('photo')->latest()->paginate(10);
        
        // $users = User::latest()->paginate(10);
        // $users->load('photo');
        // return response()->json($users);
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
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:15', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'option_id' => ['required', 'integer'],
            'category_id' => ['required', 'integer'],
            'password' => ['required', 'string', 'min:6'],
        ]);
        User::create([
            'name' => $request['name'],
            'username' => $request['username'],
            'email' => $request['email'],
            'option_id' => $request['option_id'],
            'photo_id' => $request['photo_id'],
            'category_id' => $request['category_id'],
            'password' => Hash::make($request['password'])
        ]);
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
    public function profile() {
        $user = auth('api')->user()
                ->load('photo');
        return response()->json($user);
    }

    public function updateProfile(Request $request) {
        $user = auth('api')->user();

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'username' => 'required|string|max:15|unique:users,username,'.$user->id,
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'option_id' => ['required', 'integer'],
            'password' => ['sometimes', 'string', 'min:6'],
        ]);
        $existingPhoto = Photo::find($user->photo_id);
        $currentPhoto = $existingPhoto ? $existingPhoto->file : null;
        

        if($request->photo !== "" && $request->photo !== null) {
            $name = time().'.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];
            \Image::make($request->photo)->save(public_path('images/profile/').$name);
            
            $photo = Photo::create(['file'=>$name]);
            $photo_id = $photo->id;

            $request->merge(['photo_id' => $photo_id]);
            $userPhoto = public_path($currentPhoto);
            if(file_exists($userPhoto)) {
                if($existingPhoto) {
                    $existingPhoto->delete();
                }
                @unlink($userPhoto);
            }
        }

        if(!empty(trim($request->password))) {
            $request->merge(['password' => Hash::make($request['password'])]);
        }

        $user->update($request->all());
        return ['Success', "Updated Successfuly"];
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
        //
        $this->authorize("isAdmin");
        $user = User::findOrFail($id);
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'username' => 'required|string|max:15|unique:users,username,'.$user->id,
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'option_id' => ['required', 'integer'],
            'category_id' => ['required', 'integer'],
            'password' => ['sometimes', 'string', 'min:6'],
        ]);
        $user->update($request->all());
        return ["messgage" => "Updated the User Information"];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize("isAdmin");
        // Find the user
        $user = User::findOrFail($id);
        $user->delete();

        // Delete the user
        return ['message' => 'User deleted'];

    }
}
