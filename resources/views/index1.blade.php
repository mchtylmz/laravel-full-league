@extends('layouts.app')

@section('content')
    <div class="container">


        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('home2') }}" method="post" enctype="multipart/form-data">
            @csrf

            <input type="email" name="email" class="form-control" placeholder="email">
            <input type="file" name="file" class="form-control">

            <button type="submit" class="btn btn-primary">KAYDET</button>
        </form>
    </div>


    <div class="row">
        @foreach($images as $image)
            <div class="col-lg-3">
                <div class="card">
                    <img src="{{ $image->thumbnail->url }}" class="w-100" />
                </div>
            </div>
        @endforeach
    </div>

@endsection
