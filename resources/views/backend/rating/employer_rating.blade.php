<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>etrabaho | Feedback</title>

        {{-- LOGO ON NULL CONDITION --}}
        @isset($logo)
        <?php if ($logo->logo_pic == null) { ?>
            <link rel="shortcut icon" type="image/png" href="http://pluspng.com/img-png/logo-template-png-logo-templates-1655.png">
        <?php } else { ?>
            <link rel="shortcut icon" type="image/png" href="{{ asset('Logo/'.$logo->logo_pic) }}">
        <?php } ?>
        @endisset
        {{-- LOGO ON NULL CONDITION --}}

    <style>
        body{

        background-color: #f7f6f6;
        }

        .card{

        width: 350px;
        border: none;
        box-shadow: 5px 6px 6px 2px #e9ecef;
        border-radius: 12px;
        }

        .circle-image img{

        border: 6px solid #fff;
        border-radius: 100%;
        padding: 0px;
        top: -28px;
        position: relative;
        width: 70px;
        height: 70px;
        border-radius: 100%;
        z-index: 1;
        background: #e7d184;
        cursor: pointer;

        }


        .dot {
        height: 18px;
        width: 18px;
        background-color: blue;
        border-radius: 50%;
        display: inline-block;
        position: relative;
        border: 3px solid #fff;
        top: -48px;
        left: 186px;
        z-index: 1000;
        }

        .name{
        margin-top: -21px;
        font-size: 18px;
        }


        .fw-500{
        font-weight: 500 !important;
        }


        .start{

        color: green;
        }

        .stop{
        color: red;
        }


        .rate{

        border-bottom-right-radius: 12px;
        border-bottom-left-radius: 12px;

        }



        .rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: center
        }

        .rating>input {
        display: none
        }

        .rating>label {
        position: relative;
        width: 1em;
        font-size: 30px;
        font-weight: 300;
        color: #FFD600;
        cursor: pointer
        }

        .rating>label::before {
        content: "\2605";
        position: absolute;
        opacity: 0
        }

        .rating>label:hover:before,
        .rating>label:hover~label:before {
        opacity: 1 !important
        }

        .rating>input:checked~label:before {
        opacity: 1
        }

        .rating:hover>input:checked~label:before {
        opacity: 0.4
        }


        .buttons{
        top: 36px;
        position: relative;
        }


        .rating-submit{
        border-radius: 15px;
        color: #fff;
            height: 49px;
        }


        .rating-submit:hover{

        color: #fff;
        }
    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container d-flex justify-content-center mt-5">

        <div class="card text-center mb-5">

            <div class="circle-image">
            <a href="/">
            @if(auth()->user()->profile_pic)
                <img style="border: 3px solid #fff;" class="rounded-circle shadow-1-strong me-3" src="{{ asset('uploads/'.auth()->user()->profile_pic) }}" alt="avatar" width="65" height="65" />
            @else
                <img style="border: 3px solid #fff;" class="rounded-circle shadow-1-strong me-3" src="{{ asset('backend/dist/img/default-avatar-profile-icon-vector-social-media-user-portrait-176256935.jpg') }}" alt="avatar" width="65" height="65" />
            @endif
            </a>
            </div>

                <span class="dot"></span>

            <span class="name mb-1 fw-500">{{ auth()->user()->name }}</span>
            <small class="text-black-50">{{ auth()->user()->role }}</small>
            <small class="text-black-50 font-weight-bold">Provide a review of this employer</small>



            <div class="location mt-4">

                <span class="d-block"><i class="fa fa-map-marker start"></i> <small class="text-truncate ml-2">{{ auth()->user()->address }}, Bohol</small> </span>

            </div>
            <form action="{{ route('rating.send.employer') }}" method="POST">
                @csrf
                <input type="hidden" value="{{ $users->id }}" name="modalId">
                {{-- <input type="hidden" value="{{ request('job_title_id') }}" name="jobId"> --}}
                <div class="form-outline">
                    <textarea style="border: 2px solid #d8e2dc; border-radius: 10px; margin-top: 10px" class="form-control" id="textAreaExample" name="feedback" rows="4" placeholder="Can you provide your feedback on this employer?" required></textarea>
                </div>


                <div class="rate bg-success py-3 text-white mt-3">

                    <h6 class="mb-0">Rate this employer</h6>

                    <div class="rating"> <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label> <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label> <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label> <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                    </div>


                    <div class="buttons px-4 mt-0">

                    <button type="submit" class="btn btn-warning btn-block rating-submit">Submit</button>

                </div>


                </div>
            </form>






        </div>



    </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

 {{-- SWEETALERT START --}}
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

 @if (session('success'))
 <script>
     swal("Success!", "{{ session('success') }}", "success");
 </script>
 @endif

 @if (session('warning'))
     <script>
         swal("Warning!", "{{ session('warning') }}", "warning");
     </script>
 @endif
 {{-- SWEETALERT END --}}
</body>
</html>
