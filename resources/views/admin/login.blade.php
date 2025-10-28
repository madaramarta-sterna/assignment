@extends('layout')

@section('content')
    <div
        class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
        <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row">
            <div
                class="text-[13px] leading-[20px] flex-1 p-6 pb-12 lg:p-20 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-bl-lg rounded-br-lg lg:rounded-tl-lg lg:rounded-br-none">
                <h1 class="mb-1 font-medium">Let's get started</h1>
                <form method="post">
                    @csrf
                    <x-form-error errorName="login" :errorBag="$errors"></x-form-error>

                    <input type="email" name="email" id="name" value="{{ old('email') }}"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="Email">
                    <div class="relative">
                        <input type="password" name="password" id="password"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="Password">
                        <div class="passwordIcon absolute inset-y-0 end-0 flex items-center z-20 pe-4">
                            <a onclick="togglePassword()" class="cursor-pointer">
                                <svg class="showPassword shrink-0 size-4 text-gray-400 dark:text-neutral-500"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                                     role="img" aria-labelledby="title-show" fill="none" stroke="currentColor"
                                     stroke-width="1.8"
                                     stroke-linecap="round" stroke-linejoin="round" focusable="false">
                                    <title id="title-show">Show password</title>
                                    <!-- eye outline -->
                                    <path d="M1.5 12s3.5-6.5 10.5-6.5S22.5 12 22.5 12 19 18.5 12 18.5 1.5 12 1.5 12z"/>
                                    <!-- pupil -->
                                    <circle cx="12" cy="12" r="3"/>
                                </svg>
                                <svg class="hidePassword shrink-0 size-4 text-gray-400 dark:text-neutral-500"
                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"
                                     role="img" aria-labelledby="title-hide" fill="none" stroke="currentColor"
                                     stroke-width="1.8"
                                     stroke-linecap="round" stroke-linejoin="round" focusable="false">
                                    <title id="title-hide">Hide password</title>
                                    <!-- eye outline -->
                                    <path d="M1.5 12s3.5-6.5 10.5-6.5S22.5 12 22.5 12 19 18.5 12 18.5 1.5 12 1.5 12z"/>
                                    <!-- pupil (optional: smaller so slash is visible) -->
                                    <circle cx="12" cy="12" r="2.2"/>
                                    <!-- slash -->
                                    <path d="M3 3l18 18"/>
                                </svg>
                            </a>
                        </div>
                        <input type="submit"
                               class="cursor-pointer float-right mt-2 inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                               value="Comment"/>
                    </div>
                </form>
            </div>
            <div
                class="bg-[#fff2f2] dark:bg-[#1D0002] relative lg:-ml-px -mb-px lg:mb-0 rounded-t-lg lg:rounded-t-none lg:rounded-r-lg aspect-[335/376] lg:aspect-auto w-full lg:w-[438px] shrink-0 overflow-hidden">
                <div
                    class="absolute inset-0 rounded-t-lg lg:rounded-t-none lg:rounded-r-lg shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d]"></div>
            </div>
        </main>
    </div>
@endsection

@section('button')
    <a href="{{ url('/') }}"
       class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
        &laquo; Back to page
    </a>
@endsection
