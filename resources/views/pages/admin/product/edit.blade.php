@extends('layouts.master')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Produk</h4>
                    </div>

                    <div class="card-body">
                        <form method='POST' action='/product/{{$data_product->id}}' enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="formGroupExampleInput">Kode:</label>
                                <input type="text" name='code' class="form-control" id="formGroupExampleInput" value={{ $data_product->code }}>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Categori:</label>
                                <select name="category_id" class="form-control">
                                    @foreach($categories as $key=>$value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Nama:</label>
                                <input type="text" name='name' class="form-control" id="formGroupExampleInput" value={{ $data_product->name }} >
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Deskripsi:</label>
                                <textarea type="text" name='description' class="form-control" rows="5"
                                    id="formGroupExampleInput">{{ $data_product->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Harga:</label>
                                <input type="number" name='price' class="form-control" id="formGroupExampleInput"  value={{ $data_product->price }}>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Jumlah Stok:</label>
                                <input type="number" name='quantity' class="form-control" id="formGroupExampleInput"  value={{ $data_product->quantity }}>
                            </div>
                            <div class="form-group">
                                <label for="image">Upload Gambar:</label>
                                <input type="file" name='image' class="form-control" id="image">
                                <span class="text-danger">{{$errors->first('image')}}</span>
                                @if($data_product->image!='')
                                    &nbsp;&nbsp;&nbsp;
                                    <img src="{{url('products/small/',$data_product->image)}}" width="35" alt="">
                                @endif
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