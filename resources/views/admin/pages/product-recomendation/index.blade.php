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
                        @foreach ($productRecomendation as $productRecom)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if ($productRecom->product->image)
                                        <img src="{{ asset($productRecom->product->image) }}" alt="Product Image"
                                            class="img-thumbnail image-table">
                                    @else
                                        <span class="badge bg-warning">No Image</span>
                                    @endif
                                </td>
                                <td>{{ $productRecom->product->name ?? '-' }}</td>
                                <td>{{ $productRecom->personalColor->name ?? '-' }}</td>
                                <td>{{ $productRecom->skintone->name ?? '-' }}</td>
                                <td>
                                    <div>
                                        <i class="fa fa-edit me-2 font-success cursor-pointer"
                                            onclick="editProductRecommendation({{ $productRecom->id_recommendation }})"></i>
                                        <form
                                            action="{{ route('admin.product-recommendation.destroy', $productRecom->id_recommendation) }}"
                                            method="POST" class="d-inline"
                                            id="delete-form-{{ $productRecom->id_recommendation }}">
                                            @csrf
                                            @method('DELETE')
                                            <i class="fa fa-trash font-danger cursor-pointer"
                                                onclick="confirmDelete({{ $productRecom->id_recommendation }})"></i>
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
                        Product Recommendation</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" method="POST" action="{{ route('admin.product-recommendation.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form">
                            <div class="row">
                                <div class="form-group mb-3">
                                    <label for="edit_barter">Personal Color</label>
                                    <select class="form-control digits" id="id_personal_color" name="id_personal_color"
                                        required>
                                        <option value="">Select Personal Color</option>
                                        @foreach ($personalColor as $color)
                                            <option value="{{ $color->id_personal_color }}">{{ $color->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mb-3">
                                    <label for="edit_barter">Skin Tone</label>
                                    <select class="form-control digits" id="id_skintone" name="id_skintone" required>
                                        <option value="">Select Skin Tone</option>
                                        @foreach ($skintone as $skin)
                                            <option value="{{ $skin->id_skintone }}">{{ $skin->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mb-3">
                                    <label for="edit_barter">Product</label>
                                    <select class="form-control digits" id="id_product" name="id_product" required>
                                        <option value="">Select Product</option>
                                        @foreach ($productList as $product)
                                            <option value="{{ $product->id_product }}">{{ $product->name }}</option>
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
                                    <select class="form-control digits" id="edit_personal_color" name="id_personal_color"
                                        required>
                                        <option value="">Select Personal Color</option>
                                        @foreach ($personalColor as $color)
                                            <option value="{{ $color->id_personal_color }}">{{ $color->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mb-3">
                                    <label for="edit_barter">Skin Tone</label>
                                    <select class="form-control digits" id="edit_skin_tone" name="id_skintone" required>
                                        <option value="">Select Skin Tone</option>
                                        @foreach ($skintone as $skin)
                                            <option value="{{ $skin->id_skintone }}">{{ $skin->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mb-3">
                                    <label for="edit_barter">Product</label>
                                    <select class="form-control digits" id="edit_product" name="id_product" required>
                                        <option value="">Select Product</option>
                                        @foreach ($productList as $product)
                                            <option value="{{ $product->id_product }}">{{ $product->name }}</option>
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
            if (confirm('Are you sure you want to delete this product recommendation?')) {
                document.getElementById('delete-form-' + id).submit();
            }
        }

        function editProductRecommendation(id) {
            console.log("id:", id);
            fetch(`/administration/product-recommendation/${id}/edit`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('editForm').action = `/administration/product-recommendation/${id}`;
                    document.getElementById('edit_personal_color').value = data.id_personal_color;
                    document.getElementById('edit_skin_tone').value = data.id_skintone;
                    document.getElementById('edit_product').value = data.id_product;

                    new bootstrap.Modal(document.getElementById('editModal')).show();
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
@endpush
