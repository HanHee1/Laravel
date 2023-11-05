@extends('register.layout')
@section('title', '회원가입')

@section('content')
    {{-- 유효성 검사 --}}
    @if ($errors->any())
        <div class="alert alert-warning" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="mx-auto p-8 max-w-3xl h-auto bg-white shadow-lg">
        <form method="post" action="{{route('register.store')}}">
            @csrf
            <p class="border-b border-gray-400 text-left mb-8 pb-1 text-2xl">&nbsp 회 원 가 입</p>
            <p>
                <label for="userid" class="inline-block w-1/4 text-right mr-4">
                    <span class="text-sm text-red-500">*</span>
                    아이디
                </label>
                <input id="userid" type="text" name="userid" class="form-label">
            </p>
            <p class="mt-6">
                <label for="email" class="inline-block w-1/4 text-right mr-4">
                    <span class="text-sm text-red-500">*</span>
                    이메일
                </label>
                <input id="email" type="email" name="email" class="form-label">
            </p>

            <p class="mt-6">
                <label for="password" class="inline-block w-1/4 text-right mr-4">
                    <span class="text-sm text-red-500">*</span>
                    비밀번호
                </label>
                <input id="password" type="password" name="password" class="form-label">
            </p>

            <p class="mt-6">
                <label for="password_confirmation" class="inline-block w-1/4 text-right mr-4">
                    <span class="text-sm text-red-500">*</span>
                    비밀번호 확인
                </label>
                <input id="password_confirmation" type="password" name="password_confirmation" class="form-label">
            </p>

            <p class="mt-6">
                <label for="tel" class="inline-block w-1/4 text-right mr-4">
                    <span class="text-sm text-red-500">*</span>
                    전화번호
                </label>
                <input id="tel" type="tel" name="tel" class="form-label">
            </p>

            <p class="mt-8 text-center">
                <input class="btn btn-dark " type="submit" value="가입">
                <input class="btn btn-dark " id="backMain" type="button" value="취소" onclick="location.href = '{{route('products.index')}}'">
            </p>
        </form>
    </div>
@endsection
