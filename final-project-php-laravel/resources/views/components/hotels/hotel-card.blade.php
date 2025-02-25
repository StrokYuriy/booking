<div class="bg-white rounded shadow-md flex card text-grey-darkest">
    <img class="w-1/2 h-full rounded-l-sm" src="{{ $hotel->poster_url }}" alt="Hotel Image">
    <div class="w-full flex flex-col justify-between p-4">
        <div>
            <a class="block text-grey-darkest mb-2 font-bold"
               href="{{ route('hotels.show', ['hotel' => $hotel]) }}">{{ $hotel->title }}</a>
            <div class="text-xs">
                {{ $hotel->address }}
            </div>
        </div>
        @if($hotel->rooms()->min('price'))
            <div class="pt-2">
                <span class="text-2xl text-grey-darkest">₽{{ $hotel->rooms()->min('price') }}</span>
                <span class="text-lg"> за ночь</span>
            </div>
        @endif

        @if($hotel->facilities->isNotEmpty())
            <div class="flex items-center py-2">
                @foreach($hotel->facilities as $facility)
                    <div class="pr-2 text-xs">
                        <span>• {{ $facility->title }} </span>
                    </div>
                @endforeach
            </div>
        @endif
        <div class="flex justify-end">
            <x-link-button href="{{ route('hotels.show', ['hotel' => $hotel]) }}">Подробнее</x-link-button>
        </div>
    </div>
</div>
