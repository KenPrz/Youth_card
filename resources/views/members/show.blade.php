<x-app-layout>

    <div class="card" style="margin:20px;">

        <div class="card-header">Members Page</div>

        <div class="card-body">

            <h5 class="card-title">Name : {{ $members->name }}</h5>

            <p class="card-text">Email : {{ $members->email }}</p>

            <p class="card-text">Mobile : {{ $members->contact_number }}</p>

        </div>

    </div>

</x-app-layout>
