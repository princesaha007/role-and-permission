<x-app-layout>
    <x-slot name="header">
        

        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permissions / Edit') }}
        </h2>

        <a href="{{ route('permissions.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md mb-4">Back</a>




        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form value="{{old('name')}}" action="{{route('permissions.update', $OurPermission->id)}}" method="POST">
                        @csrf
	<div>
		<label for="" class="text-1g font-medium">Name</label>
		<div class="my-3">
		<input value="{{old('name', $OurPermission->name)}}" name="name" placeholder="Enter Name" type="text" class="border-gray-300
		shadow-sm w-1/2 rounded-1g">


        @error('name')
            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror
		</div>
	<button class="Obg-slate-700 text-sm rounded-md text-white bg-blue-500 px-5 py-3">Update
	</button>
	</div>
</form>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
