@props(['title', 'message', 'buttonText', 'route'])

<div class="bg-indigo-50 border-l-4 border-indigo-400 p-4 mb-6">
    <div class="flex">
        <div class="flex-shrink-0">
            <x-icon name="check-circle" class="h-5 w-5 text-indigo-400"/>
        </div>
        <div class="ml-3">
            <h3 class="text-sm font-medium text-indigo-800">{{ $title }}</h3>
            <div class="mt-2 text-sm text-indigo-700">
                <p>{{ $message }}</p>
            </div>
            <div class="mt-4">
                <a href="{{ route($route) }}"
                   class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ $buttonText }}
                </a>
            </div>
        </div>
    </div>
</div>
