@extends('layout.core')
@section('title', 'About')

@section('content')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>About</h2>
      <ol>
        <li><a href="/">Home</a></li>
        <li>About</li>
      </ol>
    </div>

  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= About Section ======= -->
<section id="about" class="about">
  <div class="container">

    <div class="row content">
      <div class="col-lg-6">
        <h2>Eum ipsam laborum deleniti velitena</h2>
        <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assum perenda sruen jonee trave</h3>
      </div>
      <div class="col-lg-6 pt-4 pt-lg-0">
        <p>
          Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
          velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
          culpa qui officia deserunt mollit anim id est laborum
        </p>
        <ul>
          <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequa</li>
          <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit</li>
          <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
            irure dolor in reprehenderit in</li>
        </ul>
        <p class="font-italic">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
          magna aliqua.
        </p>
      </div>
    </div>

  </div>
</section><!-- End About Section -->

<!-- ======= Team Section ======= -->
<section id="team" class="team section-bg">
  <div class="container">

    <div class="section-title">
      <h2>Team</h2>
      <p>Our Hardowrking Team</p>
    </div>

    <div class="row">
      @foreach ($users as $user)
      <div class="col-lg-6 mt-lg-4">
        <div class="member d-flex align-items-start">
          <div class="pic"><img src="assets/img/team/team-1.jpg" class="img-fluid" alt=""></div>
          <div class="member-info">
            <h4>{{$user->name}}</h4>
            <small class="text-secondary">{{$user->nim}}</small>
            <span><b>Anggota</b></span>
            <p>Explicabo voluptatem mollitia et repellat</p>
            <div class="social">
              <a href=""><i class="ri-twitter-fill"></i></a>
              <a href=""><i class="ri-facebook-fill"></i></a>
              <a href=""><i class="ri-instagram-fill"></i></a>
              <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
      {{$users->links()}}

    </div>

  </div>
</section><!-- End Team Section -->

<!-- ======= Our Skills Section ======= -->


</main>
@endsection