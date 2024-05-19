<?php

namespace App\Http\Controllers;

use Yajra\DataTables\Facades\Datatables;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Siswa::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn =
                    '<a href="javascript:void(0)" rel="tooltip" class="btn btn-info btn-link btn-md m-0 p-2" href=""><i class="material-icons">visibility</i> <div class="ripple-container"></div></a>

                    <a href="javascript:void(0)" rel="tooltip" class="edit btn btn-warning btn-link btn-md m-0 p-2" href=""><i class="material-icons">edit</i> <div class="ripple-container"></div></a>

                    <a href="javascript:void(0)" rel="tooltip" class="delete btn btn-danger btn-link btn-md m-0 p-2" href=""><i class="material-icons">delete</i> <div class="ripple-container"></div></a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }


        return view('pages.siswa');
    }

    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->parameters([
                        'buttons' => ['export'],
                    ]);
    }

    public function create()
    {

    }
}
