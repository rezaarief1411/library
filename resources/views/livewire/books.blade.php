<div>
    <x-table>
        <x-thead>
            <tr>
                <x-th>
                    <div class="flex">
                        Title
                    </div>
                </x-th>
                <x-th>
                    <div class="flex">
                        Description
                    </div>
                </x-th>
                <x-th>
                    <div class="flex">
                        Publish Date
                    </div>
                </x-th>
                <x-th>
                    <div class="flex">
                        Author
                    </div>
                </x-th>
            </tr>
        </x-thead>
        <tbody>
            @if ($bookList != null)
                @if ($bookList->items() != null)
                    @foreach ($bookList as $index => $item)
                        <tr class="hover:bg-gray-100 first-letter:bg-white border-b">
                            <x-td>
                                {{ $item->title }}
                            </x-td>
                            <x-td>
                                {{ $item->description }}
                            </x-td>
                            <x-td>
                                {{\Carbon\Carbon::parse($item->publish_date)->format('d-M-Y')}}
                            </x-td>
                            <x-td>
                                {{ $item->name }}
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
