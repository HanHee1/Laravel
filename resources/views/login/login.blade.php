@extends('layout')

@section('title', '로그인')

@section('content')
    <div class="mx-auto pt-4 pb-4 max-w-2xl h-auto bg-white shadow-lg">
        <form class="p-4 w-full" action="{{route('login.login')}}" method="post">
            @csrf
            <p class="">&nbsp 로 그 인</p>
            <p class="mt-4">
                <label for="userid" class="">아이디</label>
                <input type="text" name="userid" id="userid" class="" size="30">
            </p>
            <p class="mt-6">
                <label for="password" class="">비밀번호</label>
                <input type="password" name="password" id="password" class="" size="30">
            </p>
            <p class="mt-6 w-3/5 mx-auto text-right">
                <label for="remember_me" class="inline-block"></label>
                <input type="checkbox" id="remember_me" name="remember" class="w-4 h-4">
                <span class="text-xl text-gray-400">로그인 유지</span>
            </p>
            <p class="mt-8 text-center">
                <input class="btn btn-dark" type="submit" value="로그인">
                <input class="btn btn-dark" id="backMain" type="button" value="취소" onclick="location.href = '{{route('products.index')}}'">
            </p>
        </form>
    </div>
@endsection
