@extends('index')
@section('headJs')
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>


    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
@endsection

@section('header')
    @include('components.header')
@endsection

@section('content')
    <div class="jumbotron">

    </div>

    <br><br><br> <br><br>

    <div class="container">
        <!-- twinings -->

        <div class="single-post">
            <div class="image-wrapper"><img src="{{asset('images/brand_fortnum2.jpg')}}" alt="Blog Image"></div>

            <p class="date"><em>Fortnum&Mason, Since, 1707</em></p>
            <h3 class="title"><a href="{{route('boards.index')}}"><b class="light-color">If you want to get a Review of this brand, Click here!</b></a></h3>
            <p>It was founded in 1707 by Willam Fortum and his friend Hugh Mason, a British car brand with a history of 310 years.<br>
                As a brand loved by the British royal family for many generations, in 2012, "Portham and Mason" held a ceremony marking the 60th anniversary of Queen Elizabeth II and 911.
            </p>
            <p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>


        </div><!-- single-post -->

        <!-- Fortnum -->

        <div class="single-post">
            <div class="image-wrapper"><img src="{{asset('images/brand_twg.jpg')}}" alt="Blog Image"></div>

            <p class="date"><em>TWG, Since, 1837</em></p>
            <h3 class="title"><a href="{{route('boards.index')}}"><b class="light-color">If you want to get a Review of this brand, Click here!</b></a></h3>
            <p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>

            <p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>



        </div><!-- single-post -->


        <!-- twg -->
        <br><br><br>
        <div class="single-post">
            <div class="image-wrapper"><img src="{{asset('images/brand_twinings.png')}}" alt="Blog Image"></div>
            <br><br><br>
            <p class="date"><em>Twinings, Since, 1706</em></p>
            <h3 class="title"><a href="{{route('boards.index')}}"><b class="light-color">If you want to get a Review of this brand, Click here!</b></a></h3>
            <p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>

            <p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>


        </div><!-- single-post -->

    </div>