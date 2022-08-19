@extends('layouts.admin.app')
@section('title', 'Dashboard Admin Course Camp')
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
                            <h4>Transaction Course History</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>User</th>
                                            <th>Course Name</th>
                                            <th>Price</th>
                                            <th>Date</th>
                                            <th>Status Payment</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($data as $dt)
                                        <tr>
                                            <td></td>
                                            <td><img alt="image" src="{{ $dt->user->avatar}}" class="rounded-circle"
                                                    width="35" data-toggle="tooltip" title="{{ $dt->user->name }}"></td>
                                            <td>{{ $dt->camp->title }}</td>
                                            <td>@currency ( $dt->camp->price )</td>
                                            <td>{{ \Carbon\Carbon::parse($dt->created_at)->formatLocalized('%d %B %Y')
                                                }}
                                            </td>
                                            <td>
                                                @if ($dt->is_paid)
                                                <div class="badge badge-primary pb-2">Completed Payment</div>
                                                @else
                                                <div class="badge badge-success pb-2 ">Pending Payment</div>
                                                @endif
                                            </td>
                                            <td>
                                                @if (!$dt->is_paid)
                                                <form action="{{route('admin.checkout.update', $dt->id)}}"
                                                    method="post">
                                                    @csrf
                                                    <button class="btn btn-primary text-white mb-2">Set To Paid
                                                    </button>
                                                </form>
                                                @else
                                                <a href="https://wa.me/08xxxxxxxxx?text=Hi {{ Auth::user()->name }}. Saya ingin konfirmasi course {{ $dt->camp->title }} sudah melakukan pembayaran. Untuk teknis lanjutannya bagaimana ya kak ?"
                                                    class="btn btn-success mb-2 "> Detail Payment </a>
                                                @endif

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
