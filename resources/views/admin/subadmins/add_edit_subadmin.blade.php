@extends('admin.layout.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ $title }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">{{ $title }}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">{{ $title }}</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                    @if(Session::has('error_message'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>Error:</strong> {{ Session::get('error_message') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                <form name="subadminForm" id="subadminForm" enctype="multipart/form-data" @if(empty($subadminData['id'])) action="{{ url('admin/add-edit-subadmin') }}" @else action="{{ url('admin/add-edit-subadmin/'.$subadminData['id']) }}" @endif method="post" >
                                    @csrf
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input @if($subadminData['id'] !="") disabled style="background-color: #666666" @else required @endif type="email"  class="form-control" id="email" name="email" rows="3" placeholder="Enter Email" @if(!empty($subadminData['email'])) value="{{ $subadminData['email'] }}" @endif>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" rows="3" placeholder="Enter Password" @if(!empty($subadminData['password'])) value="{{ $subadminData['password'] }}" @endif>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Name*</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" @if(!empty($subadminData['name'])) value="{{ $subadminData['name'] }}" @else value="{{ old('name') }}" @endif>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="mobile">Mobile*</label>
                                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile" @if(!empty($subadminData['mobile'])) value="{{ $subadminData['mobile'] }}" @endif>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="image">Photo</label>
                                        <input type="file" class="form-control" id="image" name="image">
                                        @if(!empty($subadminData['image']))
                                            <a target="_blank" href="{{ url('admin/images/photos/'.$subadminData['image']) }}">View Photo</a>
                                            <input type="hidden" name="current_image" value="{{ $subadminData['image'] }}">
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
                        the plugin.
                    </div>
                </div>
                <!-- /.card -->

                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">

                </div>
                <!-- /.card -->

            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
