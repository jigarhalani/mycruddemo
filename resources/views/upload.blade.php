@extends('layouts.app')

@section('content')    
      @if(count($errors)>0)

          <div class="alert alert-danger">
              <ul> 
                    @foreach($errors->all() as $e) 
                        <li>{{  $e }} </li>
                    @endforeach
              </ul>
          </div>

      @endif


      @if (Session::has('message'))
          <div class="alert {{ Session:: get('message.type') }}">
                {{ Session::get('message.msg') }}
          </div>
      @endif


        <div class="container">

            <div class="row justify-content-center">
                    <div class="col-md-12">                    
                        <form action="{{ url('upload2') }}" method="POST" enctype="multipart/form-data">                           
                            {{ csrf_field() }}
                            <div class="form-group">
                                  <label for="image">Image</label>
                                  <input type="file" class="form-control" id="image" name="image">
                            </div>                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div> 
            </div>            
        </div>
@endsection

