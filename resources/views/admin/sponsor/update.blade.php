@extends('admin.layout.app')

@section('title', __('sponsor.update'))

@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ __('sponsor.update') }} - #{{ $sponsor->id }} {{ $sponsor->description }}</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('admin.sponsors.update', $sponsor->id) }}" method="POST" data-toggle="ajax">
                    @csrf
                    @include('components.forms.sponsor', ['sponsor' => $sponsor])
                    <div class="mb-3 text-center">
                        <button type="submit" class="btn btn-alt-primary px-5">
                            <i class="fa fa-save fw-bold mx-2"></i> {{ __('sponsor.form.create_submit') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
