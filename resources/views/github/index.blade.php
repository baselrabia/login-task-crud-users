@extends('layouts.index')
@push('css')
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

@endpush
@section('content')
<div class="container">

<div class="row">

    <div class="box bg-light mt-3">
        <div class="box-header">
            Github Search
        </div>
        <div class="box-body">

                <h3 align="center">Live Github Search in laravel using AJAX</h3><br />
                <div class="panel panel-default">
                    <div class="panel-heading">Search User Data</div>
                    <div class="panel-body">
                    <div class="form-group">
                    <input type="text" name="search" id="search" class="form-control" placeholder="Search User Data" />
                    </div>
                    <div class="table-responsive">
                    <h3 align="center">Total Data : <span id="total_records"></span></h3>

                    <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                        <th class="text-center" >Avatar</th>
                        <th class="text-center" >User Name</th>

                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                    </table>

                    </div>
                    </div>
                </div>


        </div>
    </div>
</div>

</div>

@push('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function(){

            function fetch_User_data(query = '')
            {
                $.ajax({
                    url: "{{ route('github-search.search') }}",
                    method:'GET',
                    data:{query:query},
                    dataType:'json',
                    success:function(data)
                    {
                        $('tbody').html(data.table_data);
                        $('#total_records').text(data.total_data);
                    }
                })
            }

            $(document).on('change', '#search', function(){
                var query = $(this).val();
                fetch_User_data(query);

            });
        });



    </script>



@endpush

@endsection
