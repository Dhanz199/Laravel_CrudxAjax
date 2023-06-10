<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel 9 Datatable Crud x Ajax</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <h1 class="text-center">Laravel 9 Datatable Crud x Ajax</h1>
                <hr>
            </div>

        </div>
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text btn btn-primary text-white" id="basic-addon1"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" id="start_date" placeholder="Start Date" readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text btn btn-primary text-white" id="basic-addon1"><i class="fas fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" class="form-control" id="end_date" placeholder="End Date" readonly>
                        </div>
                    </div>
                </div>
                <div>
                    <button id="filter" class="btn btn-primary">Filter</button>
                    <button id="reset" class="btn btn-warning">Reset</button>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-12 mt-5">
                <div class="mb-3">
                    <a class="btn btn-primary tombol-add">+ Add Data Barang</a>
                </div>
                <div class="table-responsive">
                    <div class="alert alert-success d-none"></div>

                    <table class="display" id="records" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>No RFQ</th>
                                <th>Tanggal</th>
                                <th>Description</th>
                                <th>Harga Pokok</th>
                                <th>Nama toko</th>
                                <th>Contact Person</th>
                                <th>Alamat Toko</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Data Barang</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger d-none"></div>
                    <div class="alert alert-success d-none"></div>
                    <div class="mb-3 mt-3">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">No RFQ</label>
                            <input type="text" class="form-control" name="no_rfq" id="no_rfq" placeholder="No RFQ...">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal...">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="4" placeholder="Description RFQ..."></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Harga Pokok</label>
                            <input type="number" class="form-control" name="harga_pokok" id="harga_pokok" placeholder="Harga Pokok RFQ...">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Nama Toko</label>
                            <input type="text" class="form-control" name="nama_toko" id="nama_toko" placeholder="Nama Toko...">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Contact Person</label>
                            <input type="text" class="form-control" name="contact_person" id="contact_person" placeholder="Contact Person...">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Alamat Toko</label>
                            <textarea class="form-control" name="alamat_toko" id="alamat_toko" rows="4" placeholder="Alamat Toko..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary tombol-save">Save</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Datepicker -->
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <!-- Datatables -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <!-- Momentjs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(function() {
            $("#start_date").datepicker({
                "dateFormat": "dd-mm-yy"
            });
            $("#end_date").datepicker({
                "dateFormat": "dd-mm-yy"
            });
        });

        // Fetch records
        function fetch(start_date, end_date) {
            $.ajax({
                url: "{{ route('barang/records') }}",
                type: "GET",
                data: {
                    start_date: start_date,
                    end_date: end_date
                },
                dataType: "json",
                success: function(data) {
                    // Datatables
                    var i = 1;
                    $('#records').DataTable({
                        "data": data.barangs,
                        // responsive
                        "responsive": true,
                        "columns": [{
                                "data": "id",
                                "render": function(data, type, row, meta) {
                                    return i++;
                                }
                            },
                            {
                                "data": "no_rfq",
                            },
                            {
                                "data": "tanggal",
                                "render": function(data, type, row, meta) {
                                    return moment(row.tanggal).format('DD-MM-YYYY');
                                }
                            },
                            {
                                "data": "description",
                            },
                            {
                                "data": "harga_pokok",
                                "render": $.fn.dataTable.render.number(',', '.', 2, 'Rp. ')
                            },
                            {
                                "data": "nama_toko",
                                "render": function(data, type, row, meta) {
                                    return `${row.nama_toko}`;
                                }
                            },
                            {
                                "data": "contact_person",
                                "render": function(data, type, row, meta) {
                                    return `${row.contact_person}`;
                                }
                            },
                            {
                                "data": "alamat_toko",
                                "render": function(data, type, row, meta) {
                                    return `${row.alamat_toko}`;
                                }
                            },
                            {
                                "data": "action",
                                "render": function(data, type, row, meta) {
                                    return `<a data-id=${row.id} class="btn btn-warning tombol-edit mb-3">Edit</a> <a data-id=${row.id} class="btn btn-danger tombol-delete">Delete</a>`;
                                }
                            },

                        ]
                    });
                }
            });
        }
        fetch();
        // Filter
        $(document).on("click", "#filter", function(e) {
            e.preventDefault();
            var start_date = $("#start_date").val();
            var end_date = $("#end_date").val();
            if (start_date == "" || end_date == "") {
                alert("Pilih Tanggal Terlebih Dahulu");
            } else {
                $('#records').DataTable().destroy();
                fetch(start_date, end_date);
            }
        });
        // Reset
        $(document).on("click", "#reset", function(e) {
            e.preventDefault();
            $("#start_date").val(''); // empty value
            $("#end_date").val('');
            $('#records').DataTable().destroy();
            fetch();
        });
    </script>
    <script>
        // Global Setup
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Proses Simpan
        $('body').on('click', '.tombol-add', function(e) {
            e.preventDefault();
            $('#exampleModal').modal('show');

            $('.tombol-save').click(function() {
                simpan();
            });
        });

        // Fungsi Simpan dan Update
        function simpan(id = '') {
            if (id == '') {
                var id_saya = "{{ url('barang/store') }}"
                var type_saya = "POST"
            } else {
                var id_saya = 'barang/update/' + id;
                var type_saya = "PUT"
            }
            $.ajax({
                url: id_saya,
                type: type_saya,
                data: {
                    no_rfq: $('#no_rfq').val(),
                    tanggal: $('#tanggal').val(),
                    description: $('#description').val(),
                    harga_pokok: $('#harga_pokok').val(),
                    nama_toko: $('#nama_toko').val(),
                    contact_person: $('#contact_person').val(),
                    alamat_toko: $('#alamat_toko').val(),
                },
                success: function(response) {
                    if (response.errors) {
                        $('.alert-danger').removeClass('d-none');
                        $('.alert-danger').append("<ul>");

                        $.each(response.errors, function(key, value) {
                            $('.alert-danger').find('ul').append("<li>" + value + "</li>");
                        });
                        $('.alert-danger').append("</ul>");
                    } else {
                        $('.alert-success').removeClass('d-none');
                        $('.alert-success').html(response.success);
                        setTimeout(function() { // wait for 5 secs(2)
                            location.reload(); // then reload the page.(3)
                        }, 1500);
                    }
                }
            });
        }

        // Proses Edit
        $('body').on('click', '.tombol-edit', function(e) {
            var id = $(this).data('id');
            // alert('id berapa ini? ' + id);
            $.ajax({
                url: 'barang/edit/' + id,
                type: "GET",
                success: function(response) {
                    $('#exampleModal').modal('show');
                    $('#no_rfq').val(response.result.no_rfq);
                    $('#tanggal').val(response.result.tanggal);
                    $('#description').val(response.result.description);
                    $('#harga_pokok').val(response.result.harga_pokok);
                    $('#nama_toko').val(response.result.nama_toko);
                    $('#contact_person').val(response.result.contact_person);
                    $('#alamat_toko').val(response.result.alamat_toko);
                    $('.tombol-save').click(function() {
                        simpan(id);
                    });
                }
            });
        });

        // Proses Delete
        $('body').on('click', '.tombol-delete', function(e) {
            var id = $(this).data('id');
            Swal.fire({
                title: 'Yakin Mau Hapus Data ini ?',
                text: "Setelah dihapus tidak bisa dipulihkan kembali",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya, Hapus!'
            }).then((willDelete) => {
                if (willDelete.isConfirmed) {
                    var data = {
                        "_token": $('input[name=_token]').val(),
                        "id": id,
                    };
                    $.ajax({
                        url: 'barang/' + id,
                        type: "DELETE",
                        data: data,
                        success: function(response) {
                            Swal.fire(
                                    'Deleted!',
                                    'Data Barang Berhasil di Hapus.',
                                    'success'
                                )
                                .then((result) => {
                                    location.reload();
                                });
                        }
                    });
                }
            });
            // if (confirm('Yakin mau Hapus data ini ?') == true) {

            // $.ajax({
            //     url: 'barang/' + id,
            //     type: "DELETE",
            // });
            // location.reload();

        });
    </script>
</body>

</html>