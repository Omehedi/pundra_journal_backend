<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Admin\TeamMember;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    use Helper;
    public function __construct(){
        $this->model = new TeamMember();

        $this->middleware(function ($request, $next) {
            if (!can(request()->route()->action['as'])){
                return returnData(5001, null, 'You are not authorized to access this page');
            }
            return $next($request);
        });
    }


    public function index()
    {
        try {
            $keyword = request()->input('keyword');
            $data = $this->model
                ->when($keyword, function ($query) use ($keyword) {
                    $query->where('title', 'Like', "%$keyword%");
                })->paginate(input('perPage'));

            return returnData(2000, $data);
        } catch (\Exception $exception) {
            return returnData(5000, $exception->getMessage(), 'Whoops, Something Went Wrong..!!');
        }

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try {
            $input = $request->all();

            $validate = $this->model->validate($input);
            if ($validate->fails()) {
                return returnData(3000, $validate->errors());
            }

            $this->model->fill($input);
            $this->model->save();

            return returnData(2000, null, 'Successfully Inserted');

        } catch (\Exception $exception) {
            return returnData(5000, $exception->getMessage(), 'Whoops, Something Went Wrong..!!');
        }

    }


    public function show($id)
    {
        try {
            $data = $this->model->where('id', $id)->first();

            if (!$data) {
                return returnData(5000, null, 'Data not found');
            }

            $resultData = $data->toArray();

            return returnData(2000, $resultData);
        } catch (\Exception $exception) {
            return returnData(5000, $exception->getMessage(), $exception->getMessage());
        }
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        try {
            $validator = $this->model->validate($request->all());

            if ($validator->fails()) {
                return response()->json(['result' => $validator->errors(), 'status' => 3000], 200);
            }

            $data = $this->model->where('id', $request->input('id'))->first();

            if ($data) {
                $data->fill($request->all());
                $data->update();
                return returnData(2000, null, 'Successfully Inserted');
            }
            return returnData(3000, null, 'Country not found');

        } catch (\Exception $e) {
            return returnData(5000,null,$e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $data = $this->model->where('id', $id)->first();
            if ($data) {
                $data->delete();

                return returnData(2000, $data, 'Successfully Deleted');
            }

            return returnData(5000, null, 'Data Not found');

        } catch (\Exception $exception) {
            return returnData(5000, $exception->getMessage(), 'Whoops, Something Went Wrong..!!');
        }

    }
}