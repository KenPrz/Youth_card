<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Members') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            Welcome to members
            <x-table.table :headers="['Member','Email','Contact Number','Birthday','Purok','Youth Classification','Action']">
                @if ($members->isEmpty() || $members == null)
                    <tr class="border-b">
                        <x-table.td colspan="7">No members found.</x-table.td>
                    </tr>
                @else
                    @foreach ($members as $member)
                        <tr class="border-b">
                            <x-table.td>{{$member->name}}</x-table.td>
                            <x-table.td>{{$member->email}}</x-table.td>
                            <x-table.td>{{$member->contact_number}}</x-table.td>
                            <x-table.td>{{$member->birthday}}</x-table.td>
                            <x-table.td>{{$member->purok}}</x-table.td>
                            <x-table.td>{{$member->youth_classification}}</x-table.td>
                            <td class="p-2 text-left">
                                <a href="{{route('member.edit', $member->id)}}" class="text-blue-500">Edit</a>
                                <form action="{{route('member.destroy', $member->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </x-table.table>
        </div>
    </div>
</x-app-layout>
