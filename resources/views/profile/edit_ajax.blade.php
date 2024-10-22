@empty($user)
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Error</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger">
                    <h5><i class="icon fas fa-ban"></i> Error!!!</h5>
                    User data not found.
                </div>
                <a href="{{ url('/profile') }}" class="btn btn-warning">Back</a>
            </div>
        </div>
    </div>
@else
    <form action="{{ url('/profile/update_ajax') }}" method="POST" id="form-edit">
        @csrf
        <div id="modal-master" class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" value="{{ $user->username }}" required>
                        <small id="error-username" class="error-text form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" value="{{ $user->nama }}" required>
                        <small id="error-nama" class="error-text form-text text-danger"></small>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input value="" type="password" name="password" id="password" class="form-control">
                        <small class="form-text text-muted">Hiraukan apabila passeord tidak ganti</small>
                        <small id="error-password" class="error-text form-text text-danger"></small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-warning">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </form>

    <script>
        $(document).ready(function() {
            $("#form-edit").validate({
                rules: {
                    username: {
                        required: true,
                        minlength: 3,
                        maxlength: 50
                    },
                    nama: {
                        required: true,
                        minlength: 3,
                        maxlength: 100
                    },
                    password: {
                        minlength: 6
                    }
                },
                submitHandler: function(form) {
                    var formData = new FormData(form);
                    $.ajax({
                        url: form.action,
                        type: form.method,
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            if (response.status) {
                                $('#modal-master').modal('hide');
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: response.message
                                });
                                location.reload();
                            } else {
                                $('.error-text').text('');
                                $.each(response.msgField, function(prefix, val) {
                                    $('#error-' + prefix).text(val[0]);
                                });
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: response.message
                                });
                            }
                        }
                    });
                    return false;
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endempty