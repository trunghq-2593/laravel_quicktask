@extends('auth.layouts.master')
@section('content')
    <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
        <div class="d-flex justify-content-end">
            <ul>
                <li style="padding: 0px 3px" class="{{\Illuminate\Support\Facades\App::getLocale()=='en'?'active':''}}">
                    <a href="{{route('change-language','en')}}">
                        <img src="https://flagcdn.com/20x15/us.png" alt="English">
                    </a>
                </li>
                <li class="{{\Illuminate\Support\Facades\App::getLocale()=='vi'?'active':''}}" style="padding: 0px 3px">
                    <a href="{{route('change-language','vi')}}" class="">
                        <img src="https://flagcdn.com/20x15/vn.png" alt="Viet Nam">
                    </a>
                </li>
            </ul>
            <style>
                ul {
                    display: inline;
                    list-style: none;
                }

                ul li {
                    float: left;
                }
            </style>
        </div>
        <div class="card card0 border-0">
            <div class="row d-flex">
                <div class="col-lg-6">
                    <div class="card1 pb-5">
                        <div class="row"><img src="https://sun-asterisk.vn/wp-content/uploads/2020/10/logo-sun@2x.png"
                                              class="logo"></div>
                        <div class="row px-3 justify-content-center mt-4 mb-5 border-line"><img
                                src="https://sun-asterisk.vn/wp-content/uploads/2020/11/intro-business.png"
                                class="image"></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card2 card border-0 px-4 py-5">
                        <form action="{{route('auth.login')}}" class="mt-4" method="POST">
                            @csrf
                            <div class="row px-3"><label class="mb-1">
                                    <h6 class="mb-0 text-sm">Email</h6>
                                </label> <input class="mb-4" type="text" name="email"
                                                placeholder="Vui lòng nhập địa chỉ email"></div>
                            <div class="row px-3"><label class="mb-1">
                                    <h6 class="mb-0 text-sm">{{__('password')}}</h6>
                                </label> <input type="password" name="password" placeholder="Vui lòng nhập mật khẩu">
                            </div>
                            <div class="row mb-3 px-3 mt-4">
                                <button type="submit" class="btn btn-success text-center">{{__('login')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="bg-blue py-4">
                <div class="row px-3"><small class="ml-4 ml-sm-5 mb-2">{{__('copyright')}}</small>
                    <div class="social-contact ml-4 ml-sm-auto"><span class="fa fa-facebook mr-4 text-sm"></span> <span
                            class="fa fa-google-plus mr-4 text-sm"></span> <span
                            class="fa fa-linkedin mr-4 text-sm"></span> <span
                            class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span></div>
                </div>
            </div>
        </div>
    </div>
@endsection
