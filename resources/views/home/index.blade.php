<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">

    <title>Event</title>
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

        <div class="row mt-4">
            
                @foreach($data as $text)
                <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                    <table width="100%">
                        <tr>
                            <th> {{$text->nama}} </th>
                            @if ($text->kegiatanModel == "[]")
                            <td rowspan="2"><a href="/home/delete/{{$text->id}}"class="badge badge-danger"> hapus </a></td>
                            @else
                            @endif
                            <td rowspan="2"><a href="" data-toggle="modal"data-target="#editEvent{{$text->id}}"  class="badge badge-dark"> edit </a></td>
                            <td rowspan="2"><a href="" data-toggle="modal"data-target="#insertKegiatan{{$text->id}}" class="badge badge-secondary"> tambah kegiatan </a></td>
                        </tr>
                        <tr>
                            <td style="font-size:12px">{{$text->tanggal}}</td>
                        </tr>
                    </table>
                            
                    </div>
                    <div class="card-body">
                        <ul>
                        @foreach($text->kegiatanModel as $textme)
                            <li>
                               {{$textme->nama_kegiatan}} 
                               <span class="float-right">
                                <a href="/home/kegiatan/delete/{{$textme->id}}"class="badge badge-danger">hapus</a>
                                
                                <a href="#updateKegiatan{{$textme->id}}"class="badge badge-dark"data-toggle="modal"> pindah  </a>
                                </span>
                            </li></br>
                        @endforeach
                        </ul>

                    </div>
                </div>
                </div>
                @endforeach
                <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <button data-toggle="modal"data-target="#insertEvent"class="btn btn-secondary"> 
                            event baru
                        </button>
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>



<!-- Modal -->
<div class="modal fade" id="insertEvent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">insert</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/home/insert"class="form-group"method="get">
      {{csrf_field()}}
        <div class="modal-body">
            nama : 
            <input type="text" name="nama" required class="form-control">
            tanggal : 
            <input type="date" name="tanggal" required class="form-control">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" value="submit"class="btn btn-primary">
        </div>
      </form>
    </div>
  </div>
</div>


@foreach($data as $text)

<div class="modal fade" id="editEvent{{$text->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> {{$text->nama}} </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/home/update/{{$text->id}}"class="form-group"method="post">
      {{csrf_field()}}
        <div class="modal-body">
            nama : 
            <input type="text" name="nama" value="{{$text->nama}}" required class="form-control">
            tanggal : 
            <input type="date" name="tanggal" required class="form-control"value="{{$text->tanggal}}">
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
<div class="modal fade" id="insertKegiatan{{$text->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">insert</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/home/kegiatan/insert"class="form-group"method="post">
      {{csrf_field()}}
        <div class="modal-body">
            kegiatan : 
            <input type="text" name="nama" required class="form-control">
            <input type="hidden" name="idEvent"value="{{$text->id}}">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" value="submit"class="btn btn-primary">
        </div>
      </form>
    </div>
  </div>
</div>
@foreach($text->kegiatanModel as $textme)
<div class="modal fade" id="updateKegiatan{{$textme->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">insert</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/home/kegiatan/update/{{$text->id}}"class="form-group"method="post">
      {{csrf_field()}}
        <div class="modal-body">
            pindah ke : <br>  
            <select name="id" class="form-control">
            @foreach($data as $textme)
              <option value="{{$textme->id}}">{{$textme->nama}}</option>
              @endforeach
            </select>
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
@endforeach




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js" integrity="sha384-XEerZL0cuoUbHE4nZReLT7nx9gQrQreJekYhJD9WNWhH8nEW+0c5qq7aIo2Wl30J" crossorigin="anonymous"></script>
  </body>
</html>