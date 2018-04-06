@extends('shared.layout')

@section('page_title', 'Home')

@section('carousel')
<div class="container">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="{{asset('/img/flat-city.jpg')}}" alt="Hello!">
                    <div class="carousel-caption black">
                        <h3>Hello!</h3>
                    </div>
                </div>

                <div class="item">
                    <img src="{{asset('/img/flat-city.jpg')}}" alt="Gang di kota Bandung">
                    <div class="carousel-caption black">
                        <h3>Hello!</h3>
                    </div>
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="col-md-8 c">
            @yield('datadiri')
            <!-- <p>Hello saya Riku dan saya saat ini akan lulus dari kuliah, salam kenal ya. 
            Berikut contoh dari hasil design grafik yang saya buat :).</p> -->
        </div>
        <div class="col-md-4" style="float:right">
            @yield('info')
            
            <!-- <p>Facebook: riku@gmail.com</p>
            <p>Twitter: riku@gmail.com</p>
            <p>Telepon: 022-232392</p>
            <p>Alamat: Jl. Harapan Bangsa No.23, Bandung, Indonesia</p> -->
        </div>
    </div>
@endsection

@section('content')
<!-- content -->

<p>{{$kalimat}}</p>
@endsection


@section('info')
    @foreach($profil as $key => $value)
    <p>{{ $key.": ".$value}}</p>
    @endforeach
@endsection


