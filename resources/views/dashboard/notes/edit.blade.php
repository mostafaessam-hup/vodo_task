@extends('layouts.master')

@section('css')
@endsection

@section('content')

<div class="page-body">

    <!-- Container-fluid Ends-->

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">

                        <div class="card-body">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="table-responsive table-desi">

                                <form class="needs-validation"
                                    action="{{route('dashboard.note.update',$note->id)}}" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="form">
                                        @csrf
                                        @method('put')
                                    <div class="form-group mb-0">
                                        <label for="validationCustom02" class="mb-1">الملحوظه :</label>
                                        <input class="form-control dropify" id="validationCustom02" type="file"
                                            name="note" data-default-file="({{$note->note}})">
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

</div>
@endsection

@section('scripts')
@endsection