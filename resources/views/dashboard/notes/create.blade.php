
@extends('layouts.master')



@section('css')
@endsection

@section('pagename')
اضافة ملاحظه
@endsection

@section('title_page1')
Digital
@endsection


@section('content')
<div class="page-body">
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="page-header-left">
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    

                    <div class="card-body">

                        <div class="card-body">
                            @if ($errors->any())
                            @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">
                                <ul>
                                        <li>{{ $error }}</li>
                                    </ul>
                                </div>
                                @endforeach
                        @endif
                        <div class="table-responsive table-desi">

                            <form action="{{route('dashboard.notes.store')}}" method="POST" enctype="multipart/form-data">
                                <div class="form">
                                    @csrf
                                  
                                    <div class="form-group mb-0">
                                        <label for="validationCustom02" class="mb-1">الملحوظه :</label>
                                        <input class="form-control dropify" id="validationCustom02" type="file"
                                            name="notre" 
                                            >
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