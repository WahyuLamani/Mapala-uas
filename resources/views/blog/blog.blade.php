@extends('layout.core')
@section('title', 'Blog')
@section('content')
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Blog</h2>
        <ol>
          {{-- searching engine --}}
          <li><a href="/">Home</a></li>
          <li>Blog</li>
        </ol>


      </div>

    </div>

  </section><!-- End Breadcrumbs -->

  <!-- ======= Blog Section ======= -->
  <section id="blog" class="blog">
    <div class="container">
      <div class="d-flex justify-content-sm-end mb-4">
        <a href="/blog/create" class="btn btn-sm btn-danger">New Blog</a>
      </div>
      @include('layout.alert')
      @if($blogs->count())
      <div class="row">
        @foreach($blogs as $blog)
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up">
          <article class="entry">

            <div class="entry-img">
              <img src="assets/img/blog-1.jpg" alt="" class="img-fluid">
            </div>

            <h2 class="entry-title">
              <a href="/blog/{{$blog->slug}}">{{$blog->title}}</a>
            </h2>

            <div class="entry-meta">
              <ul>
                <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="/blog/{{$blog->slug}}">John
                    Doe</a>
                </li>
                <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a
                    href="/blog/{{$blog->slug}}"><time
                      datetime="2020-01-01">{{$blog->created_at->diffForHumans()}}</time></a></li>
              </ul>
            </div>

            <div class="entry-content">
              <p>
                {{Str::limit($blog->body, 70)}}
              </p>
              <div class="read-more">
                <a href="/blog/{{$blog->slug}}/edit">Edit</a>
                <a href="/blog/{{$blog->slug}}">Read More</a>
              </div>
            </div>

          </article><!-- End blog entry -->
        </div>
        @endforeach
      </div>
      @else
      <div class="alert alert-danger">
        <h3>There's No Blogs Posted</h3>
      </div>
      @endif

      <div class="d-flex justify-content-center">
        <div>
          {{$blogs->links()}}
        </div>
      </div>

      </>
  </section><!-- End Blog Section -->

</main><!-- End #main -->
@endsection