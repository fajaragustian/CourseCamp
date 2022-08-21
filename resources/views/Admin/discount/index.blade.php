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
                            <h4>Discount History</h4>
                        </div>
                        <div class="card-body">
                            @if ( Auth::user()->userRole->role_id == 1 )
                            <a href="{{route('admin.discount.create')}}" class="btn btn-success mb-2 "> Add Voucher
                            </a> <br>
                            @else

                            @endif
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Name</th>
                                            <th>Code</th>
                                            <th>Desc</th>
                                            <th>Percentage</th>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($data as $dt)
                                        <tr>
                                            <td></td>
                                            {{-- <td><img alt="image" src="{{ $dt->user->avatar}}"
                                                    class="rounded-circle" width="35" data-toggle="tooltip"
                                                    title="{{ $dt->user->name }}"></td> --}}
                                            <td>{{ $dt->name}}</td>
                                            <td>
                                                <div class="badge badge-primary pb-2 ">{{ $dt->code }}</div>
                                            </td>
                                            <td>{{ $dt->desc }}</td>
                                            <td>{{ $dt->percentage }}%</td>
                                            <td>
                                                <a href="{{route('admin.discount.edit',$dt->id)}}"
                                                    class="btn btn-success mb-2 "> Edit </a>
                                                <form action="{{route('admin.discount.destroy', $dt->id)}}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger mb-2 ">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        Transaksi Discount Course Camp Belum Tersedia
                                        @endforelse
                                        {{-- Jika Ingin memakai Progress Bar
                                        <td class="align-middle">
                                            <div class="progress" data-height="4" data-toggle="tooltip" title="100%">
                                                <div class="progress-bar bg-success" data-width="100%"></div>
                                            </div>
                                        </td> --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

@endsection
