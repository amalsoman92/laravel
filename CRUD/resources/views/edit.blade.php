@extends('layouts.students')

@section('content')
<div class = "container">
    <form action="{{ route('students.update',$student->id)}}" method="post">
        <div class="form-group">
            @csrf
            @method('PATCH')
            <table class="mt-5">
                <tr>
                    <td>
                        <h2>Edit Student Details</h2>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="username">Username</label>
                    </td>
                    <td>
                        <input type="text" name = "name" placeholder = "User name" class = "form-control" value="{{ $student->name }}">
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
                        <input type="text" name = "full_name" placeholder = "Student Name" class = "form-control" value="{{ $student->full_name }}">
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
                        <input type = "text" name = "email" placeholder = "Email" class = "form-control" value="{{ $student->email }}">
                        @if ($errors->has('email'))
                            <span class = "text-danger">{{ $errors->first('email') }}</span>
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
    