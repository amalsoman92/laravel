@extends('layouts.students')

@section('content')
<div class="container">
    <form action="{{ route('students.store') }}" method="post">
        @csrf
        <div class="form-group">
            <table class="mt-5">
                <tr>
                    <td>
                        <h2>Registration</h2>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="username">Username</label>
                    </td>
                    <td>
                        <input type="text" name = "name" placeholder = "User name" class = "form-control" value="{{ old('name') }}">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="username">Student Name</label>
                    </td>
                    <td>
                        <input type="text" name = "full_name" placeholder = "Student Name" class = "form-control" value="{{ old('full_name') }}">
                        @if ($errors->has('full_name'))
                            <span class="text-danger">{{ $errors->first('full_name') }}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for = "InputEmail1">Email address</label>
                    </td>
                    <td>
                        <input type = "text" name = "email" placeholder = "Email" class = "form-control" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <span class = "text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for = "InputPassword">Password</label>
                    </td>
                    <td><input type = "password" name = "password" placeholder = "Password" class = "form-control" >
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for = "InputPassword">Confirm Password</label>
                    </td>
                    <td><input type = "password" name = "confirm_password" placeholder = "Confirm Password" class = "form-control" >
                        @if ($errors->has('confirm_password'))
                            <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                    </td>
                </tr>
            </table>
        </div>
    </form>
</div>
@endsection
 
