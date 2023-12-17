<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use DataTables;
use App\Imports\CityImport;

use Maatwebsite\Excel\Facades\Excel;

class CityController extends Controller
{
    protected $folderPath;

    public function __construct(){
        $this->folderPath = 'admin.city.';
    }

    public function index(){
        return view($this->folderPath.'index');
    }

    public function data()
    {
        $city = City::get();
        return DataTables::of($city)
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->addColumn('action', function (City $city) {
                return '<a href="'.route("admin.city.view",encrypt($city->id)).'" class="btn btn-sm btn-warning dynamic-modal-md mr-2">View</a>';
            })
            ->make(true);
    }

    public function create(){
        return view($this->folderPath.'modals.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls',
        ]);

        Excel::import(new CityImport, $request->file('excel_file')->store('temp'));
        return response()->json(['success' => 'City import successfully!']);
    }
}
