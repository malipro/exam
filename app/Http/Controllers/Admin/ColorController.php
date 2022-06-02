<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Repositories\ColorRepositoryInterface;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    private $repository;

    public function __construct(ColorRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $colors = $this->repository->all($request);

        return view('admin.color.index',compact('colors'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->repository->store($request);

        return back()->with('success-message','created successfully');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Color $color)
    {
        $this->repository->update($request, $color);

        return back()->with('success-message','update successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Color $color)
    {
        $result = $this->repository->destroy($color);

        if(!$result)
            return back()->with('error-message','delete failed!');

        return back()->with('success-message','deleted successfully');


    }
}
