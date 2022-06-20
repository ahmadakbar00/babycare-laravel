<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="plugins/fontawesome-free/fontawesome-free-6.1.1-web/css/all.min.css">
        <!-- AOS Animation Scroll -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            section.hero {
                background-image: linear-gradient(to bottom, rgba(0,0,0,0.8) 30%,rgba(0,0,0,0.8) 100%),
                    /* url('https://stringfixer.com/files/30160736.jpg'); */
                    url('img/posyandu.jpg');
                background-size: cover;
                color: white;
                position: relative;
                height: 600px;
                }
                #myBtn {
                display: none; /* Hidden by default */
                position: fixed; /* Fixed/sticky position */
                bottom: 20px; /* Place the button at the bottom of the page */
                right: 30px; /* Place the button 30px from the right */
                z-index: 99; /* Make sure it does not overlap */
                border: none; /* Remove borders */
                outline: none; /* Remove outline */
                cursor: pointer; /* Add a mouse pointer on hover */
                border-radius: 7px; /* Rounded corners */
                }

                #myBtn:hover {
                background-color: #555; /* Add a dark-grey background on hover */
                }
        </style>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    </head>
    <body class="antialiased">
    <button onclick="topFunction()" id="myBtn" title="Go to top" class="bg-warning px-3 py-2 text-white">Keatas</button>

    <nav class="navbar navbar-dark bg-dark fixed-top" style="opacity:95%;height:80px">
        <a class="navbar-brand px-4">Baby Care</a>
            @if (Route::has('login'))
                <div class="">
                    @auth
                        <a href="{{ url('/user/dashboard') }}" class="btn btn-warning m-3 my-sm-0">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary m-3 my-sm-0">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-outline-warning m-3 my-sm-0">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            </nav>
            <section class="hero d-flex justify-content-center">
                <!-- <img src="https://stringfixer.com/files/30161095.jpg" class="img-fluid" alt="home" /> -->
                <!-- <img src="https://stringfixer.com/files/30160736.jpg" style="width:100%;height:auto; margin-top:-300px;" alt="home" /> -->
                <div class="title h2 text-center align-self-center row">
                    <div>
                    <div class="mb-4">
                        <span class="font-weight-bold">
                            Baby Care
                        </span>
                       |  Monitoring Your Baby
                    </div>
                    <div class="h5 mx-5 font-weight-light">
                     Merupakan Sistem yang dapat digunakan untuk memonitor status gizi balita dengan menggunakan pendekatan metode naive bayes.
                    </div>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-outline-warning m-3 my-sm-0">Coba Sekarang</a>
                    @endif
                </div>
              
            </section>
            
            <section class="content p-5 text-justify">
                <div class="row  my-5  d-flex justify-content-center" data-aos="fade-up" data-aos-duration="2000">
                    <div class="col-4">
                    <i class=" d-flex justify-content-center nav-icon fas fa-user-alt fa-10x"></i>
                    </div>
                    <div class="col-4 ">
                        Dapat menambahkan akun yang dapat memudahkan orang tua dalam memonitoring anaknya, sehingga memonitoring dapat menjadi lebih mudah dan efisien. Orang tua dapat menambahkan beberapa data anak sekaligus dalam satu akun dan memonitoring secara bersamaan.
                    </div>
                </div>
                <br/>
                <div class="row my-5  d-flex justify-content-center" data-aos="fade-up" data-aos-duration="2000">
                    <div class="col-4">
                        Data anak dapat diamati dan dianalisis apakah status gizi anak termasuk dalam kondisi yang baik atau dalam kondisi yang mengharuskan user untuk berkonsultasi kepuskesmas atau rumah sakit terdekat.
                    </div>
                    <div class="col-4 d-flex justify-content-center">
                    <i class="fa-solid fa-book-medical fa-10x"></i>
                    </div>
                </div>
                <br/>
                <div class="row  my-5  d-flex justify-content-center" data-aos="fade-up" data-aos-duration="2000">
                    <div class="col-4">
                    <i class=" d-flex justify-content-center nav-icon fa-solid fa-eye fa-10x"></i>
                    </div>
                    <div class="col-4">
                       User Interface yang digunakan pada sistem ini dibuat menjadi semudah mungkin sehingga orang tua dapat menggunakan sistem ini, sehingga akan memudahkan dalam memonitoring gizi anak.
                    </div>
                </div>
                <br/>
                <div class="row my-5  d-flex justify-content-center" data-aos="fade-up" data-aos-duration="2000">
                    <div class="col-4">
                        Data anda termasuk data anak dan historis monitoring anak anda akan terekam dalam sistem database kami. Sehingga anda tidak perlu khawatir terjadinya kehilangan data selain kesalahan hapus user sendiri.
                    </div>
                    <div class="col-4 d-flex justify-content-center">
                    <i class="fa-solid fa-file-contract fa-10x"></i>
                    </div>
                </div>
            </section>

            <footer class="text-center mx-auto p-5 bg-dark">
               <span class="font-weight-bold text-light"> Created by | </span>
               <span class="font-weight-bold-light text-light"> Ahmad Hizbullah akbar</span>
            </footer>


           

         
        </div>
    </body>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
        </script>
    //Get the button:
        <script>
mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
</script>
</html>
