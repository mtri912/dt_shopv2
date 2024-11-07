@extends('admin.layout.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Subadmins</h1>
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
                                    @if(Session::has('success_message'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>Success:</strong> {{ Session::get('success_message') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                <form name="subadminForm" id="subadminForm"    action="{{ url('admin/update-role/'.$id) }}"  method="post" >
                                    @csrf
                                    <input type="hidden" name="subadmin_id" value="{{ $id }}">
                                    @if(!empty($subadminRoles))
                                        @foreach($subadminRoles as $role)
                                            @if($role['module'] == "cms_pages")
                                                @if($role['view_access'] == 1)
                                                    @php $viewCMSPages = "checked" @endphp
                                                @else
                                                    @php $viewCMSPages = "" @endphp
                                                @endif
                                                @if($role['edit_access'] == 1)
                                                    @php $editCMSPages = "checked" @endphp
                                                    @else
                                                        @php $editCMSPages = "" @endphp
                                                @endif
                                                    @if($role['full_access'] == 1)
                                                        @php $fullCMSPages = "checked" @endphp
                                                    @else
                                                        @php $fullCMSPages = "" @endphp
                                                    @endif
                                            @endif
                                            @if($role['module'] == "categories")
                                                    @if($role['view_access'] == 1)
                                                        @php $viewCategories = "checked" @endphp
                                                    @else
                                                        @php $viewCategories = "" @endphp
                                                    @endif
                                                    @if($role['edit_access'] == 1)
                                                        @php $editCategories = "checked" @endphp
                                                    @else
                                                        @php $editCategories = "" @endphp
                                                    @endif
                                                    @if($role['full_access'] == 1)
                                                        @php $fullCategories = "checked" @endphp
                                                    @else
                                                        @php $fullCategories = "" @endphp
                                                    @endif
                                                @endif
                                                @if($role['module'] == "brands")
                                                    @if($role['view_access'] == 1)
                                                        @php $viewBrands = "checked" @endphp
                                                    @else
                                                        @php $viewBrands = "" @endphp
                                                    @endif
                                                    @if($role['edit_access'] == 1)
                                                        @php $editBrands = "checked" @endphp
                                                    @else
                                                        @php $editBrands = "" @endphp
                                                    @endif
                                                    @if($role['full_access'] == 1)
                                                        @php $fullBrands = "checked" @endphp
                                                    @else
                                                        @php $fullBrands = "" @endphp
                                                    @endif
                                                @endif
                                                @if($role['module'] == "products")
                                                    @if($role['view_access'] == 1)
                                                        @php $viewProducts = "checked" @endphp
                                                    @else
                                                        @php $viewProducts = "" @endphp
                                                    @endif
                                                    @if($role['edit_access'] == 1)
                                                        @php $editProducts = "checked" @endphp
                                                    @else
                                                        @php $editProducts = "" @endphp
                                                    @endif
                                                    @if($role['full_access'] == 1)
                                                        @php $fullProducts = "checked" @endphp
                                                    @else
                                                        @php $fullProducts = "" @endphp
                                                    @endif
                                                @endif
                                                @if($role['module'] == "banners")
                                                    @if($role['view_access'] == 1)
                                                        @php $viewBanners = "checked" @endphp
                                                    @else
                                                        @php $viewBanners = "" @endphp
                                                    @endif
                                                    @if($role['edit_access'] == 1)
                                                        @php $editBanners = "checked" @endphp
                                                    @else
                                                        @php $editBanners = "" @endphp
                                                    @endif
                                                    @if($role['full_access'] == 1)
                                                        @php $fullBanners = "checked" @endphp
                                                    @else
                                                        @php $fullBanners = "" @endphp
                                                    @endif
                                                @endif
                                                @if($role['module'] == "coupons")
                                                    @if($role['view_access'] == 1)
                                                        @php $viewCoupons = "checked" @endphp
                                                    @else
                                                        @php $viewCoupons = "" @endphp
                                                    @endif
                                                    @if($role['edit_access'] == 1)
                                                        @php $editCoupons = "checked" @endphp
                                                    @else
                                                        @php $editCoupons = "" @endphp
                                                    @endif
                                                    @if($role['full_access'] == 1)
                                                        @php $fullCoupons = "checked" @endphp
                                                    @else
                                                        @php $fullCoupons = "" @endphp
                                                    @endif
                                                @endif
                                        @endforeach
                                    @endif
                                   <div class="card-body">
                                       <div class="form-group col-md-6">
                                           <label for="cms_pages">CMS Pages: &nbsp;&nbsp;&nbsp;</label>
                                           <input type="checkbox" name="cms_pages[view]" value="1" @if(isset($viewCMSPages)) {{ $viewCMSPages }} @endif>&nbsp;View Access &nbsp;&nbsp;&nbsp;&nbsp;
                                           <input type="checkbox" name="cms_pages[edit]" value="1" @if(isset($editCMSPages)) {{ $editCMSPages }} @endif>&nbsp;View/Edit Access &nbsp;&nbsp;&nbsp;&nbsp;
                                           <input type="checkbox" name="cms_pages[full]" value="1" @if(isset($fullCMSPages)) {{ $fullCMSPages }} @endif>&nbsp;Full Access &nbsp;&nbsp;&nbsp;&nbsp;
                                       </div>
                                       <div class="form-group col-md-6">
                                           <label for="categories">Categories: &nbsp;&nbsp;&nbsp;</label>
                                           <input type="checkbox" name="categories[view]" value="1" @if(isset($viewCategories)) {{ $viewCategories }} @endif>&nbsp;View Access &nbsp;&nbsp;&nbsp;&nbsp;
                                           <input type="checkbox" name="categories[edit]" value="1" @if(isset($editCategories)) {{ $editCategories }} @endif>&nbsp;View/Edit Access &nbsp;&nbsp;&nbsp;&nbsp;
                                           <input type="checkbox" name="categories[full]" value="1" @if(isset($fullCategories)) {{ $fullCategories }} @endif>&nbsp;Full Access &nbsp;&nbsp;&nbsp;&nbsp;
                                       </div>
                                       <div class="form-group col-md-6">
                                           <label for="brands">Brands: &nbsp;&nbsp;&nbsp;</label>
                                           <input type="checkbox" name="brands[view]" value="1" @if(isset($viewBrands)) {{ $viewBrands }} @endif>&nbsp;View Access &nbsp;&nbsp;&nbsp;&nbsp;
                                           <input type="checkbox" name="brands[edit]" value="1" @if(isset($editBrands)) {{ $editBrands }} @endif>&nbsp;View/Edit Access &nbsp;&nbsp;&nbsp;&nbsp;
                                           <input type="checkbox" name="brands[full]" value="1" @if(isset($fullBrands)) {{ $fullBrands }} @endif>&nbsp;Full Access &nbsp;&nbsp;&nbsp;&nbsp;
                                       </div>
                                       <div class="form-group col-md-6">
                                           <label for="products">Products: &nbsp;&nbsp;&nbsp;</label>
                                           <input type="checkbox" name="products[view]" value="1" @if(isset($viewProducts)) {{ $viewProducts }} @endif>&nbsp;View Access &nbsp;&nbsp;&nbsp;&nbsp;
                                           <input type="checkbox" name="products[edit]" value="1" @if(isset($editProducts)) {{ $editProducts}} @endif>&nbsp;View/Edit Access &nbsp;&nbsp;&nbsp;&nbsp;
                                           <input type="checkbox" name="products[full]" value="1" @if(isset($fullProducts)) {{ $fullProducts }} @endif>&nbsp;Full Access &nbsp;&nbsp;&nbsp;&nbsp;
                                       </div>
                                       <div class="form-group col-md-6">
                                           <label for="banners">Banners: &nbsp;&nbsp;&nbsp;</label>
                                           <input type="checkbox" name="banners[view]" value="1" @if(isset($viewBanners)) {{ $viewBanners }} @endif>&nbsp;View Access &nbsp;&nbsp;&nbsp;&nbsp;
                                           <input type="checkbox" name="banners[edit]" value="1" @if(isset($editBanners)) {{ $editBanners}} @endif>&nbsp;View/Edit Access &nbsp;&nbsp;&nbsp;&nbsp;
                                           <input type="checkbox" name="banners[full]" value="1" @if(isset($fullBanners)) {{ $fullBanners }} @endif>&nbsp;Full Access &nbsp;&nbsp;&nbsp;&nbsp;
                                       </div>
                                       <div class="form-group col-md-6">
                                           <label for="coupons">Coupons: &nbsp;&nbsp;&nbsp;</label>
                                           <input type="checkbox" name="coupons[view]" value="1" @if(isset($viewCoupons)) {{ $viewCoupons }} @endif>&nbsp;View Access &nbsp;&nbsp;&nbsp;&nbsp;
                                           <input type="checkbox" name="coupons[edit]" value="1" @if(isset($editCoupons)) {{ $editCoupons}} @endif>&nbsp;View/Edit Access &nbsp;&nbsp;&nbsp;&nbsp;
                                           <input type="checkbox" name="coupons[full]" value="1" @if(isset($fullCoupons)) {{ $fullCoupons }} @endif>&nbsp;Full Access &nbsp;&nbsp;&nbsp;&nbsp;
                                       </div>

                                   </div>

                                    <div class="form-group col-md-6">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
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
