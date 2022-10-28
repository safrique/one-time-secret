@extends('layout')
@section('content')
    @if(empty($link))
        <div class="p-6">
            <div class="flex items-center">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                     stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                    <path
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
                <div class="ml-4 text-lg leading-7 font-semibold">
                    Instructions
                </div>
            </div>

            <div class="ml-12">
                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                    To transfer information via a secure one-time link, paste your text into the box and click "Generate
                    Link". Pass this link onto the person you want to share your information with. Once they click the
                    link, the information will be displayed to them, but will at the same time be deleted from our
                    records, so nobody can ever access that information via our system again.
                </div>
            </div>
        </div>

        <div class="p-6 border-t border-gray-200 dark:border-gray-700">
            <div class="flex items-center">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                     stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                    <path
                        d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                </svg>
                <div class="ml-4 text-lg leading-7 font-semibold">
                    <label for="secret">Secret</label>
                </div>
            </div>

            <div class="ml-12">
                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                    <form action="" method="post">
                        <textarea id="secret" name="secret" rows="6"
                                  cols="50">Type/Paste your information here</textarea>
                        <button type="submit" value="Delete" class="btn">Generate Link</button>
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    </form>
                </div>
            </div>
        </div>
    @endif

    @if(!empty($link))
        <div class="p-6">
            <div class="flex items-center">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                     stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                    <path
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
                <div class="ml-4 text-lg leading-7 font-semibold">
                    Link to secret data
                </div>
            </div>

            <div class="ml-12">
                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                    Pass this link onto the person you want to share the information with. It is a one-time link that
                    will self-destruct once used.
                </div>
                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                    <span id="copy_link">{{ $link }}</span>
                    <button value="copy" onclick="copyToClipboard('copy_link')" class="btn">Copy Link</button>
                </div>
            </div>
        </div>
    @endif
@endsection
