@extends('layouts.app', ['title' => 'HRI-HOTEL | Category'])
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @include('layouts.partials.error')
                    <button type="submit" class="btn btn-primary btn-md" data-toggle="modal" data-target="#addModal"><i
                            class="fa fa-plus"></i></button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Facility</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- add data modal --}}
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Add New Category</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <form action="{{ route('admin.category.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="name">Name:</label>
                                    <input class="form-control" type="text" name="name" id="name"
                                        placeholder="Category name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="facility">Facility:</label>
                                    <input class="form-control" type="text" name="facility" id="facility"
                                        placeholder="Input facility" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-form-label" for="description">Description:</label>
                                    <textarea type="text" class="form-control" name="description" id="description"
                                        required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light for-light" type="button" data-dismiss="modal">Close</button>
                        <button class="btn btn-secondary for-dark" type="button" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- detail modal category --}}
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" id="modal-header">
                    <h5 class="modal-title" id="modal-title">Detail Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body my-2" id="modal-body">

                </div>
            </div>
        </div>
    </div>
    {{-- end modal --}}
@endsection
@push('datatable')
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js "></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script>
        const dataUrl = '{{ route('admin.category.index') }}'
        const csrf = '{{ csrf_token() }}'

        jQuery(function($) {
            const table = $("table").DataTable({
                responsive: true,
                serverSide: true,
                processing: true,
                ajax: {
                    url: dataUrl,
                    type: "get",
                    error: (response) => {
                        console.log(response);
                    },
                },
                searching: true,
                columns: [{
                        data: null,
                        sortable: false,
                        searchable: false,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                    },
                    {
                        data: "name"
                    },
                    {
                        data: "description"
                    },
                    {
                        data: "facility"
                    },
                    {
                        data: "action",
                        sortable: false,
                        searchable: false,
                    },
                ],
            });

        });

    </script>
@endpush
@section('script')
    <script>
        CKEDITOR.replace('description');

        function deleteCategory(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "is Removing Category",
                        showConfirmButton: false,
                        timer: 2300,
                        timerProgressBar: true,
                        onOpen: () => {
                            document.getElementById(`DeleteCategory${id}`).submit();
                            Swal.showLoading();
                        }
                    });
                }
            })
        }

    </script>
@endsection
