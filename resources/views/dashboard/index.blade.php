<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Pegadaian barang</title>
    <link rel="stylesheet" href="{{asset('assets/css/home.css')}}">
</head>

<body>
<div class="navbar">
         <div class="logo">
             <a href="#"><img src="assets/img/pegadian.png" style="height:70px;"></a>
         </div>
         <div class="menu">
             <ul>
                 <li>Home</li>
                 <li>About</li>
                 <li>Services</li>
                 <li>Mission</li>
                 <li>Contact</li>
                 @if(Auth::check())
        @if(Auth::user()->role === 'admin')
    <a href="{{route('data')}}" class="login-btn" style="margin:25px;">Lihat data</a>
    @elseif (Auth::user()->role == 'petugas')
    <a href="{{route('data.petugas')}}" class="login-btn" style="margin:25px;">Lihat data</a>
    @endif
@else            
<a href="{{route('login')}}" class="login-btn" style="margin:25px;">Administrator</a>
                     @endif

             </ul>
            </div>
         <div class="app-text">
             <h3>Form Nazril PPLG XI-5</h3>
             <h1>Pengertian Pegadaian <br> Dan Manfaat Pegadaian</h1>
             <br><br><br>
         </div>
         <div class="pengertian">
         <p> pegadaian adalah badan usaha milik negara (BUMN) yang meminjamkan uang dengan menerima barang sebagai jaminan dari peminjamnya. 
              Biasanya, barang tersebut berupa perhiasan (emas) atau barang-barang rumah tangga (barang elektronik, sertifikat rumah, dan lainnya).</p>
</div>
    <section class="baris">
        <div class="kolom kolom1">
            <h2 style="text-align:left;">Pegadian Barang</h2>
            <ol>
                <li>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Alias modi nemo illum beatae omnis fugit!</li>
                <li>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aspernatur, debitis?</li>
                <li>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptate eligendi et atque dolores veniam maiores quasi error deserunt ducimus delectus?</li>
                <li>Lorem ipsum dolor sit amet.</li>
            </ol>
        </div>
        <div class="kolom kolom2">
            <img src="assets/img/orang.jpg" alt="">
        </div>
    </section>
         

    <section class="flex-container">
        <div class="item">
            <p><strong>500+</strong> <br> Vasilitors</p>
        </div>
        <div class="item">
            <p><strong>95%</strong> <br> Liked</p>
        </div>
        <div class="item">
            <p><strong>400+</strong> <br> Properse</p>
        </div>
        <div class="item">
            <p><strong>350+</strong><br> Reviews</p>
        </div>
        
    </section>
    <div class="containere">
        <div class=" text-center mt-5 ">
     </div>
     <div class="row" style="width: 1470px;">
        <div class="card mt- mx-auto p-4 bg-light">
            <div class="card-body bg-light">
        <div class = "container">
             <div class="controls">
             <strong><h5>SILAHKAN ISI FORM TERSBUT</h5></strong>
             <h6>UNTUK MELAKUKAN PENGGADIAN</h6>
             <br><br><br><br>
             @if ($errors->any())
        @foreach ($errors->all() as $error)
            <li style="font-weight: bold">{{ $error }}</li>
        @endforeach
    </ul>
@endif

@if (Session::get('Succes'))
<div class="alert alert-success" role="alert" style="text-align:center;">
{{ Session::get('Succes') }}
</div>
@endif

<form action="{{ route('dashboard') }}" method="POST" enctype="multipart/form-data">
        @csrf
                <div class="row">
                    <div class="col-md-5">
                        <div class ="form-group mb-3" >
                            <label class for="form_name"><strong> NAME</strong></label>
                            <input id="form_name" type="text" name="nama" class="form-control" placeholder="Masukan NAME*" required="required" data-error="Firstname is required.">
                         </div>
                    </div>
        
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="form_email"><strong>EMAIL</strong></label>
                            <input id="form_email" type="text" name="email" class="form-control" placeholder="Please enter your Email*" required="required" data-error="Valid email is required.">
                        </div>
                    </div>
                </div>
               

                <div class="row">
                    <div class="col-md-11">
                        <div class ="form-group mb-3" >
                            <label class for="form_name"><strong> AGE</strong></label>
                            <input id="form_name" type="number" name="age" class="form-control" placeholder="Masukan Nama Age*" required="required" data-error="Firstname is required.">
                         </div>
                    </div>
                </div>

                    <div class="row">
                    <div class="col-md-5">
                        <div class="form-group mb-3">
                            <label for="form_email"><strong>PHONE</strong></label>
                            <input id="form_email" type="number" name="no_tlp" class="form-control" placeholder="Please enter your Number*" required="required" data-error="Valid email is required.">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="form_email"><strong>NIK</strong></label>
                            <input id="form_email" type="number" name="nik" class="form-control" placeholder="Please enter your NIK*" required="required" data-error="Valid email is required.">
                        </div>
                    </div>
                </div>
               </div>
               
               <div class="col-md-11">
                        <div class="form-group">
                            <label for="form_need"><strong>ITEM*</strong></label>
                            <select id="form_need" name="item" class="form-control" required="required" data-error="Please specify your need.">
                                <option value="" selected disabled>--Select Your Item--</option>
                                <option >Barang</option>
                                <option >Sertifikat</option>
                                <option >Kendaraan</option>
                            </select>
                          </div>
                    </div>
                    <div class="input-card">
                    <label for="">ITEM PHOTO</label>
                    <input type="file" name="foto">
                </div>

                    <div class="col-md-12">
                         <input type="submit" class="btn btn-success btn-send  pt-2 btn-block" style="padding: 35px; margin: 15px;"value="Send Message" >
                </div>
            </div>
      </div>
 </form>
        </div>
     </div>
    </div>
    </div>
    </div>
    </div>