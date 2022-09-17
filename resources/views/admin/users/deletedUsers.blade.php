@extends('admin.layout.master')
@section('title')
    Deleted Users
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12 ">
            <div class="card mb-5 mb-xl-8">
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">Deleted Users</span>
                        <span class="text-muted mt-1 fw-bold fs-7">Over {{ $users->count() }} members</span>
                    </h3>
                    <div class="card-toolbar">
                        <a type="button" class="btn btn-sm btn-info btn-active-light-dark m-5"
                            href="{{ route('admin.viewUsers') }}">
                            View Users
                        </a>
                    </div>
                </div>
                <div class="card-body py-3">
                    <!--begin::Table container-->
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table id="addUserModal" class="table align-middle gs-0 gy-4">
                            <!--begin::Table head-->
                            <thead class="text-center">
                                <tr class="fw-bolder text-muted bg-light">
                                    <th class="">ID</th>
                                    <th class="">Name</th>
                                    <th class="">Email</th>
                                    <th class="">Phone</th>
                                    <th class="">Created At</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-center">
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>
                                            <button class="btn btn-icon btn-bg-success btn-active-color-dark btn-sm "
                                                type="button" data-bs-toggle="modal"
                                                data-bs-target="#restoreUser{{ $user->id }}">
                                                <i class="fa fa-undo text-white" aria-hidden="true"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                        {{-- modal begin --}}
                        @foreach ($users as $user)
                            <div class="modal fade" id="restoreUser{{ $user->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Warning!!!</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Do you want to restore {{ $user->name }} ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <a type="button" class="btn btn-primary"
                                                href="{{ route('admin.restoreUser', $user->id) }}">Yes</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{-- modal end --}}
                    </div>
                    <!--end::Table container-->
                </div>
            </div>
        </div>
    @endsection
