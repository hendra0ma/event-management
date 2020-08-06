<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">

    <title>peralatan</title>
  </head>
  <body>

 
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">Event Management</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                    <a class="nav-link active" href="/home">event <span class="sr-only">(current)</span></a>
                    <a class="nav-link" href="/home/peralatan">peralatan</a>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container">
        <table class="table table-hoover text-center mt-4">
            <tr>
                <thead class="thead-dark">
                    <th>
                        nama alat
                    </th>
                    <th>
                        jumlah
                    </th>
                    <th>
                        <a href="#insertPeralatan"data-toggle="modal"class="btn btn-light">Tambah peralatan</a>
                        
                    </th>
                </thead>
            </tr>
            @foreach($data as $text)
            <tr>
                <td>
                    {{$text->nama}}
                </td>
                <td>
                    {{$text->jumlah}}
                </td>
                <td>
                    <a href="/home/peralatan/delete/{{$text->id}}"class="btn btn-danger">delete</a>
                    <a href="#editPeralatan{{$text->id}}"data-toggle="modal"class="btn btn-secondary">edit peralatan</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    
<!-- Modal -->
<div class="modal fade" id="insertPeralatan" tabindex="-1" aria-labelledby="insertPeralatan" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">insert</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/home/peralatan/insert"class="form-group"method="post">
      {{csrf_field()}}
        <div class="modal-body">
            nama : 
            <input type="text" name="nama" required class="form-control">
            jumlah
            <input type="number" name="jumlah" required class="form-control">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" value="submit"class="btn btn-primary">
        </div>
      </form>
    </div>
  </div>
</div>

  
<!-- Modal -->
@foreach($data as $text)
<div class="modal fade" id="editPeralatan{{$text->id}}" tabindex="-1" aria-labelledby="insertPeralatan" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/home/peralatan/update/{{$text->id}}"class="form-group"method="post">
      {{csrf_field()}}
        <div class="modal-body">
            nama : 
            <input type="text" name="nama" required class="form-control"value="{{$text->nama}}">
            jumlah
            <input type="number" name="jumlah" required class="form-control"value="{{$text->jumlah}}">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" value="submit"class="btn btn-primary">
        </div>
      </form>
    </div>
  </div>
</div>

@endforeach


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js" integrity="sha384-XEerZL0cuoUbHE4nZReLT7nx9gQrQreJekYhJD9WNWhH8nEW+0c5qq7aIo2Wl30J" crossorigin="anonymous"></script>
  </body>
</html>