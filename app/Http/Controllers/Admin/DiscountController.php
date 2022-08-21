<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Discount\StoreRequest;
use App\Http\Requests\Admin\Discount\UpdateRequest;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Discount::all();
        return view('Admin.discount.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.discount.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        //
        $discount = Discount::create($request->all());
        if ($discount) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.discount.index')->with(['success' => 'Generate Discount Berhasil!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.discount.index')->with(['error' => 'Generate Discount Gagal Harap Periksa Data Anda!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function show(Discount $discount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function edit(Discount $discount)
    {
        //
        return view('Admin.discount.edit', [
            'discount' => $discount,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Discount $discount)
    {
        //
        $discount->update($request->all());
        if ($discount) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.discount.index')->with(['success' => 'Update Generate Discount Berhasil!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.discount.index')->with(['error' => 'Update Generate Discount Gagal Harap Periksa Data Anda!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Discount $discount)
    {
        //
        $discount->delete();
        if ($discount) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.discount.index')->with(['success' => 'Delete Discount Berhasil!']);
        }
    }
}
