<div>
    <x-table>
        <x-thead>
            <tr>
                <x-th>
                    <div class="flex">
                        Name
                    </div>
                </x-th>
                <x-th>
                    <div class="flex">
                        Bio
                    </div>
                </x-th>
                <x-th>
                    <div class="flex">
                        Birth Date
                    </div>
                </x-th>
            </tr>
        </x-thead>
        <tbody>
            @if ($authorList != null)
                @if ($authorList->items() != null)
                    @foreach ($authorList as $index => $item)
                        <tr class="hover:bg-gray-100 first-letter:bg-white border-b">
                            <x-td>
                                {{ $item->name }}
                            </x-td>
                            <x-td>
                                {{ $item->bio }}
                            </x-td>
                            <x-td>
                                {{\Carbon\Carbon::parse($item->birth_date)->format('d-M-Y')}}
                            </x-td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <x-th scope="row" colspan="5" class="text-center text-gray-900">
                            Data not Available
                        </x-th>
                     </tr>
                @endif
            @else
                <tr>
                    <x-th scope="row" colspan="5" class="text-center text-gray-900">
                        Data not Available
                    </x-th>
                </tr>
            @endif
        </tbody>
    </x-table>
</div>
