@extends('layout')

@section('title', 'Home')

@section('content')

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-auto" id="modalElement" style="margin-top: 2em;">
                <h1 class="mb-3 h1">Make a new <b>Post</b></h1>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="col-md-auto" id="modalElement" style="margin-top: 2em;">

            <form action="/create-post" method="POST">

                @csrf

                <!-- Text input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <b><label class="form-label" for="form6Example3">Title</label></b>
                    <input type="text" name="title" class="form-control" />
                </div>

                @if ($errors->has('title'))
                    <div class="error">
                        <p style="color:red;">{{ $errors->first('title') }} </p>
                    </div>
                @endif
                <br>


                <!-- Message input -->
                <div data-mdb-input-init class="form-outline mb-4">
                    <b><label class="form-label" for="form6Example7">Content</label></b>
                    <textarea class="form-control" name="body" rows="4"></textarea>
                </div>

                @if ($errors->has('body'))
                    <div class="error">
                        <p style="color:red;">{{ $errors->first('body') }} </p>
                    </div>
                @endif



                <!-- Submit button -->
                <button data-mdb-ripple-init type="submit" class="btn btn-outline-primary">Create</button>
            </form>
        </div>
    </div>

    

    <br>


    <section class="home-blog bg-sand">
        <div class="container">
            <!-- section title -->
            <div class="row justify-content-md-center">
                <div class="col-xl-5 col-lg-6 col-md-8">
                    <div class="section-title text-center title-ex1">
                        <h2>Latest <b>Posts</b></h2>

                    </div>
                </div>
            </div>
            <!-- section title ends -->

    




            <!--  This foreach generates every post inside the database -->
            @foreach ($posts as $post)
                <div class="row ">
                    <div class="col-md-6">
                        <div class="media blog-media">
                            <a href="/post/{{ $post['id'] }}"><img class="d-flex"   
                                    src="https://static.vecteezy.com/system/resources/thumbnails/001/263/429/small/blue-mosaic-squares-pattern-background.jpg"
                                    alt="Generic placeholder image"></a>
                                    <!-- Change the picture inside src if you want a different image  -->
                            <div class="circle">
                                <h6 class="day">
                                    {{ \Illuminate\Support\Str::substr($post['created_at']->toDateString(), 5, 10) }}</h6>
                                            <!-- This function takes the substring of the date inside the database  -->

                            </div>
                            <div class="media-body">
                                <a href="/post/{{ $post['id'] }}">
                                    <h5 class="mt-0">{{ $post['title'] }}</h5>
                                </a>  <!-- This function limits the characters of the body -->
                                {{ \Illuminate\Support\Str::limit($post['body'], 200) }}
                                <a href="/post/{{ $post['id'] }}" class="post-link">Read More</a>
                                <ul>
                                    <li>by: {{ $post['user_name'] }}</li>
                                </ul>

                            </div>

                        </div>

                    </div>

                </div>
            @endforeach
            
        </div>
<br><br>
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
        <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
      </a>
      <span class="mb-3 mb-md-0 text-muted">© Created by <a class="link-offset-2 link-underline link-underline-opacity-0" href="https://github.com/Giuvvv">Giovan Battista Lo Buglio</a></span>
    </div>

  
  </footer>


    </section>



@endsection

<!-- Some CSS  -->

