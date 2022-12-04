@extends('admin.master')

@section('title', @trans('admin.label_create_categories'))

@section('content')
    <div class="mdc-layout-grid">
        <div class="mdc-layout-grid__inner">
            <div class="mdc-layout-grid__cell--span-12">
                <div class="mdc-card">
                    <h6 class="card-title">Text Field</h6>
                    <div class="template-demo">
                        {{-- mdc-layout-grid__inner --}}
                        <div class="">
                            <form  method="post" action="{{ route('admin.categories.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                                    <div class="mdc-text-field">
                                        <input class="mdc-text-field__input" id="text-field-hero-input"  name="name" value="{{ old('name') }}"> 
                                        <div class="mdc-line-ripple">Name</div>
                                        <label for="text-field-hero-input" class="mdc-floating-label">Name</label>
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                                    <div class="mdc-text-field">
                                        <input class="mdc-text-field__input" id="text-field-hero-input" name="description" value="{{ old('description') }}">
                                        <div class="mdc-line-ripple">Description</div>
                                        <label for="text-field-hero-input"  class="mdc-floating-label">Description</label>
                                        @if ($errors->has('description'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <button class="mt-4 mdc-button mdc-button--raised filled-button--success" type="submit">
                                    Submit
                                  </button>
                                <button class="mt-4 mdc-button mdc-button--raised filled-button--secondary">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
