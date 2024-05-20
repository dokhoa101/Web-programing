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
                            <div class="title"><strong>Add Club</strong></div>
                            <div class="block-body">
                                <form class="form-inline" action="{{url('add_club')}}" method="post">

                                    @csrf

                                    <div class="form-group">
                                        <label for="club" class="sr-only">Add Club</label>
                                        <input id="club" name="club" type="text" placeholder="" class="mr-sm-3 form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Add Club" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-12 col-md-12">
                    <div class="block">
                        <div class="title"><strong>Club</strong></div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Club ID</th>
                                        <th>Club Name</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($data as $data)
                                    <tr>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->club_name}}</td>
                                        <td><a href="{{url('edit_club',$data->id)}}" class="btn btn-success">Edit</a></td>
                                        <td><a href="{{url('delete_club',$data->id)}}" class="btn btn-danger" onclick="return confirmDelete(event, this)">Delete</a></td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <script>
        function confirmDelete(event, element) {
            let userConfirmed = confirm("Are you sure you want to delete this item?");
            if (userConfirmed) {
                // Người dùng đã xác nhận, tiếp tục với hành động xóa
                return true;
            } else {
                // Người dùng đã hủy hành động xóa
                event.preventDefault();
                return false;
            }
        }
    </script>
    <!-- JavaScript files-->
    @include('admin.footer')
</body>

</html>