<style>body{margin-top:20px;}
.home-blog {
    padding-top: 80px;
    padding-bottom: 80px;
}
@media (min-width: 992px) {
    .home-blog {
        padding-top: 100px;
        padding-bottom: 100px;
    }
}
.home-blog .section-title {
    padding-bottom: 15px;
}
.home-blog .media {
    margin-top: 50px;
}
@media (min-width: 768px) {
    .home-blog .media {
        margin-top: 30px;
    }
}
.bg-sand {
    background-color: #f5f5f6;
}
.media.blog-media {
    margin-top: 30px;
    position: relative;
    display: block;
}
@media (min-width: 992px) {
    .media.blog-media {
        display: table;
    }
}
.media.blog-media .circle {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    background-color: rgba(0, 0, 0, 0.5);
    white-space: nowrap;
    position: absolute;
    padding: 0;
    top: 20px;
    left: 20px;
    text-align: center;
    box-shadow: none;
    transform: translateX(0);
    color: #fff;
    transition: background-color 0.3s ease;
}
.media.blog-media .circle .day {
    color: #fff;
    transition: color 0.25s ease;
    font-weight: 500;
    font-size: 28px;
    line-height: 1;
    margin-top: 12px;
}
.media.blog-media .circle .month {
    text-transform: uppercase;
    font-size: 14px;
}
.media.blog-media > a {
    position: relative;
    display: block;
}
@media (min-width: 992px) {
    .media.blog-media > a {
        display: table-cell;
        vertical-align: top;
        min-width: 200px;
    }
}
@media (min-width: 1200px) {
    .media.blog-media > a {
        min-width: 230px;
    }
}
.media.blog-media > a:before {
    position: absolute;
    content: "";
    top: 15px;
    left: 15px;
    right: 15px;
    bottom: 15px;
    opacity: 0;
    transform: scale(0);
    transition: transform 0.3s ease, opacity 0.3s;
    background: rgba(12, 198, 82, 0.7);
}
.media.blog-media > a img {
    width: 100%;
}
.media.blog-media:hover > a:before {
    opacity: 1;
    transform: scale(1);
}
.media.blog-media:hover .circle {
    background-color: rgba(255, 255, 255, 0.9);
}
.media.blog-media:hover .circle .day,
.media.blog-media:hover .circle .month {
    color: #222;
}
.media.blog-media:hover .media-body h5 {
    color: #0cc652;
}
.media.blog-media:hover .media-body a.post-link {
    color: #0cc652;
    text-decoration: underline;
}
.media.blog-media .media-body {
    border: 1px solid #efeff3;
    padding: 30px 30px 10px;
    font-size: 14px;
    background: #fff;
    border-top: none;
}
@media (min-width: 992px) {
    .media.blog-media .media-body {
        padding: 15px 20px 10px;
        border-top: 1px solid #efeff3;
        border-left: none;
        display: table-cell;
        vertical-align: top;
    }
}
@media (min-width: 1200px) {
    .media.blog-media .media-body {
        padding: 30px 20px 10px;
    }
}
.media.blog-media .media-body h5 {
    transition: color 0.3s ease;
    margin-bottom: 15px;
}
@media (min-width: 992px) {
    .media.blog-media .media-body h5 {
        font-size: 15px;
    }
}
@media (min-width: 1200px) {
    .media.blog-media .media-body h5 {
        margin-bottom: 15px;
        font-size: 18px;
    }
}
.media.blog-media .media-body a.post-link {
    display: block;
    color: #222;
    font-size: 11px;
    padding: 23px 0;
    text-transform: uppercase;
    font-weight: 400;
}
@media (min-width: 992px) {
    .media.blog-media .media-body a.post-link {
        padding: 7px 0;
    }
}
@media (min-width: 1200px) {
    .media.blog-media .media-body a.post-link {
        padding: 23px 0;
    }
}
.media.blog-media .media-body ul {
    position: relative;
    padding: 10px 0 0;
}
.media.blog-media .media-body ul li {
    display: inline-block;
    width: 49%;
    position: relative;
}
.media.blog-media .media-body ul li:before {
    position: absolute;
    content: "";
    top: 5px;
    left: 0;
    width: 1px;
    height: 14px;
    background: #eeeef2;
}
.media.blog-media .media-body ul li:first-child:before {
    visibility: hidden;
}
.media.blog-media .media-body ul:before {
    position: absolute;
    content: "";
    top: 0;
    left: 0;
    width: 100%;
    height: 1px;
    background: #eeeef2;
}</style>