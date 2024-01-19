<div class="container p-4">   
     <div class="points">
        <div class="where text-center font-semibold"><h5>Add Points</h5></div>
        <form action="{{ route('updatePoints', ['id' => $members->id]) }}" class="" method="POST">
            @csrf
           @method("PATCH")
            <div class="nameOfRecieptient mt-4">
                <label for="name" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Add Points to:</label>
                <h5>{{ $members->id }}</h5>
                <input type="text" hidden value="{{ $members->id }}" name="member_id">
            </div>
            
            <div class="infor mt-2">
                <label for="pointname" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Point Name:</label>
                <input type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white rounded" name="pointname" placeholder="Dean Lister">
            </div>
            <div class="infor mt-2">
                <label for="pointvalue" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Point Value:</label>
                <input type="number" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white rounded" name="points">
            </div>
            <div class="text-center px-4 py-2 mt-2">
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Add Points
                </button>
            </div>
        </form>
    </div>
</div>