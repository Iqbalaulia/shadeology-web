@extends('admin.layouts.main')
@section('content')
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        <h3>Product List
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
                        <li class="breadcrumb-item">Product</li>
                        <li class="breadcrumb-item active">Product List</li>
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
                    data-original-title="test" data-bs-target="#exampleModal">Create Product</button>
            </div>
            <div class="card-body vendor-table">
                <table class="display" id="basic-1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Images</th>
                            <th>Product Name</th>
                            <th>Brand</th>
                            <th>Type</th>
                            <th>Link Affiliate</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productsList as $products)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if ($products->image)
                                        <img src="{{ asset($products->image) }}" alt="Product Image"
                                            class="img-thumbnail image-table">
                                    @else
                                        <span class="badge bg-warning">No Image</span>
                                    @endif
                                </td>
                                <td>{{ $products->name }}</td>
                                <td>{{ $products->brand->name }}</td>
                                <td>{{ $products->type->name }}</td>
                                <td>
                                    @if ($products->link_affiliate)
                                        <a href="{{ $products->link_affiliate }}" target="_blank">
                                            {{ Str::limit($products->link_affiliate, 20, '...') }}
                                        </a>
                                    @else
                                        <span class="badge bg-danger">No Link Affiliate</span>
                                    @endif
                                </td>
                                <td>
                                    <div>
                                        <i class="fa fa-edit me-2 font-success cursor-pointer"
                                            onclick="editProduct({{ $products->id_product }})"></i>
                                        <form action="{{ route('admin.product.destroy', $products->id_product) }}"
                                            method="POST" class="d-inline" id="delete-form-{{ $products->id_product }}">
                                            @csrf
                                            @method('DELETE')
                                            <i class="fa fa-trash font-danger cursor-pointer"
                                                onclick="confirmDelete({{ $products->id_product }})"></i>
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
                        Product</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" method="POST" action="{{ route('admin.product.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group mb-3">
                                        <label for="kuota">Product Name</label>
                                        <input class="form-control" id="name" name="name" type="text" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mb-3">
                                    <label for="edit_barter">Brand</label>
                                    <select class="form-control digits" id="id_merk" name="id_merk" required>
                                        @foreach ($productBrand as $brand)
                                            <option value="{{ $brand->id_merk }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mb-3">
                                    <label for="edit_barter">Type</label>
                                    <select class="form-control digits" id="id_type" name="id_type" required>
                                        @foreach ($productType as $type)
                                            <option value="{{ $type->id_type_product }}">{{ $type->name }}</option>)
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group mb-3">
                                        <label for="kuota">Link Affiliate</label>
                                        <input class="form-control" id="link_affiliate" name="link_affiliate"
                                            type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group mb-3">
                                        <label for="image" class="mb-1">Images Product :</label>
                                        <div id="imagePreview" class="mb-2 image-preview"></div>
                                        <input class="form-control" id="image" name="image" type="file"
                                            onchange="previewImage(this)" required>
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
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title f-w-600" id="exampleModalLabel">Edit
                        Product</h5>
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
                                        <label for="kuota">Product Name</label>
                                        <input class="form-control" id="edit_name" name="name" type="text"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mb-3">
                                    <label for="edit_barter">Brand</label>
                                    <select class="form-control digits" id="edit_id_merk" name="id_merk" required>
                                        @foreach ($productBrand as $brand)
                                            <option value="{{ $brand->id_merk }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mb-3">
                                    <label for="edit_barter">Type</label>
                                    <select class="form-control digits" id="edit_id_type" name="id_type" required>
                                        @foreach ($productType as $type)
                                            <option value="{{ $type->id_type_product }}">{{ $type->name }}</option>)
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group mb-3">
                                        <label for="kuota">Link Affiliate</label>
                                        <input class="form-control" id="edit_affliate" name="link_affiliate"
                                            type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group mb-3">
                                        <label for="validationCustom02" class="mb-1">Images Product :</label>
                                        <div id="editImagePreview" class="mb-2 image-preview"></div>
                                        <input class="form-control" id="edit_image" name="image" type="file"
                                            onchange="previewImage(this)">
                                        <small class="text-muted">Leave empty to keep current image</small>
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
        function previewImage(input) {
            const preview = document.getElementById('imagePreview');
            preview.innerHTML = '';

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.maxWidth = '400px';
                    img.style.maxHeight = '400px';
                    img.classList.add('img-thumbnail');
                    preview.appendChild(img);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        function confirmDelete(id) {
            if (confirm('Are you sure you want to delete this product?')) {
                document.getElementById('delete-form-' + id).submit();
            }
        }

        function editProduct(id) {
            fetch(`/administration/product/${id}/edit`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('editForm').action = `/administration/product/${id}`;
                    document.getElementById('edit_name').value = data.name;
                    document.getElementById('edit_id_merk').value = data.id_merk;
                    document.getElementById('edit_id_type').value = data.id_type;
                    document.getElementById('edit_affliate').value = data.link_affiliate;

                    if (data.image) {
                        const preview = document.getElementById('editImagePreview');
                        preview.innerHTML = `
                        <img src="/${data.image}" class="img-thumbnail" style="max-width: 200px">
                        <input type="hidden" id="edit_image" name="image" value="${data.image}">
                        `;
                    }

                    new bootstrap.Modal(document.getElementById('editModal')).show();
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
@endpush
