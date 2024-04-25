@extends('layout')

@section('title', 'Update: '. $post['title'])

@section('content')

<!-- Verify if the logged user is who made the post  -->

<br><br>
<div class="container-md">

<form action="/update-post/{{$post->id}}" method="post">
  
  @csrf

  <!-- Text input -->
  <div data-mdb-input-init class="form-outline mb-4">
  <b><label class="form-label" for="form6Example3">Title</label></b>
    <input type="text" name="title" class="form-control" value="{{$post['title']}}"/>
    
  </div>

  @if($errors->has('title'))
            <div class="error"><p style="color:red;">{{ $errors->first('title') }} </p> </div>
            @endif

  
<br>
  <!-- Message input -->
  <div data-mdb-input-init class="form-outline mb-4">
    <b><label class="form-label" for="form6Example7">Content</label></b>
    <textarea class="form-control" name="body" rows="20">{{$post->body}}</textarea>
    
  </div>

  @if($errors->has('body'))
            <div class="error"><p style="color:red;">{{ $errors->first('body') }} </p> </div>
            @endif



  <!-- Submit button -->
  <button data-mdb-ripple-init type="submit" class="btn btn-outline-success">Save</button>
</form>
</div> </div> 

</div>





</form>

<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
        <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
      </a>
      <span class="mb-3 mb-md-0 text-muted">© Created by <a class="link-offset-2 link-underline link-underline-opacity-0" href="https://github.com/Giuvvv">Giovan Battista Lo Buglio</a></span>
    </div>

  
  </footer>

@endsection