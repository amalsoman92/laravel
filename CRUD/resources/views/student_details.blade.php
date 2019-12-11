@extends('layouts.students')

@section('content')
<div class="container">
    <table class="table mt-5">
        <tr>
            <th scope = "col">Username
                <form action="search" method="post">
                    @csrf
                    <input class="form-control col-sm-6" type="text" name="search" placeholder="Search">
                    @if ($errors->has('search'))
                        <span class = "text-danger">{{ $errors->first('search') }}</span>
                    @endif
                </form>
            </th>
            <th scope = "col">Full Name
                <form action="full_name_search" method="post">
                    @csrf
                    <input class="form-control col-sm-6" type="text" name="name_search" placeholder="Search">
                </form>
            </th>
            <th scope = "col">Email
                <form action="email_search" method="post">
                    @csrf
                    <input class="form-control col-sm-6" type="text" name="email_search" placeholder="Search">
                </form>
            </th>
            <th scope = "col">Update</th>
            <th scope = "col">Delete</th>
        </tr>
        @if (count($users) >= 1)
            @foreach($users as $user)
                <tr>
                    <td>
                        {{$user -> name}}
                    </td>
                    <td>
                        {{$user -> full_name}}
                    </td>
                    <td>
                        {{$user -> email}}
                    </td>
                    <td>
                        <a href = "{{ route('students.edit',$user->id )}}" class = "btn btn-primary" type = "submit">Update</a>
                    </td>
                    <td>
                        <form action="{{ route('students.destroy',$user->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class = "btn btn-primary" name = "submit" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <tr><td colspan="5">No Results</td></tr>
        @endif
    </table>
    {{ $users->links() }}
</div>
@endsection
 