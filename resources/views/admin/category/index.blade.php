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
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Facility</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @forelse ($categories as $category)
                                <tbody>
                                    <th>{{ $loop->iteration + $categories->firstItem() - 1 . '.' }}</th>
                                    <td>{{ Str::limit($category->name, 30) }}</td>
                                    <td>{{ Str::limit($category->description, 55) }}</td>
                                    <td>{{ $category->facility }}</td>
                                    <td>
                                        <a href="{{ route('admin.category.show', $category->id) }}" style="float: left;"
                                            class="mr-2"><i class="fa fa-eye" style="color:#2980b9;"></i></a>
                                        <a href="{{ route('admin.category.edit', $category->id) }}" style="float: left;"><i class="fa fa-pencil-square-o"
                                                style="color: rgb(0, 241, 12);"></i></a>
                                        <button type="submit" onclick="deleteCategory('{{ $category->id }}')" style="background-color: transparent; border: none;"><i class="icon-trash" style="color: red;"></i></button>        
                                        <form action="{{ route('admin.category.destroy', $category->id) }}" method="post" id="DeleteCategory{{ $category->id }}">
                                            @csrf
                                            @method('DELETE')
                                        </form>    
                                    </td>
                                </tbody>
                            @empty
                                <tbody>
                                    <tr>
                                        <th colspan="5" style="color: red; text-align: center;">Data Empty!</th>
                                    </tr>
                                </tbody>
                            @endforelse
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{ $categories->links() }}
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
    {{-- add data modal end --}}
    <div class="modal fade" id="memberDetail" tabindex="-1" role="dialog" aria-labelledby="memberDetailLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="border-radius: 10px">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="memberDetailLabel">Member Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form-modal" action="" method="POST">
                    @csrf
                    <div id="buatmethod"></div>
                    <div class="modal-body">
                        <div class="col-md-12 mt-2">
                            <div class="row">
                                <label class="col-md-2 col-form-label">Name</label>
                                <div class="col-sm-1 d-none d-md-block"><span>:</span></div>
                                <div class="col-md-9">
                                    <p class="form-control bg-light" id="detail-name" disabled></p>
                                </div>
                                <label class="col-md-2 col-form-label">Description</label>
                                <div class="col-sm-1 d-none d-md-block"><span>:</span></div>
                                <div class="col-md-9">
                                    <p class="form-control bg-light" id="detail-description" disabled></p>
                                </div>
                                <label class="col-md-2 col-form-label">Facility</label>
                                <div class="col-sm-1 d-none d-md-block"><span>:</span></div>
                                <div class="col-md-9">
                                    <p class="form-control bg-light" id="detail-facility" disabled></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script>
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