<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Teacher Requests') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                @forelse($requests as $request)
                <div class="item-card flex flex-row justify-between items-center">
                    <div>
                        <p class="text-slate-500 text-sm">Email</p>
                        <h3 class="text-indigo-950 text-xl font-bold">{{$request->email}}</h3>
                    </div>
                    <div>
                        <p class="text-slate-500 text-sm">Student</p>
                        <h3 class="text-indigo-950 text-xl font-bold">{{$request->user->name}}</h3>
                    </div>
                    <div class="hidden md:flex flex-row items-center gap-x-3">
                        <a href="" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Unduh CV
                        </a>
                    </div>
                </div>
                @empty
                <p>No Requests Yet.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
