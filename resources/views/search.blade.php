@if(count($contacts) > 0)
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th>NAME</th>
            <th>COMPANY</th>
            <th>PHONE</th>
            <th>EMAIL</th>
            <th></th>
        </tr>
    </thead>
    
    <tbody>
        @foreach($contacts as $contact)
        <tr>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->company }}</td>
            <td>{{ $contact->phone }}</td>
            <td>{{ $contact->email }}</td>
            <td>
                <a href="{{ route('edit-contact', $contact->id) }}">Edit</a> | 
                <a href="{{ route('remove-contact', $contact->id) }}" onclick="return confirm('are you sure you want to Delete?');">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<h3>No found result.</h3>
@endif