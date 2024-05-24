@extends('backend.layouts.main')
@section('title', 'MT : : Admin Profile')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">

            <!-- Modal -->
            <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="profileModalLabel">Add Profile</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{!! route('teststore') !!}" method="POST" id="myform">
                                @csrf
                                <div class="mb-3">
                                    <label for="fullname" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="John Doe">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email"
                                        placeholder="john.doe@example.com">
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" class="form-control" name="phone" placeholder="Phone">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Edit Modal -->
            <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST" id="editForm">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="editName" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="editName" name="name"
                                        placeholder="John Doe">
                                </div>
                                <div class="mb-3">
                                    <label for="editEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="editEmail" name="email"
                                        placeholder="john.doe@example.com">
                                </div>
                                <div class="mb-3">
                                    <label for="editPhone" class="form-label">Phone</label>
                                    <input type="text" class="form-control" id="editPhone" name="phone"
                                        placeholder="Phone">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- End Modal -->

            <!-- End Modal -->
            <!-- Basic with Icons -->
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0"> Profile</h5>
                        <small class="text-muted float-end">Merged input group</small>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#profileModal">Add Profile</button>
                        <table class="table" id="getdata">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>email</th>
                                    <th>phone</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#myform').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "{{ route('teststore') }}",
                    data: $(this).serialize(),
                    success: function(response) {
                        console.log(response);
                        $('#getdata').DataTable().ajax.reload();
                        $('#myform')[0].reset();
                        $('#profileModal').modal('hide');
                        alert('Data submitted successfully!');
                    },
                    error: function(error) {
                        console.log(error);
                        alert('Error occurred while submitting data.');
                    }
                });
            });

            $('#getdata').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('getData') }}",
                    type: 'GET',
                },
                columns: [{
                        data: 'name',
                        name: 'name',
                        orderable: false,
                        searchable: true
                    },
                    {
                        data: 'email',
                        name: 'email',
                        orderable: false,
                        searchable: true
                    },
                    {
                        data: 'phone',
                        name: 'phone',
                        orderable: false,
                        searchable: true
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: true
                    },
                ]
            });

            $(document).on('click', '.edit-btn', function() {
                var id = $(this).data('row-id');
                $.ajax({
                    type: "post",
                    url: "/test/edit/" + id,
                    data: {
                        _token: "{!! csrf_token() !!}"
                    },
                    success: function(response) {
                        $('#editName').val(response.data.name);
                        $('#editEmail').val(response.data.email);
                        $('#editPhone').val(response.data.phone);
                        $('#editForm').attr('action', '/test/' + id);
                        $('#editProfileModal').modal('show');
                    },
                    error: function(error) {
                        console.log(error);
                        alert('Error occurred while fetching data.');
                    }
                });
            });


            $('#editForm').submit(function(e) {
                e.preventDefault();
                var id = $(this).attr('action').split('/').pop();
                $.ajax({
                    type: "PUT",
                    url: "/test/update/" + id,
                    data: $(this).serialize(),
                    success: function(response) {
                        console.log(response);
                        $('#getdata').DataTable().ajax.reload();
                        $('#editProfileModal').modal('hide');
                        alert('Data Updated successfully!');
                    },
                    error: function(error) {
                        console.log(error);
                        alert('Error occurred while submitting data.');
                    }
                });
            });



            $(document).on('click', '.delete-btn', function(e) {
                var deleteBtn = $(this);
                var id = deleteBtn.data('row-id');
                var r = confirm("Are you sure to delete this?");
                if (!r) {
                    return false;
                }
                $.ajax({
                    type: "post",
                    url: "/test/" + id,
                    data: {
                        _token: "{!! csrf_token() !!}"
                    },
                    success: function(resp) {
                        if (resp.success) {
                            $('#getdata').DataTable().ajax.reload();
                            $('.alert-success .msg-content').html(resp.message);
                            $('.alert-success').show();
                        } else {
                            $('.alert-danger .msg-content').html(resp.message);
                            $('.alert-danger').show();
                        }
                        deleteBtn.attr('disabled', false);
                        table.draw();
                    },
                    error: function(e) {
                        alert('Error: ' + e);
                        deleteBtn.attr('disabled', false);
                    }
                });
            });

        });
    </script>

@endsection
