@extends('backend.layouts.main')
@section('title', 'MT : : Admin Profile')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <!-- Basic with Icons -->
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Admin Profile</h5>
                        <small class="text-muted float-end">Merged input group</small>
                    </div>
                    <div class="card-body">
                        <table class="table" id="employeetable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
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
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#employeetable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('employee.getdata') }}',
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    }, {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: true
                    }
                ]
            });

            $(document).on('click', '.delete-btn', function(e) {
                var deleteBtn = $(this);
                var id = deleteBtn.data('row-id');
                var r = confirm('Are you sure you want to delete?');
                if (!r) {
                    return false;
                }
                $.ajax({
                    type: "POST",
                    url: "/employee-delete/" + id,
                    data: {
                        _token: "{{ csrf_token() }}",
                        _method: "DELETE"
                    },
                    success: function(resp) {
                        if (resp.success) {
                            $('#employeetable').DataTable().ajax.reload();
                            $('.alert-success .msg-content').html(resp.message);
                            $('.alert-success').show();
                        } else {
                            $('.alert-danger .msg-content').html(resp.message);
                            $('.alert-danger').show();
                        }
                        deleteBtn.attr('disabled', false);
                    },
                    error: function(xhr, status, error) {
                        alert('Error: ' + error);
                        deleteBtn.attr('disabled', false);
                    }
                });
            });

            $("#employeetable").on('click', '.edit-btn', function() {
                var editBtn = $(this);
                var id = editBtn.data('row-id'); // Change to data('row-id')
                window.location.href = "/employee-edit/" + id;
            });


        });
    </script>
@endsection
