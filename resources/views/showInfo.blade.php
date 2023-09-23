<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
  <div class="container">
    <a href="{{ route('add.data') }}" class='btn btn-primary m-3'>Add Data </a>
    @if (Session::has('mes'))
        <p>{{ Session::get('mes') }}</p>

    @endif
  <table class="table table-striped-columns table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      {{-- <th scope="col">Password</th> --}}
      <th scope="col">Phone</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($allData as $key=>$data)
        <tr>
            <td>{{$key+1}}</td>
            <td>{{$data->name}}</td>
            <td>{{$data->email}}</td>
            {{-- <td>{{$data->password}}</td> --}}
            <td>{{$data->phone}}</td>
            <td>
                <a href="{{ url( '/edit/data/'.$data->id ) }}" class="btn btn-success">Edit</a>
                <a href="" class="btn btn-danger">delete</a>
            </td>
        </tr>
    @endforeach


  </tbody>
</table>
{{ $allData->links() }}
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
