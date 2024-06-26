<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

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
            
            $details =[
                'title' => $request->title,
                'description' => $request->description,
                'publish_date' => $request->publish_date,
                'author_id' => $request->author_id
            ];
            $validator = validator::make($details, [
                'title' => 'required|unique:books',
                'description' => 'required',
                'publish_date' => 'required|date_format:Y-m-d',
                'author_id' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            BooksModel::create($details);

            $response = [
                'success' => true,
                'message' => 'New book Created'

            ];
            return response()->json($response, Response::HTTP_CREATED);
        } catch (QueryException $e) {
            $error = [
                'error' => $e->getMessage()
            ];
            return response()->json($error, Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    public function show($id)
    {
        //find books by ID
        $books = BooksModel::find($id);
        $response = [
            'success' => true,
            'data' => $books

        ];
        return response()->json($response, Response::HTTP_OK);
    }

    public function update(Request $request, $id)
    {
        $details =[
            'title' => $request->title,
            'description' => $request->description,
            'publish_date' => $request->publish_date,
            'author_id' => $request->author_id
        ];
        $validator = validator::make($details, [
            'title' => 'required',
            'description' => 'required',
            'publish_date' => 'required|date_format:Y-m-d',
            'author_id' => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $books = BooksModel::find($id);

        $books->update($details);

        $response = [
            'success' => true,
            'message' => 'Book Data was Updated'

        ];
        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * destroy
     *
     * @param  mixed $post
     * @return void
     */
    public function destroy($id)
    {

        $books = BooksModel::find($id);

        $books->delete();

        $response = [
            'success' => true,
            'message' => 'Books Data was Deleted',
            'data' => $books

        ];
        return response()->json($response, Response::HTTP_OK);
    }
}
