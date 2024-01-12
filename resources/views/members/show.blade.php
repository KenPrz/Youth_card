<x-app-layout>
    <div class="card" style="margin:20px;">
        <div class="card-header">Members Page</div>
        <div class="card-body">
              <div class="card-body">
              <h5 class="card-title">Name : {{ $members->name }}</h5>
              <p class="card-text">Email : {{ $member->email }}</p>
              <p class="card-text">Mobile : {{ $member->contact_number }}</p>
        </div>
          </hr>
        </div>
      </div>
</x-app-layout>