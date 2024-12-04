<div {{ $attributes->merge(['class' => 'flex flex-col md:flex-row shadow-md']) }}>
    <div class="h-full w-full md:w-2/5">
        <div class="h-64 w-full bg-cover bg-center bg-no-repeat" style="background-image: url({{ $room->poster_url }})">
        </div>
    </div>
    <div class="p-4 w-full md:w-3/5 flex flex-col justify-between">
        <div class="pb-2">
            <div class="text-xl font-bold">
                {{ $room->title }}
            </div>
            <div>
               <span>•</span> {{ $room->floor_area }} м
            </div>
            <div>
                    @foreach($room->facilities as $facility)
                        <span>• {{ $facility->title }} </span>
                    @endforeach
            </div>
        </div>
        <hr>
        <div class="flex justify-end pt-2">
            <div class="flex flex-col">
                <span>за {{ $room->days }} ночей</span>
            </div>
            <form class="ml-4" method="POST" action="{{ route('bookings.store') }}">
                @csrf
                <input type="hidden" name="started_at" value="{{ request()->get('start_date', \Carbon\Carbon::now()->format('Y-m-d')) }}">
                <input type="hidden" name="finished_at" value="{{ request()->get('end_date', \Carbon\Carbon::now()->format('Y-m-d')) }}">
                <input type="hidden" name="room_id" value="{{ $room->id }}">
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <input type="hidden" name="price" value="{{ $room->price }}">
                <x-the-button class=" h-full w-full">{{ __('Book') }}</x-the-button>
            </form>
        </div>
    </div>
</div>
