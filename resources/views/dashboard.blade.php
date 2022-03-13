<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hi... <strong style="color: blue">{{ Auth::user()->name }}</strong>
        </h2>
    </x-slot>

    <div class="py-12">
        <h2>This is home page..!</h2>
    </div>
</x-app-layout>
