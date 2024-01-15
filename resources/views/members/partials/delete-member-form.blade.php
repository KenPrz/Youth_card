<div class="container">
    <form method="POST" action="{{ url('/members' . '/' . $member->id) }}" accept-charset="UTF-8" style="display:inline">
        {{ method_field('DELETE') }}
        {{ csrf_field() }}
        <div class="content">
            <h4>Name</h4>
            <p>{{ $member->name }}</p>
        </div>
        <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm("Confirm delete?")"><i class="fa fa-trash-o" aria-hidden="true"></i>Delelte</button>
    </form> 
</div>