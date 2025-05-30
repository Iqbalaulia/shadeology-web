@extends('admin.layouts.main')
@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Product Recommendation List
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
                        <li class="breadcrumb-item">Product Recommendation</li>
                        <li class="breadcrumb-item active">Product Recommendation List</li>
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
                    data-original-title="test" data-bs-target="#exampleModal">Create Product Recommendation</button>
            </div>
            <div class="card-body vendor-table">
                <table class="display" id="basic-1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Images</th>
                            <th>Product Name</th>
                            <th>Personal Color</th>
                            <th>Skin Tone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($members as $member)
                            <tr>
                                <td>{{ $member->user->name }}</td>
                                <td>{{ $member->no_hp ?? '-' }}</td>
                                <td>{{ $member->domisili ?? '-' }}</td>
                                <td>
                                    @if ($member->barter == 'Ya')
                                        <span class="badge bg-success">Yes</span>
                                    @else
                                        <span class="badge bg-danger">No</span>
                                    @endif
                                </td>
                                <td>{{ $member->instagram ?? '-' }}</td>
                                <td>{{ $member->tiktok ?? '-' }}</td>
                                <td>
                                    @foreach ($member->user->roles as $role)
                                        <span class="badge bg-{{ $role->name === 'admin' ? 'danger' : 'success' }}">
                                            {{ ucfirst($role->name) }}
                                        </span>
                                    @endforeach
                                </td>
                                <td>
                                    <div>
                                        <i class="fa fa-edit me-2 font-success cursor-pointer"
                                            onclick="editMember({{ $member->id }})"></i>
                                        <form action="{{ route('admin.member.destroy', $member->id) }}" method="POST"
                                            class="d-inline" id="delete-form-{{ $member->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <i class="fa fa-trash font-danger cursor-pointer"
                                                onclick="confirmDelete({{ $member->id }})"></i>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach --}}
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
                        Product Recommendation</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" method="POST" action="{{ route('admin.skin-tone.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form">
                            <div class="row">
                                <div class="form-group mb-3">
                                    <label for="edit_barter">Personal Color</label>
                                    <select class="form-control digits" id="personal_color" name="personal_color" required>
                                        <option>Wardah</option>
                                        <option>Somethinc</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mb-3">
                                    <label for="edit_barter">Skin Tone</label>
                                    <select class="form-control digits" id="skin_tone" name="skin_tone" required>
                                        <option>Cushion</option>
                                        <option>Lipstik</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mb-3">
                                    <label for="edit_barter">Product</label>
                                    <select class="form-control digits" id="product" name="product" required>
                                        <option>Cushion</option>
                                        <option>Lipstik</option>
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
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title f-w-600" id="exampleModalLabel">Edit
                        Product Recommendation</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form id='editForm' class="needs-validation" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form">
                            <div class="row">
                                <div class="form-group mb-3">
                                    <label for="edit_barter">Personal Color</label>
                                    <select class="form-control digits" id="personal_color" name="personal_color"
                                        required>
                                        <option>Wardah</option>
                                        <option>Somethinc</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mb-3">
                                    <label for="edit_barter">Skin Tone</label>
                                    <select class="form-control digits" id="skin_tone" name="skin_tone" required>
                                        <option>Cushion</option>
                                        <option>Lipstik</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mb-3">
                                    <label for="edit_barter">Product</label>
                                    <select class="form-control digits" id="product" name="product" required>
                                        <option>Cushion</option>
                                        <option>Lipstik</option>
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
{{-- @push('scripts')
    <script>
        function confirmDelete(id) {
            if (confirm('Are you sure you want to delete this member?')) {
                document.getElementById('delete-form-' + id).submit();
            }
        }

        function editMember(id) {
            fetch(`/admin/member/${id}/edit`)
                .then(response => response.json())
                .then(data => {

                    console.log("id", id);
                    document.getElementById('editForm').action = `/admin/member/${id}`;
                    document.getElementById('edit_name').value = data.name;
                    document.getElementById('edit_email').value = data.email;
                    document.getElementById('edit_phone').value = data.no_hp;
                    document.getElementById('edit_domisili').value = data.domisili;
                    document.getElementById('edit_affiliation').value = data.affiliate;
                    document.getElementById('edit_shade_foundation').value = data.shade_foundation;
                    document.getElementById('edit_merried_status').value = data.merried_status;
                    document.getElementById('edit_barter').value = data.barter;
                    document.getElementById('edit_instagram').value = data.instagram;
                    document.getElementById('edit_followers_instagram').value = data.followers_instagram;
                    document.getElementById('edit_tiktok').value = data.tiktok;
                    document.getElementById('edit_followers_tiktok').value = data.followers_tiktok;

                    if (data.rate_card) {
                        const preview = document.getElementById('editRateCardPreview');
                        preview.innerHTML =
                            `<img src="/${data.rate_card}" class="img-thumbnail" style="max-width: 200px">`;
                    }

                    new bootstrap.Modal(document.getElementById('editModal')).show();
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
@endpush --}}
