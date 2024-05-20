<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
</head>

<body>
    @include('admin.header')

    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 col-md-8 mx-auto">
                        <div class="block">
                            <div class="title"><strong>Edit Category</strong></div>
                            <div class="block-body">
                                <form class="form-inline" action="{{url('update_category',$data->id)}}" method="post">

                                    @csrf

                                    <div class="form-group">
                                        <label for="category" class="sr-only">Edit Category</label>
                                        <input id="category" name="category" type="text"  class="mr-sm-3 form-control" value="{{$data->category_name}}">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Update Category" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>









            </div>
        </div>
    </div>
    <!-- JavaScript files-->
    @include('admin.footer')
</body>

</html>