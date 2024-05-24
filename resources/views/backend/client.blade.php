    @extends('backend.layouts.main')
    @section('title', 'CLIENTS')
    @section('content')
        {{-- @dd($client) --}}
        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="row">
                <!-- Modal -->
                <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="profileModalLabel">Add Client</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{!! route('client.store') !!}" method="POST" id="myform"
                                    enctype='multipart/form-data'>
                                    @csrf
                                    {{-- //ADD CLIENT BASIC DETAILS --}}
                                    <div class="mb-3">
                                        <label for="fullname" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="name">
                                    </div>

                                    <div class="mb-3">
                                        <label for="fullname" class="form-label">Avtar</label>
                                        <input type="file" class="form-control" name="avtar" placeholder="name">
                                    </div>


                                    <div class="mb-3">
                                        <label for="department" class="form-label">Department</label>
                                        <select class="form-select" name="department" id="department">
                                            <option value="" disabled selected>Select Department</option>
                                            <option value="backend">Backend</option>
                                            <option value="frontend">Frontend</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="designation" class="form-label">Designation</label>
                                        <select class="form-select" name="designation" id="designation">
                                            <option value="" disabled selected>Select Designation</option>
                                            <option value="backend developer">Backend Developer</option>
                                            <option value="frontend developer">Frontend Developer</option>
                                            <option value="manager">Manager</option>
                                            <option value="designer">Designer</option>
                                        </select>
                                    </div>
                                    {{-- //ADD CLIENT SALARY DETAILS --}}

                                    <div class="mb-3">
                                        <label for="salary" class="form-label">Salary</label>
                                        <input type="text" class="form-control" name="salary" placeholder="salary">
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- EDIT Modal -->
                <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="profileModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="profileModalLabel">Edit Client</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" id="editForm" enctype='multipart/form-data'>
                                    @csrf
                                    @method('PUT')
                                    {{-- Hidden input field to hold the client ID --}}
                                    <input type="hidden" id="clientId" name="clientId" value="">

                                    {{-- //ADD CLIENT BASIC DETAILS --}}
                                    <div class="mb-3">
                                        <label for="fullname" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="editName" value=""
                                            name="name" placeholder="name">
                                    </div>
                                    <div class="mb-3">
                                        <img src="" id="edit_image" alt="Avatar Preview"
                                            style='border="2" width="20"'>
                                    </div>

                                    <div class="mb-3">
                                        <label for="fullname" class="form-label">Avtar</label>
                                        <input type="file" class="form-control" name="avtar" placeholder="name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="department" class="form-label">Department</label>
                                        <select class="form-select" name="department" id="editdepartment">
                                            <option value="" disabled selected>Select Department</option>
                                            <option value="backend">Backend</option>
                                            <option value="frontend">Frontend</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="designation" class="form-label">Designation</label>
                                        <select class="form-select" name="designation" id="editdesignation">
                                            <option value="" disabled selected>Select Designation</option>
                                            <option value="backend developer">Backend Developer</option>
                                            <option value="frontend developer">Frontend Developer</option>
                                            <option value="manager">Manager</option>
                                            <option value="designer">Designer</option>
                                        </select>
                                    </div>
                                    {{-- //ADD CLIENT SALARY DETAILS --}}

                                    <div class="mb-3">
                                        <label for="salary" class="form-label">Salary</label>
                                        <input type="text" class="form-control" id="editsalary" name="salary"
                                            placeholder="salary">
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- End Modal -->
                <!-- Basic with Icons -->
                <div class="col-xxl">
                    <div class="card mb-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0"> Client</h5>
                            <small class="text-muted float-end">Merged input group</small>
                        </div>
                        <div class="card-body">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#profileModal">Add Client</button>
                            <table class="table" id="getClient">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Avtar</th>
                                        <th>designation</th>
                                        <th>salary</th>
                                        <th>da</th>
                                        <th>hra</th>
                                        <th>pf</th>
                                        <th>net_salary</th>
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
                $('#getClient').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('Getclintdata') }}",
                        type: 'GET',
                    },
                    columns: [{
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'avtar',
                            name: 'avtar',
                            render: function(data, type, full, meta) {
                                return data;
                            }
                        },
                        {
                            data: 'designation',
                            name: 'designation'
                        },
                        {
                            data: 'salary',
                            name: 'salary'
                        },
                        {
                            data: 'da',
                            name: 'da'
                        },
                        {
                            data: 'hra',
                            name: 'hra'
                        },
                        {
                            data: 'pf',
                            name: 'pf'
                        },
                        {
                            data: 'net_salary',
                            name: 'net_salary'
                        },
                        {
                            data: 'action',
                            name: 'action'
                        }

                    ]
                });

                $("#getClient").on('click', '.delete-btn', function() {
                    var deleteBtn = $(this);
                    var id = deleteBtn.data('row-id');
                    var r = confirm("Are you sure to delete this?");
                    if (!r) {
                        return false;
                    }
                    $.ajax({
                        type: "DELETE",
                        url: "client/delete/" + id,
                        data: {
                            _token: "{!! csrf_token() !!}"
                        },
                        dataType: 'json',
                        beforeSend: function() {
                            deleteBtn.attr('disabled', true);
                            $('.alert .msg-content').html('');
                            $('.alert').hide();
                        },
                        success: function(resp) {
                            if (resp.success) {
                                $('#getClient').DataTable().ajax.reload();
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

                $(document).on('click', '.edit-btn', function() {
                    var id = $(this).data('row-id');
                    $.ajax({
                        type: "post",
                        url: "/client/edit/" + id,
                        data: {
                            _token: "{!! csrf_token() !!}"
                        },
                        success: function(response) {
                            var clientData = response.data.client;
                            var clientSalaryData = response.data.clientSalary;

                            $('#editName').val(clientData.name);
                            $('#editdepartment').val(clientData.department);
                            $('#editdesignation').val(clientData.designation);
                            $('#editsalary').val(clientSalaryData.salary);
                            $("#edit_image").attr('src', 'backend/avtar/' + clientData.avtar);
                            $('#editForm').attr('action', "{{ url('/client/update') }}/" + id);
                            $('#clientId').val(id);
                            $('#editProfileModal').modal('show');
                        },
                        error: function(error) {
                            console.log(error);
                            alert('Error occurred while fetching data.');
                        }
                    });
                });




            });
        </script>
    @endsection
