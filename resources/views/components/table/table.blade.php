<table class="w-full bg-white">
    <thead>
        <tr class="border-b-2">
            @foreach ($headers as $header)
                <th class="p-2 text-left">{{$header}}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        {{$slot}}
    </tbody>
</table>