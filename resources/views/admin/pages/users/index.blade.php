@extends('admin.layouts.main')
@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Users List
                            <small>Shadeology Admin panel</small>
                        </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ol class="breadcrumb pull-right">
                        <li class="breadcrumb-item">
                            <a href="index.html">
                                <i data-feather="home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item">Member</li>
                        <li class="breadcrumb-item active">Member List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <form class="form-inline search-form search-box">
                    <div class="form-group">
                        <input class="form-control-plaintext" type="search" placeholder="Search.."><span
                            class="d-sm-none mobile-search"><i data-feather="search"></i></span>
                    </div>
                </form>

                <button type="button" class="btn btn-primary mt-md-0 mt-2" data-bs-toggle="modal"
                    data-original-title="test" data-bs-target="#exampleModal">Create Users</button>
            </div>
            <div class="card-body vendor-table">
                <table class="display" id="basic-1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $member)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $member->name }}</td>
                                <td>{{ $member->phone_number ?? '-' }}</td>
                                <td>
                                    @foreach ($member->roles as $role)
                                        <span
                                            class="badge bg-{{ $role->name === 'administration' ? 'success' : 'danger' }}">
                                            {{ ucfirst($role->name) }}
                                        </span>
                                    @endforeach
                                </td>
                                <td>
                                    <div>
                                        <a href="javascript:void(0)" onclick="editMember({{ $member->id }})">
                                            <i class="fa fa-edit me-2 font-success cursor-event" title="Delete"></i>
                                        </a>
                                        <form action="{{ route('admin.users.destroy', $member->id) }}" method="POST"
                                            class="d-inline" id="delete-form-{{ $member->id }}">
                                            @csrf
                                            @method('DELETE')

                                            <a href="javascript:void(0)" onclick="confirmDelete({{ $member->id }})">
                                                <i class="fa fa-trash" title="Delete"></i>
                                            </a>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- Modal Create -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title f-w-600" id="exampleModalLabel">Add
                        Member Shadeology</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" method="POST" action="{{ route('admin.users.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group mb-3">
                                        <label for="kuota">Name</label>
                                        <input class="form-control" id="name" name="name" type="text" required>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group mb-3">
                                        <label for="email">Email</label>
                                        <input class="form-control" id="email" name="email" type="email" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group mb-3">
                                        <label for="phone_number">Number Phone</label>
                                        <input class="form-control" id="phone_number" name="phone_number" type="number"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mb-3">
                                    <label for="role">Role</label>
                                    <select class="form-control digits" id="role" name="role">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit">Save</button>
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Create -->

    <!-- Modal Edit -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title f-w-600" id="exampleModalLabel">Edit
                        Member CreatorsLab</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form id='editForm' class="needs-validation" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group mb-3">
                                        <label for="kuota">Name</label>
                                        <input class="form-control" id="edit_name" name="name" type="text"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group mb-3">
                                        <label for="email">Email</label>
                                        <input class="form-control" id="edit_email" name="email" type="email"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group mb-3">
                                        <label for="phone_number">Number Phone</label>
                                        <input class="form-control" id="edit_phone" name="phone_number" type="number"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mb-3">
                                    <label for="edit_role">Access</label>
                                    <select class="form-control digits" id="edit_role" name="role">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit">Update</button>
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Edit -->
@endsection
@push('scripts')
    <script>
        function confirmDelete(id) {
            if (confirm('Are you sure you want to delete this user?')) {
                document.getElementById('delete-form-' + id).submit();
            }
        }

        function editMember(id) {
            fetch(`/administration/users/${id}/edit`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('editForm').action = `/administration/users/${id}`;
                    document.getElementById('edit_name').value = data.name;
                    document.getElementById('edit_email').value = data.email;
                    document.getElementById('edit_phone').value = data.phone_number;
                    document.getElementById('edit_role').value = data.roles[0]?.name || '';

                    new bootstrap.Modal(document.getElementById('editModal')).show();
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
@endpush
