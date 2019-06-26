<?php
namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\model\User;
use DB;
class add extends Controller
{

	public function add()
	{
		return view('admin/add_file');
	}

}





?>