<?php

namespace App\Http\Controllers\RBAC;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    use Helper;

    public function __construct()
    {
        $this->model = new Role();
    }

    public function index()
    {
        try {
            $keyword = request()->input('keyword');
            $data = $this->model
                ->when($keyword, function ($query) use ($keyword) {
                    $query->where('name', 'Like', "%$keyword%");
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
                return returnData(2000, $validate->errors());
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
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        try {
            $input = $request->all();

            $validate = $this->model->validate();
            if ($validate->fails()) {
                return returnData(2000, $validate->errors());
            }

            $data = $this->model->where('id', $request->id)->first();
            if ($data) {
                $data->fill($input);
                $data->save();
            }

            return returnData(2000, null, 'Successfully Inserted');

        } catch (\Exception $exception) {
            return returnData(5000, $exception->getMessage(), 'Whoops, Something Went Wrong..!!');
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
