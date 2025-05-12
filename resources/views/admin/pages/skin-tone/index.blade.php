@extends('admin.layouts.main')
@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Skin Tone List
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
                        <li class="breadcrumb-item">Skin Tone</li>
                        <li class="breadcrumb-item active">Skin Tone List</li>
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
                    data-original-title="test" data-bs-target="#exampleModal">Create Skin Tone</button>
            </div>
            <div class="card-body vendor-table">
                <table class="display" id="basic-1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Skin Tone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($skinTones as $tones)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $tones->name }}</td>
                                <td>
                                    <div>
                                        <a href="javascript:void(0)" onclick="editMember({{ $tones->id_skintone }})">
                                            <i class="fa fa-edit me-2 font-success cursor-event" title="Delete"></i>
                                        </a>
                                        <form action="{{ route('admin.skin-tone.destroy', $tones->id_skintone) }}"
                                            method="POST" class="d-inline" id="delete-form-{{ $tones->id_skintone }}">
                                            @csrf
                                            @method('DELETE')

                                            <a href="javascript:void(0)" onclick="confirmDelete({{ $tones->id_skintone }})">
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
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title f-w-600" id="exampleModalLabel">Add
                        Skin Tone</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" method="POST" action="{{ route('admin.skin-tone.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group mb-3">
                                        <label for="name">Name</label>
                                        <input class="form-control" id="name" name="name" type="text" required>
                                    </div>
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
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title f-w-600" id="exampleModalLabel">Edit
                        Skin Tone</h5>
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
                                        <label for="name">Name</label>
                                        <input class="form-control" id="edit_name" name="name" type="text"
                                            required>
                                    </div>
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
            if (confirm('Are you sure you want to delete this skin tone?')) {
                document.getElementById('delete-form-' + id).submit();
            }
        }

        function editMember(id) {
            fetch(`/administration/skin-tone/${id}/edit`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('editForm').action = `/administration/skin-tone/${id}`;
                    document.getElementById('edit_name').value = data.name;
                    new bootstrap.Modal(document.getElementById('editModal')).show();
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
@endpush
