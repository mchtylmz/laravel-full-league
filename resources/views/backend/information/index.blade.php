@extends('backend.layouts.app')

@section('content')
    <div class="mb-3 pb-3">
        @foreach(collect($types)->groupBy('group')->sortKeysDesc() as $group => $types)
            <div class="row mb-3">
                <div class="col-lg-12">
                    <h4 class="bg-body-light border p-3 mb-2">{{ __('group.'.$group) }}</h4>
                </div>
                @foreach($types as $type)
                    <div class="col-lg-6">
                        <!-- block -->
                        <div class="block block-rounded mb-1">
                            <div class="block-header block-header-default bg-white border py-3 mb-2">
                                <h3 class="block-title text-normal">{{ $type->name }}</h3>
                                <div class="block-options">
                                    <a type="button"
                                       href="{{ route('admin.information.form', $type->id) }}"
                                       class="btn btn-sm btn-alt-warning">
                                        <i class="fa fa-fw fa-pen mx-1"></i> {{ __('Ekle / Düzenle') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- block -->
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection
