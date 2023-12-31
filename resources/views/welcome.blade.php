@extends('layouts.app')

@section('content')
    <div id="installModal" class="modal d-none">
        <div class="modal-content">
            <span class="btn close">&times;</span>
            <p>Would you like to install our app for a better experience?</p>
            <button id="installBtn" class="btn btn-primary">Install</button>
        </div>
    </div>

    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptas aliquid eveniet distinctio quas omnis aut magnam,
    quia perferendis doloribus ducimus vero est, at facere, consequuntur quisquam soluta officiis ipsam nihil.

    <hr>

   

@endsection

@push('styles')
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
@endpush
