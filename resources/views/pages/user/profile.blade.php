@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>profil Card</title>
    <style>
        .card{
            width: 300px;
            padding: 20px;
            background: #40355c;
            border-radius: 10px;
            box-shadow: 0 4px 8px rebeccapurple(0,0,0,0,1);
            text-align: center;
            font-family: Arial, sans-serif;
        }

        .profil-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-botton: 15px;
        }

        .name{
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .bio{
            font-size: 0.9em;
            color:aliceblue;
        }

        </style>
</head>

<div class="col-lg-20 d-flex align-items-stretch">
    <div class="p-2 mt-4 me-4">
        <div class="card-body">
            <h4 class="card-title fw-semibold mb-4">profile</h4>
            <div class="table-respon">

            <div class="card ">

                <p><img class="rounded-circle border border-white" src="{{ asset('assets/images/profile/profile.png') }}" width="80" height="80" alt=""></p>
                <ul>
                <li><strong>nama:</strong>{{Auth::user()->nama}}</li>
                <li><strong>email:</strong>{{Auth::user()->email}}</li>
                <li><strong>role:</strong>{{Auth::user()->role}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>

</div>


@endsection
