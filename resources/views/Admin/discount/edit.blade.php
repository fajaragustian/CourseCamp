@extends('layouts.admin.app')
@section('title', 'Dashboard Admin Discount Course Camp')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Welcome To Dashboard Admin </h1>
            {{-- Jika Ingin memakai breadcumbs --}}
            {{-- <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">DataTables</div>
            </div> --}}
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="col-md-11 mx-auto mt-4">
                            @include('components.alert')
                        </div>
                        <div class="card-header">
                            <h4>Update Voucher Discount</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('admin.discount.update', $discount->id)}}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{$discount->id}}">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name
                                        Voucher</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="string" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" placeholder="Masukan Nama Voucher" maxlength="12"
                                            value="{{ old('name') ?: $discount->name }}" required>
                                        @error('name')
                                        <div class="invalid-feedback mb-2">
                                            <div class="text-danger">{{ $message }}</div>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Code
                                        Voucher</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="string" class="form-control @error('code') is-invalid @enderror"
                                            id="code" name="code" placeholder="Masukan Code Voucher" maxlength="12"
                                            value="{{ old('code') ?: $discount->code }}" required>
                                        @error('code')
                                        <div class="invalid-feedback mb-2">
                                            <div class="text-danger">{{ $message }}</div>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description
                                        Voucher</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea type="string" class="form-control @error('desc') is-invalid @enderror"
                                            id="desc" name="desc" placeholder="Masukan Desc Voucher" maxlength="12"
                                            required> {{$discount->desc}}</textarea>
                                        @error('desc')
                                        <div class="invalid-feedback mb-2">
                                            <div class="text-danger">{{ $message }}</div>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Discount
                                        Percentage</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number"
                                            class="form-control @error('percentage') is-invalid @enderror"
                                            id="percentage" name="percentage" placeholder="Masukan Discount Percentage"
                                            max="100" min="1" value="{{ old('percentage') ?: $discount->percentage}}"
                                            required>
                                        @error('percentage')
                                        <div class="invalid-feedback mb-2">
                                            <div class="text-danger">{{ $message }}</div>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div id="image-preview" class="image-preview">
                                            <label for="image-upload" id="image-label">Choose File</label>
                                            <input type="file" name="image" id="image-upload" />
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button type="submit" class="btn btn-primary">Update Discount</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

@endsection
