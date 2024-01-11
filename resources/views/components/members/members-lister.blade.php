<div class="container">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-5">
        <div class="p-4 text-lg font-semibold text-gray-900 border-b">
            <h1>{{$listTitle}}</h1>
        </div>
        <div class="w-full">
            <?php $i = 1; ?>
            @foreach ($membersList as $member)
                <button class="w-full p-4 flex flex-col justify-start items-start text-start
                    bg-white border-gray-200 hover:bg-slate-100 transition-colors duration-200">
                    <div class="flex items-center justify-between w-full">
                        <h1 class="text-md font-md">{{$i.'. '.$member->member->name}}</h1>
                        <p class="text-md text-gray-500">{{$member->points}}</p>
                    </div>
                </button>
                <?php $i++; ?>
            @endforeach
        </div>
    </div>
</div>