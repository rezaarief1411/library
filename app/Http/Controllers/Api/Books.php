<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\Books as BooksModel;

class Books extends Controller
{
    public function index()
    {
        try {
            $books = BooksModel::all();
            return response()->json($books);
        } catch (\QueryException $e) {
            $error = [
                'error' => $e->getMessage()
            ];
            return response()->json($error, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = validator::make($request->all(), [
                'name' => 'required',
                'bio' => 'required',
                'birth_date' => 'required'
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            AuthorsModel::create($request->all());
            $response = [
                'Success' => 'New authors Created',
            ];
            return response()->json($response, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            $error = [
                'error' => $e->getMessage()
            ];
            return response()->json($error, Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
