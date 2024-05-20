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
                                <form class="form" action="{{url('update_league',$data->id)}}" method="post">

                                    @csrf
                                    <div class="form-group">
                                        <label for="category">Choose Category</label>
                                        <select id="category" name="category_id" class="form-control">
                                            @foreach ($category_list as $item )

                                            <option value="{{ $item->id }}" {{ $data->category_id == $item->id ? 'selected' : '' }}>
                                                {{ $item->category_name }}

                                            </option>
                                            
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="league">League Name</label>
                                        <input id="league" name="league" type="text" value="{{$data->league_name}}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Update League" class="btn btn-primary">
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