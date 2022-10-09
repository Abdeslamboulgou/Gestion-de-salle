@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();" style="margin-right:20px;float:right;background-color:#ffffff; color: black;border:none; " class="btn btn-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-power" viewBox="0 0 16 16">
                                                <path d="M7.5 1v7h1V1h-1z"/>
                                                <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"/>
                                              </svg>
                          
                       </button>
                    </form>
                    <div id="app"> 
                       <rooms>
                           
                       </rooms>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
