@extends('admin.layout.master')
@section('title')
    Users
@endsection
@section('content')
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <p>All Users</p>
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <!--begin::Add user-->
                    <button type="button" class="btn btn-light-primary" data-bs-toggle="modal" data-bs-target="#add_user">
                        <i class="bi bi-plus"></i>Add User</button>
                    <!--end::Add user-->
                </div>
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <!--begin::Add user-->
                    <a href="{{ route('admin.viewDeletedUsers') }}">
                        <button type="button" class="btn btn-light-danger">
                            <i class="bi bi"></i>Deleted users</button></a>
                    <!--end::Add user-->
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body py-4">
            <!--begin::Table-->
            <div>
                <div class="table-responsive">
                    <table class="table align-middle gs-0 gy-4" id="users">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="fw-bolder text-muted bg-light ">
                                <th class="ps-4  rounded-start">User Id</th>
                                <th class="">User Name</th>
                                <th class="">Email</th>
                                <th class="">Phone</th>
                                <th class="">Role</th>
                                <th class="">Created at</th>
                                <th class="rounded-end">Action</th>

                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="text-gray-600 fw-bold align-middle">
                            @foreach ($users as $user)
                                <tr>

                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        @foreach ($user->roles as $role)
                                            {{ $role->name }}
                                        @endforeach
                                    </td>
                                    <td>{{ $user->created_at->diffForHumans() }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('admin.editUser', $user->id) }}"
                                                class="btn btn-primary btn-icon btn-sm" type="button"><i
                                                    class="bi bi-pencil"></i></a>
                                            <a href="{{ route('admin.deleteUser', $user->id) }}"
                                                class="btn btn-danger btn-icon btn-sm" type="button"><i
                                                    class="bi bi-trash"></i></a>
                                        </div>
                                    </td>
                            @endforeach
                            </tr>
                        </tbody>
                        <!--end::Table body-->
                    </table>
                </div>
            </div>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    @foreach ($users as $user)
        <div class="modal fade" tabindex="-1" id="deleteUser{{ $user->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete User</h5>

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <span class="svg-icon svg-icon-2x"></span>
                        </div>
                        <!--end::Close-->
                    </div>

                    <div class="modal-body">
                        <p>Do you really want to delete this user ?</p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <a href="{{ route('admin.deleteUser', $user->id) }}" type="button"
                            class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!--begin::Modal - create user-->
    <div class="modal fade" tabindex="-1" id="add_user">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add User</h5>
                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>
                <form action="{{ route('admin.addUser') }}" method="POST" enctype="multipart/form-data" id="myForm">
                    @csrf
                    <div class="modal-body ">
                        <div class='form-group row mb-4 align-middle'>
                            <label class=" col-lg-3 required form-label">User Name</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control form-control-solid" placeholder="User Name"
                                    name='name' required />
                            </div>
                        </div>
                        <div class='form-group row mb-4'>
                            <label class=" col-lg-3 required form-label">Email</label>
                            <div class="col-lg-9">
                                <input type="email" class="form-control form-control-solid" placeholder="user@example.com"
                                    name="email" required />
                            </div>
                        </div>


                        <div class='form-group row mb-4'>
                            <label class=" col-lg-3 required form-label">Phone</label>
                            <div class="col-lg-9">
                                <input type="tel" class="form-control form-control-solid" placeholder="9999999999"
                                    name="phone" minlength="10" maxlength="10" pattern="[789][0-9]{9}"
                                    title="Phone Number should start with 6,7,8,9 | Min Length = 10" required />
                            </div>
                        </div>
                        <div class='form-group row mb-4'>
                            <label class=" col-lg-3 required form-label">Password</label>
                            <div class="col-lg-9">
                                <input type="password" class="form-control form-control-solid" minlength='8'
                                    placeholder="Password" name='password' required />


                            </div>

                        </div>
                        <div class='form-group row mt-5'>
                            <label class=" col-lg-3 form-label">
                                Role<span class="text-danger">*</span></label>
                            <div class="col-lg-9">
                                <select class="form-select form-select-solid" data-control="select2"
                                    data-placeholder="Select an option" name='role' data-dropdown-parent="#add_user"
                                    data-allow-clear="true" required>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}"
                                            @if ($role->name == 'Grocery Owners') selected @endif>
                                            {{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <!--end::Modal - Add task-->
    <!-- begin::modal -delete User !-->

    <!--End Modal !-->
    <script>
        $(document).ready(function() {
            var datatable = $('#users').DataTable({
                processing: true,
                serverSide: false,
                stateSave: true,
                responsive: true,
                // select: true,
                filter: true,
                dom: "<'row'" +
                    "<'col-sm-6 d-flex align-items-center justify-conten-start search 'l>" +
                    "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
                    ">" +

                    "<'table-responsive'tr>" +

                    "<'row'" +
                    "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                    "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                    ">",
                order: [
                    [0, "ASC"]
                ],


            });
            var search = document.querySelector('.search');
            html = search.innerHTML
            search.innerHTML = '<span class="fw-3 px-2">Show</span>' + html +
                '<span class="fw-3 px-2">Entries</span>'
        });
    </script>
@endsection
