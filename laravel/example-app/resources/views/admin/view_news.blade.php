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
                <div class="col-lg-9 col-md-9 mx-auto ">
                    <form action="{{url('news_search')}}" method="get">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control w-150" placeholder="Search..." aria-label="Search" aria-describedby="button-addon2" name="search">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                            </div>
                        </div>

                    </form>

                </div>




                <div class="col-lg-12 col-md-12">
                    <div class="block">
                        <div class="title"><strong>News</strong></div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>News Title</th>
                                        <th>News Content</th>
                                        <th>News Author</th>
                                        <th>News CreateTime</th>
                                        <th>News Image</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($datas as $data)
                                    <tr>
                                        <td>{{$data->title}}</td>
                                        <td>{!!Str::limit($data->content,50)!!}</td>
                                        <td>{{$data->author}}</td>
                                        <td>{{$data->created_at}}</td>
                                        <td>
                                            <img height="120" width="120" src="news_image/{{$data->linkimage}}" alt="">
                                        </td>
                                        <td><a href="{{url('edit_news',$data->id)}}" class="btn btn-success">Edit</a></td>
                                        <td><a href="{{url('delete_news',$data->id)}}" class="btn btn-danger" onclick="return confirmDelete(event, this)">Delete</a></td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-center my-3 pt-4">
                            {{$datas->onEachSide(2)->links()}}
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