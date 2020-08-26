@extends('layouts.master')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Kategori</h4>
                    </div>

                    <div class="card-body">
                        <form method='POST' action='/category'>
                            @csrf
                            <div class="form-group">
                                <label for="formGroupExampleInput">Nama:</label>
                                <input type="text" name='name' class="form-control" id="formGroupExampleInput">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Deskripsi:</label>
                                <textarea type="text" name='description' class="form-control" rows="5"
                                    id="formGroupExampleInput"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <!-- <a href="/daftar" class="btn btn-info" role="button">Submit</a> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection