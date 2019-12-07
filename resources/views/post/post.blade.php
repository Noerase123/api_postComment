@extends('layouts.app')

@section('content')


    <div class="container">

        <a href="/addPost" class="btn btn-primary">Add Post</a>
        
        @if (isset($post))
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Handle</th>
                  </tr>
                </thead>

              <?php
                $num = 1;
              ?>
        @foreach ($post as $item)
                <tbody>
                  <tr>
                    <th scope="row"><?php echo $num;?></th>
                    <td>{{$item->title}}</td>
                    <td>{{$item->description}}</td>
                    <td class="">
                        <a href="/view/{{$item->id}}" class="btn btn-success">View</a>
                        <a href="/update/{{$item->id}}" class="btn btn-primary">Update</a>
                        <a href="/delete/{{$item->id}}" class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
                </tbody>

                <?php $num++;?>
        @endforeach
            
              </table>
        @endif

    </div>
    
@endsection