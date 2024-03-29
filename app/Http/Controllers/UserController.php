<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
  public function index() {
    $users = User::all();

    return response()->json($users);
  }

  //-------------------------------------------------------------------

  public function store(Request $request) {

    User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => $request->password
    ]);

    return response()->json(['msg'=>'success!']);
  }
}
