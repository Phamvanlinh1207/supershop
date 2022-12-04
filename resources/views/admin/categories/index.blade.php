@extends('admin.master')

@section('title', @trans('admin.label_all_categories'))

@section('content')
    <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
        <div class="mdc-card p-0">
            <h6 class="card-title card-padding pb-0">Hoverable Table</h6>
            <div class="table-responsive">
                <table class="table table-hoverable">
                    <thead>
                        <tr>
                            <th class="text-left">id</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th></th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categoryList as $cat)
                            <tr>
                                <td class="text-left">{{ $cat->id }}</td>
                                <td>{{ $cat->name }}</td>
                                <td>{{ $cat->description }}</td>
                                <td></td>
                                <td><button class="mdc-button mdc-button--raised icon-button filled-button--success">
                                        <a href="{{ route('admin.categories.edit', $cat->id) }}"><i
                                                class="material-icons mdc-button__icon">colorize</i></a>
                                    </button></td>
                                <td>
                                    <form method="post" action="{{ route('admin.categories.destroy', $cat->id) }}">
                                        @method('delete')
                                        @csrf
                                        <button type="submit"
                                            class="mdc-button mdc-button--raised icon-button filled-button--secondary">
                                            <i class="material-icons mdc-button__icon">delete</i>
                                    </form>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
