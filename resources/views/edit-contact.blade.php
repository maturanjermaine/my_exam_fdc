@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10" id="contact-section">
            <div class="row">
                <div class="col-sm-12">
                    <h3>Add Contact</h3>
                </div>
            </div>


            <div class="row" id="contact-table">
                <div class="col-sm-12" >
                    <form method="post" action="{{ route('edit-contact', $contact->id) }}">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" value="{{ $contact->name }}" id="name" class="form-control" ></input>
                            @if($errors->has('name'))
                                <div class="text-danger">{{ $errors->first('name') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Company</label>
                            <input type="text" name="company" value="{{ $contact->company }}" id="company" class="form-control"></input>
                            @if($errors->has('company'))
                                <div class="text-danger">{{ $errors->first('company') }}</div>
                            @endif
                        </div>


                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" value="{{ $contact->phone }}" id="phone" class="form-control"></input>
                            @if($errors->has('phone'))
                                <div class="text-danger">{{ $errors->first('phone') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" value="{{ $contact->email }}" id="email" class="form-control"></input>
                            @if($errors->has('email'))
                                <div class="text-danger">{{ $errors->first('email') }}</div>
                            @endif
                        </div>

                        <div class="btn-container">
                            <button type="submit" class="btn btn-primary" value="Submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
