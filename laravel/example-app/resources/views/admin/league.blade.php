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
                            <div class="title"><strong>Add League</strong></div>
                            <div class="block-body">
                                <form class="form" action="{{url('add_league')}}" method="post">

                                    @csrf
                                    <div class="form-group">
                                        <label for="category">Choose Category</label>
                                        <select id="category" name="category_id" class="form-control">
                                            @foreach ($category_list as $item )
                                            <option value="{{$item->id}}">{{$item->category_name}}</option>

                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="league">League Name</label>
                                        <input id="league" name="league" type="text" placeholder="Enter league name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Add League" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-12 col-md-12">
                    <div class="block">
                        <div class="title"><strong>League</strong></div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Category ID</th>
                                        <th>League ID</th>
                                        <th>League Name</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $data )
                                    <tr>
                                        <td>{{$data->category_id}}</td>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->league_name}}</td>
                                        <td><a href="{{url('edit_league',$data->id)}}" class="btn btn-success">Edit</a></td>
                                        <td><a href="{{url('delete_league',$data->id)}}" class="btn btn-danger" onclick="return confirmDelete(event, this)">Delete</a></td>
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