<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use App\Models\Authors as AuthorsModel;

class Authors extends Controller
{
    public function index()
    {
        try {
            $authors = AuthorsModel::all();
            return response()->json($authors);
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
                'name' => $request->name,
                'bio' => $request->bio,
                'birth_date' => $request->birth_date
            ];
            $validator = validator::make($details, [
                'name' => 'required|unique:authors',
                'bio' => 'required',
                'birth_date' => 'required|date_format:Y-m-d'
            ]);
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            AuthorsModel::create($details);

            $response = [
                'success' => true,
                'message' => 'New authors Created'

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
        //find authors by ID
        $authors = AuthorsModel::find($id);
        return response()->json($authors);
    }

    public function update(Request $request, $id)
    {
        $details =[
            'name' => $request->name,
            'bio' => $request->bio,
            'birth_date' => $request->birth_date
        ];

        //define validation rules
        $validator = validator::make($details, [
            'name' => 'required',
            'bio' => 'required',
            'birth_date' => 'required|date_format:Y-m-d'
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //find post by ID
        $authors = AuthorsModel::find($id);

        $authors->update($details);

        $response = [
            'success' => true,
            'message' => 'Authors Data was Updated'

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

        $authors = AuthorsModel::find($id);

        $authors->delete();

        $response = [
            'success' => true,
            'message' => 'Authors Data was Deleted',
            'data' => $authors

        ];
        return response()->json($response, Response::HTTP_OK);
    }
}
