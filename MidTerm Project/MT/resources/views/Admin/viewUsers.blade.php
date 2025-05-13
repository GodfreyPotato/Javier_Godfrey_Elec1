@extends('Admin.master')
@section('content')
    <div class="container py-5">
        <h2 class="mb-4 text-center">Users</h2>

        <div class="d-flex flex-column">
            @foreach ($users as $user)
                <div class="justify-content-center align-items-center d-flex rounded shadow p-2 my-2">
                    <div class=" w-75">
                        <h5 class="mb-1">{{ $user->name }}</h5>
                        <div><span>
                                Email: {{ $user->email }}
                            </span></div>
                        <div> <span>
                                Role: {{ $user->role }}
                            </span></div>
                        <div> <span>
                                Address: {{ $user->address}}
                            </span></div>
                    </div>
                    <div class="justify-content-center d-flex w-25"><a href="{{route('user.show', ['user' => $user])}}"><img
                                src="/images/file.png" width="18" alt=""></a></div>
                </div>

            @endforeach

        </div>

        <!-- Optional pagination -->
        <div class="mt-4 d-flex justify-content-center">
            {{ $users->links() }}
        </div>
    </div>
@endsection