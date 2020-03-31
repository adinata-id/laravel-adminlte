@extends('layouts.app2')
@section('styles')
<!-- DataTables -->
<link rel="stylesheet" href="{{url('AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">


@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Halaman Product</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Products </li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Produk</h3>
                        </div>    
                    <div class="card-body">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap" id="table-product">
                                <thead>
                                <tr>
                                    <th> Nama Produk </th>
                                    <th> Satuan </th>
                                    <th> Harga Beli </th>
                                    <th> Harga Jual </th>
                                    <th> Create At </th>

                                </tr>
                                </thead>
                                <div class="panel-body">
                                    <label for="name"> Filter Berdasarkan Nama Product: </label>
                                    <input type="text" name="name" class="form-control col-sm-4 filter-name" placeholder="Filter Berdasarkan Nama Product">
                                    
                                    <label for="filter-satuan"> Filter Berdasarkan Satuan : </label>
                                    
                                    <select data-column="1" class="form-control col-sm-4 filter-satuan" placeholder="Filter Berdasarkan Satuan Product">
                                        <option value=""> Pilih Satuan Product </option>
                                        <option value="kg"> KG </option>
                                        <option value="ton"> TON </option>
                                    </select>

                                    <label for="filter-periode"> Filter Berdasarkan Periode : </label>

                                    <select name="filter_periode" id="filter_periode" class="form-control">
                                        <option value=""> Pilih Periode </option>
                                        <option value="7"> 7 Hari Terakhir </option>
                                        <option value="14"> 14 Hari Terakhir </option>
                                        <option value="21"> 21 Hari Terakhir </option>
                                        <option value="31"> 31 Hari Terakhir </option>
                                        <option value="365"> 365 Hari Terakhir </option>
                                    </select>
                                    <br /> <br />
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('javascripts')
<!-- DataTables -->
<script src="{{url('AdminLTE/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{url('AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"> </script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.colVis.min.js"> </script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"> </script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"> </script>


<script> 
    $(document).ready(function(){
        var table = $('#table-product').DataTable({
        pageLength: 10,
        processing: true,
        serverSide: true,
        dom: '<"html5buttons">Blfrtip',
        language: {
                buttons: {
                    colvis : 'show / hide', // label button show / hide
                    colvisRestore: "Reset Kolom" //lael untuk reset kolom ke default
                }
        },
        
        buttons : [
                    {extend: 'colvis', postfixButtons: [ 'colvisRestore' ] },
                    {extend:'csv'},
                    {extend: 'pdf', title:'Contoh File PDF Datatables'},
                    {extend: 'excel', title: 'Contoh File Excel Datatables'},
                    {extend:'print',title: 'Contoh Print Datatables'},
        ],
        ajax: {
            "url"  : "{{ route ('api.product') }}", 
            "data" : function (d) {
                    d.filter_periode = $('#filter_periode').val();
            }
        },
        columns: [
            {"data":"name"},
            {"data":"satuan"},
            {"data":"buy_price"},
            {"data":"sell_price"},
            {"data":"created_at"},
        ],
        columnDefs : [{
            render : function (data,type,row){
                return data + ' - ( ' + row['satuan'] + ')'; 
            },
            "targets" : 0
            },
            {"visible": false, "targets" : 1}
        ],

        });
        
    //filter berdasarkan Nama Product
    $('.filter-name').keyup(function () {
        table.column( $(this).data('column'))
        .search( $(this).val() )
        .draw();
    });

    //filter Berdasarkan satuan product
    $('.filter-satuan').change(function () {
        table.column( $(this).data('column'))
        .search( $(this).val() )
        .draw();
    });

    //filter Berdasarkan periode
    $('#filter_periode').change(function () {
        table.draw();
    });


    });
</script>

@endsection