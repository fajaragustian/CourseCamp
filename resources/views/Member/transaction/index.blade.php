@extends('layouts.user.app')
@section('title', 'Dashboard Member Course Camp')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Welcome To Dashboard</h1>
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
                        <div class="col-md-11 mx-auto">
                            @include('components.alert')
                        </div>
                        <div class="card-header">
                            <h4>Transaction Course History</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr class="justify-content-center">
                                            <th>
                                                #
                                            </th>
                                            <th>Menthor</th>
                                            <th>Course Name</th>
                                            <th>Price</th>
                                            <th>Date</th>
                                            <th>Status Payment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($data as $dt)
                                        <tr>
                                            <td></td>
                                            <td><img alt="image" src="../assets/img/avatar/avatar-5.png"
                                                    class="rounded-circle" width="35" data-toggle="tooltip"
                                                    title="Wildan Ahdian"></td>
                                            <td>{{ $dt->camp->title }}</td>
                                            <td>@currency($dt->total)
                                                @if ($dt->discount_id)
                                                <p class="badge badge-primary pb-2">
                                                    {{$dt->discount_percentage}}%</p>
                                                @endif
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($dt->created_at)->formatLocalized('%d %B %Y')
                                                }}
                                            </td>
                                            <td>
                                                <a class="badge badge-primary pb-2 text-white text-capitalize "> {{
                                                    $dt->payment_status }} </a>
                                            </td>
                                        </tr>
                                        @empty
                                        Transaksi Course Camp Belum Tersedia
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
