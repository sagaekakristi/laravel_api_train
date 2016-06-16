<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Note;
use App\Category;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Redirect;

class TestAPI extends Controller
{
	public function index()
	{
		$notes = Note::all();
		return Response::json(array(
			'code' => 200,
			'message' => 'Success!',
			'data' => $notes->toArray(),
			), 200);
	}

	public function show($id)
	{
		$note = Note::find($id);
		if(is_null($note)){
			return Response::json(array(
				'code' => 200,
				'message' => 'Fail!',
				'data' => [],
			), 200);
		}
		else {
			return Response::json(array(
				'code' => 200,
				'message' => 'Success!',
				'data' => $note->toArray(),
			), 200);
		}
	}

	public function create(Request $request)
	{
		$new_note = new Note;
		$new_note->content = $request->input('content');;
		$new_note->save();

		return Response::json(array(
			'code' => 200,
			'message' => 'Success!',
			'data' => [],
		), 200);
	}
}
