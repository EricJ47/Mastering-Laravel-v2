@extends('layouts.master')

@section('content')
<div class="container">
    <div class="">
        <a href="{{ route('greeting','en') }}" class="btn btn-sm btn-primary float-end">ENglish</a>
        <a href="{{ route('greeting','id') }}" class="btn btn-sm btn-danger float-end">Idn bang</a>
    </div>
    <div class="display-3" style="margin-top:5% ">{{__('frontend.Wellcome HOme homie')}}</div>
    <p>{{__('frontend.Localization in Laravel to translation various languages')}}</p>
    <div class="row">
        <ul class="row">
            <li>{{__('frontend.Home')}}</li>
            <li>{{__('frontend.About')}}</li>
            <li>{{__('frontend.Contact')}}</li>
            <li>{{__('frontend.More')}}</li>
        </ul>
    </div>
</div>

@endsection