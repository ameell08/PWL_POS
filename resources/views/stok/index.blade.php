@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar stok</h3>
                <div class="card-tools">
                    <button onclick="modalAction('{{ url('/stok/import') }}')" class="btn btn-sm btn-info mt-1">Import
                        Stok</button>
                    <a class="btn btn-sm btn-primary mt-1" href="{{ url('/stok/export_excel') }}" class="btn btn-primary"><i
                            class="fa fa-file-excel"></i> Export Stok</a>
                    <a class="btn btn-sm btn-warning mt-1" href="{{ url('/stok/export_pdf') }}" class="btn btn-warning"><i
                            class="fa fa-file-pdf"></i> Export Stok</a>
                    <button onclick="modalAction('{{ url('stok/create_ajax') }}')"
                        class="btn btn-sm btn-success mt-1">Tambah Ajax</button>
                </div>
            </div>
            <div class="card-body">
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                </div>
                <table class="table table-bordered table-sm table-striped table-hover" id="table-stok">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Supplier</th>
                            <th>Barang</th>
                            <th>User</th>
                            <th>Stok Tanggal</th>
                            <th>Stok Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
        <div id="myModal" class="modal fade animate shake" tabindex="-1" data-backdrop="static" data-keyboard="false"
            data-width="75%"></div>
    @endsection

    @push('css')
    @endpush

    @push('js')
        <script>
            function modalAction(url = '') {
                $('#myModal').load(url, function() {
                    $('#myModal').modal('show');
                });
            }

            var tableStok;
            $(document).ready(function() {
                tableStok = $('#table-stok').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        "url": "{{ url('stok/list') }}",
                        "dataType": "json",
                        "type": "POST",
                        "data": function(d) {
                            d.filter_kategori = $('.filter_kategori').val();
                        }
                    },
                    columns: [{
                        // nomor urut dari laravel datatable addIndexColumn() 
                        data: "DT_RowIndex",
                        className: "text-center",
                        orderable: false,
                        searchable: false
                    }, {
                        data: "supplier.supplier_nama",
                        className: "",
                        width: "30%",
                        orderable: true,
                        searchable: true
                    }, {
                        data: "barang.barang_nama",
                        className: "",
                        width: "20%",
                        orderable: true,
                        searchable: true,
                    }, {
                        data: "user.nama",
                        className: "",
                        width: "10%",
                        orderable: true,
                        searchable: true,
                    }, {
                        data: "stok_tanggal",
                        className: "",
                        width: "10%",
                        orderable: true,
                        searchable: false,
                        render: function(data, type, row) {
                            if (data) {
                                var date = new Date(data);
                                var year = date.getFullYear();
                                var month = ("0" + (date.getMonth() + 1)).slice(-
                                    2); // Add leading zero
                                var day = ("0" + date.getDate()).slice(-2); // Add leading zero
                                return year + "-" + month + "-" + day; // Format as YYYY-MM-DD
                            }
                            return data; // Return original value if no data
                        }
                    }, {
                        data: "stok_jumlah",
                        className: "",
                        width: "10%",
                        orderable: true,
                        searchable: false
                    }, {
                        data: "aksi",
                        className: "text-center",
                        width: "14%",
                        orderable: false,
                        searchable: false
                    }]
                });

                $('#table-stok_filter input').unbind().bind().on('keyup', function(e) {
                    if (e.keyCode == 13) { // enter key 
                        tableStok.search(this.value).draw();
                    }
                });

                $('.filter_kategori').change(function() {
                    tableStok.draw();
                });
            });
        </script>
    @endpush
