@extends('layout.core')
@section('title','Blog Detail')
@section('content')
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Blog : {{$blog->title}}</h2>
        <ol>
          <li><a href="/">Home</a></li>
          <li><a href="/blog">Blog</a></li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= Blog Section ======= -->
  <section id="blog" class="blog">
    <div class="container">

      <div class="row">

        <div class="col-lg-8 entries">

          <article class="entry entry-single">

            <div class="entry-img">
              <img src="{{asset("/storage/".$blog->thumbnail)}}" alt="" class="img-fluid">
            </div>

            <h2 class="entry-title">
              <a href="/blog/{{$blog->slug}}">{{$blog->title}}</a>
            </h2>

            <div class="entry-meta">
              <ul>
                <li class="d-flex align-items-center"><i class="icofont-user"></i> <a
                    href="/blog/{{$blog->slug}}">{{$blog->user->name}}</a></li>
                <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a
                    href="/blog/{{$blog->slug}}"><time
                      datetime="2020-01-01">{{$blog->created_at->diffForHumans()}}</time></a></li>
                <li class="d-flex align-items-center"><i class="icofont-search-map"></i> <a
                    href="/categories/{{$blog->category->slug}}">{{$blog->category->name}}</a></li>
              </ul>
            </div>

            <div class="entry-content">
              <p>{{ $blog->body }}</p>
              @auth
              @if(auth()->user()->id == $blog->user_id)
              <!-- Button trigger modal -->
              <div class="d-flex justify-content-end mb-2">
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
                  Delete
                </button>
              </div>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Ar u sure want to delete this Blog ?</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="text-secondary">
                        <h5>Title : {{$blog->title}}</h5>
                        <small>Published : {{$blog->created_at->format("d F, Y")}}</small>
                      </div>
                      <form action="/blog/{{$blog->slug}}/delete" method="post">
                        @csrf
                        @method('delete')
                        <div class="d-flax mt-2">
                          <button class="btn btn-sm btn-danger mr-2" type="submit">yes</button>
                          <button type="button" class="btn btn-sm btn-success" data-dismiss="modal">No</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              @endif
              @endauth

            </div>

            <div class="entry-footer clearfix">
              <div class="float-left">
                <i class="icofont-folder"></i>
                <ul class="cats">
                  <li><a href="#">Business</a></li>
                </ul>

                <i class="icofont-tags"></i>
                <ul class="tags">
                  <li><a href="#">Creative</a></li>
                  <li><a href="#">Tips</a></li>
                  <li><a href="#">Marketing</a></li>
                </ul>
              </div>

              <div class="float-right share">
                <a href="" title="Share on Twitter"><i class="icofont-twitter"></i></a>
                <a href="" title="Share on Facebook"><i class="icofont-facebook"></i></a>
                <a href="" title="Share on Instagram"><i class="icofont-instagram"></i></a>
              </div>

            </div>

          </article><!-- End blog entry -->

          <div class="blog-author clearfix">
            <img src="assets/img/blog-author.jpg" class="rounded-circle float-left" alt="">
            <h4>{{$blog->user->name}}</h4>
            <div class="social-links">
              <a href="https://twitters.com/#"><i class="icofont-twitter"></i></a>
              <a href="https://facebook.com/#"><i class="icofont-facebook"></i></a>
              <a href="https://instagram.com/#"><i class="icofont-instagram"></i></a>
            </div>
            <p>
              Itaque quidem optio quia voluptatibus dolorem dolor. Modi eum sed possimus accusantium. Quas repellat
              voluptatem officia numquam sint aspernatur voluptas. Esse et accusantium ut unde voluptas.
            </p>
          </div><!-- End blog author bio -->



        </div><!-- End blog entries list -->

        <div class="col-lg-4">

          {{-- content sidebar --}}


        </div><!-- End blog sidebar -->

      </div>

    </div>
  </section><!-- End Blog Section -->

</main><!-- End #main -->
@endsection