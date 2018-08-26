@extends('layouts.app')

@section('content')
        <div class="container">

            <div class="row justify-content-center">
                    <div class="col-md-12">

                        <table class="table table-bordered">
                              <thead class="thead-dark">
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Email</th>
                                </tr>
                              </thead>
                              <tbody>

                                @foreach($users as $user)
                                <tr>
                                  <th scope="row">{{ $user->id }}</th>
                                  <td>{{ $user->name }}</td>
                                  <td>{{ $user->email }} </td>                                  
                                </tr>
                                @endforeach
                              </tbody>
                        </table>

                    </div> 
            </div>            
        </div>
@endsection

