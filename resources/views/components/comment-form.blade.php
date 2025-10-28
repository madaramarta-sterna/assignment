<form class="max-w-sm mx-auto" method="post">
    @csrf
    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Who Are You</label>
    <input type="text" name="author" id="name" value="{{ old('author') }}"
           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
           placeholder="Your Name Here">
    <x-form-error errorName="author" :errorBag="$errors"></x-form-error>

    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Comment</label>
    <textarea id="message" rows="4" name="content"
              class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="Leave a comment...">{{ old('content') }}</textarea>
    <x-form-error errorName="content" :errorBag="$errors"></x-form-error>

    <label for='answer'
           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Question: {{ __(sprintf('security.%s.question', session()->get('security.question'))) }}</label>
    <input type="text" name="answer" id="answer"
           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
           placeholder="Answer">
    <x-form-error errorName="answer" :errorBag="$errors"></x-form-error>

    <input type="submit"
           class="cursor-pointer float-right mt-2 inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
           value="Comment"/>
</form>

