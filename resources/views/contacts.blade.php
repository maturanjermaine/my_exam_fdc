@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10" id="contact-section">
            <!-- success message -->
            @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
            @endif
            
            <!-- error message -->
            @if(session()->has('error'))
            <div class="alert alert-danger" role="alert">
                {{ session()->get('error') }}
            </div>
            @endif

            <div class="row">
                <div class="col-sm-6">
                    <h3>Contacts</h3>
                </div>

                <div class="col-sm-6 text-right">
                    <a href="{{ route('add-contact') }}">Add Contact</a> 
                    | Contacts 
                    | <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-8"></div>
                <div class="col-sm-4">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-search" aria-hidden="true"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="search" aria-label="search" aria-describedby="basic-addon1" id="search">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 table-responsive" id="contact-table">
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
                    {{ $contacts->links() }}
                    @else
                    <h3 class="text-success">No Contact Added</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    let data = {
        _token: '<?php echo csrf_token(); ?>',
        search: ''
    }
    $('#search').keyup(function() {
        data.search = $(this).val();
        
        $.ajax({
            type:'POST',
            url:'/search-contact',
            data: data,
            success:function(response) {
                $('#contact-table').html(response)
            }
        });
    });
});
</script>
@endsection
