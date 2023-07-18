<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name')}}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css"> -->
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition sidebar-mini">


    <main id="main">
        <section>
            <div class="container">

                <div class="row">

                    <div class="col-md-12" data-aos="fade-up">
                        <div class="d-md-flex post-entry-2 half my-5">
                            <a href="single-post.html" class="me-4 mr-4  thumbnail">
                                <img src="{{ $blog->getFirstMediaUrl('blog_image') }}" height="600" width="500">
                            </a>
                            <div>
                            <h3 class="" >{{$blog->title}}</h3>

                                <div class="post-meta">
                                    <span class="date">{{ $blog->category->name }},</span>
                                    <span class="mx-1">&bullet;</span> <span>{{$blog->posting_time}}</span>
                                </div>
                                <p>{{$blog->description}}</p>
                                <div class="d-flex align-items-center author">
                                    <div class="name">
                                        @foreach ($blog->tags as $singleTag)
                                        <span class="badge bg-primary">{{ $singleTag->name }}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>
    </main><!-- End #main -->
    <!-- jQuery -->
    <script src="{{ asset ('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset ('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset ('dist/js/adminlte.min.js') }}"></script>
</body>

</html>
