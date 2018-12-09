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
        <div class="single-post">
            <div class="image-wrapper"><img src="{{asset('images/about_tea.png')}}" alt="Blog Image"></div>

            <h3 style="text-align: center"><i><a href="#"><b class="light-color">If you want to get a Recommendation of Tea, Click here!</b></a></i></h3>
            <br>
            <p style="text-align: center">차의 성분은 콜레스테롤을 저하시키는 작용을 함으로써 차가 심장병과 고혈압 치료에 긍정적인 영향을 미친다.<br>
                즉 차는 적당히 마시면 신경 계통을 자극해 혈액의 수송을 촉진하고 근육 및 신경의 작용을 왕성하게 한다.<br>
                또한 자양을 도와서 근육을 건강하게 하고 동맥관의 기능을 양호하게 한다는 주장도 많은 학자들이 하고 있다.<br>
                그 밖에 차의 중요한 효능은 타닌성분으로 인한 차의 살균효과이다.<br>
                타닌은 단백질을 응축시키는 성질이 있어서 그로 인하여 전체가 단백질로 구성되어 있는 듯한 세균류에<br>
                타닌이 들어가면 세포가 응축하여 원형질분리를 일으킴으로써 사멸되어 버리기 때문이다.</p>


            <p style="text-align: center">
                한편 발효차 중 우롱차에는 불발효차 속에는 함유되어 있지 않은 효소가 있어 음식물의 소화를 돕거나 지방의 분해를 돕는다.<br>
                또한 녹차나 우롱차 등에는 엽록소를 함유하고 있는 것도 있어서 그 속의 철분 등도 중요한 구실을 하고 있다.<br>
                또 녹차 속에만 있는 아미노산의 일종인 데아닌은 타닌성분과 함께 녹차 속에 함유되어 있어서 풍미에 중요한 구실을 한다.<br>
                우리 몸에 꼭 필요한 필수아미노산도 많이 들어 있어서 효과가 좋으며,<br>
                특히 풍미와 관계 있는 트레오닌·아스파라긴산·라이신·글루타민산 등이 있다.<br>

        </div><!-- single-post -->



    </div>