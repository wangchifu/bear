@extends('layouts.master')
@section('title','首頁')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="form-group col-md-12">
            <h2>歡迎光臨 {{ env('APP_NAME') }}</h2>
            <div class="jumbotron">
                <h1 class="display-4">Hello, world!</h1>
                <div class="media col-9">
                    <img class="mr-3" src="{{ asset('img/teddy-bear.svg') }}" alt="Generic placeholder image">
                    <div class="media-body">
                        <h5 class="mt-0">Basic Education And Related System</h5>
                        <p class="lead">
                            BEARS 是一套國中小學「學籍成績處理系統」，模仿知名的 sfs3 ，在 Laravel 5 上承續它，我們採 <a href="https://zh.wikipedia.org/wiki/MIT%E8%A8%B1%E5%8F%AF%E8%AD%89" target="_blank">MIT</a> 授權條款釋出。
                        </p>
                        <p>
                            BEARS 自由開放免費使用，你可以在 <i class="fab fa-github"></i> <a href="https://github.com/wangchifu/bear" target="_blank">wangchifu/bear</a> 下載並學習安裝它，有任何問題，歡迎在 github 上留言討論。。
                        </p>
                    </div>
                </div>
                <hr class="my-4">
                <a class="btn btn-primary btn-lg" href="https://github.com/wangchifu/bear" role="button" target="_blank"><i class="fab fa-github"></i> 更多資訊</a>
            </div>
        </div>
    </div>
    <hr>
    <div class="text-center">
        Based on <a href="http://www.sfs.project.edu.tw/" target="_blank">sfs 3.1</a> ,
        Power By <a href="https://laravel.tw/" target="_blank"> Laravel 5.7 </a>,
        theme copy from <a href="https://github.com/azouaoui-med/pro-sidebar-template" target="_blank">azouaoui-med / pro-sidebar-template</a>,
        site icon copy from <a href="https://www.flaticon.com/free-icon/teddy-bear_239436#term=bear&page=6&position=46" target="_blank">flaticon</a>
        <br>
        design by wangchifu@gmail.com
    </div>
</div>
@endsection
