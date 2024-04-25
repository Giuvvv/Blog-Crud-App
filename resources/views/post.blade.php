@extends('layout')

@section('title', $post['title'])

@section('content')

<div class="container mt-5">
  <div class="row">
    <div class="col-12">
      <article class="blog-card">
        <div class="blog-card__background">
          <div class="card__background--wrapper">
            <div class="card__background--main" style="background-image: url('http://demo.yolotheme.com/html/motor/images/demo/demo_131.jpg');">
              <div class="card__background--layer"></div>
            </div>
          </div>
        </div>
        <div class="blog-card__head">
          <span class="date__box">
            <span class="date__day fw-light">CREATED ON </span>
            <span class="date__month"><span class="date__month fw-light">{{\Illuminate\Support\Str::substr($post['created_at']->toDateString(), 0, 10)}}</span></span>
          </span>                                                       <!--  This function takes the substring of the date yy/mm/dd -->
          </div>

        <br>
        <div class="blog-card__info">
          <h1><b>{{$post['title']}}</b></h1>
          <hr>
          <h4 class="lead"><p class="lh-lg text-break">{{$post['body']}}</p></h4>
<hr>
          <p>
          Author: <b class="icon-link mr-3">{{$post['user_name']}}</b>
            
          </p>
          
          <div class="blog-card__head">
          <span class="date__box">
            <span class="date__day fw-light">Latest Update </span>
            <span class="date__month"><span class="date__month fw-light">{{\Illuminate\Support\Str::substr($post['updated_at']->toDateString(), 0, 10)}}</span></span>
          </span>                                                       <!--  This function takes the substring of the date yy/mm/dd -->
          
        </div>
        <br>
          
          <!-- Inside this IF, if the logged user is who made the post, he can visualize the Edit button and the Delete button  -->
          @if (Auth::user()->id == $post['user_id'])
          <div class="col-12">

                <form action="/update-post/{{$post->id}}" method="get">
        <button type="submit" class="btn btn-outline-info">Edit</button>
                </form>
<br>
                <form action="/delete-post/{{$post->id}}" method="post">
                @csrf
                @method('DELETE') <!-- This method will delete the post  -->
        <button type="submit" class="btn btn-outline-danger">Delete</button>
                </form>

</div> 
          @endif
          

          
        </div>
      </article>
    </div>
  </div>
</div>

<section class="detail-page">
  <div class="container mt-5">
    
  </div>
</section>


<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
        <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
      </a>
      <span class="mb-3 mb-md-0 text-muted">© Created by <a class="link-offset-2 link-underline link-underline-opacity-0" href="https://github.com/Giuvvv">Giovan Battista Lo Buglio</a></span>
    </div>

  
  </footer>


        @endsection

       
  