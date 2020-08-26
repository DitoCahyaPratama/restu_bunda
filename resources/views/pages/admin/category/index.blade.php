@extends('layouts.master')

@push('style')
<link rel="stylesheet" href="{{ asset('/sbadmin2/vendor/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('/sbadmin2/vendor/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if ($message = Session::get('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Yes!</strong> {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>List Kategori</h4>
                    </div>
                    <div class="card-body">
                        <div><a href="/category/create" class="btn btn-primary" role="button">Tambah</a></div>
                        <br />
                        <table id="example1" class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col" class="text-center">Nama</th>
                                    <th scope="col" class="text-center">Deskripsi</th>
                                    <th scope="col" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0;?>
                                @foreach($data as $data)
                                    <?php $no++ ;?>
                                    <tr>
                                        <td class="text-center">{{ $no }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->description }}</td>
                                        <td class="text-center">
                                                <a href="/category/{{ $data->id }}/edit"><button class="btn btn-warning">Update</button></a>
                                                <form action="/category/{{$data->id}}" method="post" style="display: inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">delete</button></a>
                                                </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="{{ asset('/sbadmin2/vendor/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('/sbadmin2/vendor/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script>
    $(function () {
      $("#example1").DataTable();
    });
  </script>
@endpush