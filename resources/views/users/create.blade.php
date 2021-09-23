@extends('layouts.app')
@section('content') 
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">

        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif  
 
       
        @include('partials.header')
        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

            <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
              <div class="lg:flex lg:items-center lg:justify-between">
                  <div class="flex-1 min-w-0">
                    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                      Create new staff users
                    </h2> 
                  </div>
                  <div class="mt-5 flex lg:mt-0 lg:ml-4"> 

                    <span class="hidden sm:block ml-3">
                      <a href="{{ url('users') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <!-- Heroicon name: solid/link -->
                        <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                          <path fill-rule="evenodd" d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z" clip-rule="evenodd" />
                        </svg>
                        Users
                      </a>
                    </span>
 
         
                  </div>
                </div> 
            </header>

            <div class="w-full p-6"> 

              <div class="hidden sm:block" aria-hidden="true">
                <div class="py-5">
                  <div class="border-t border-gray-200"></div>
                </div>
              </div>

              <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                  <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                      <h3 class="text-lg font-medium leading-6 text-gray-900">Staff Information</h3> 
                    </div>
                  </div>
                  <div class="mt-5 md:mt-0 md:col-span-2">
                    {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
                      <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                          <div class="grid grid-cols-6 gap-6"> 

                            <div class="col-span-6 sm:col-span-4">
                              <label class="text-gray-600 font-light">First name</label>
                              <input type='text' placeholder="Enter your input here" name="firstname" value="{{ old('firstname') }}" class="w-full mt-2 mb-2 px-6 py-3 border rounded-lg text-lg text-gray-700 focus:outline-none" />
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                              <label class="text-gray-600 font-light">Last name</label>
                              <input type='text' placeholder="Enter your input here" name="lastname" value="{{ old('lastname') }}" class="w-full mt-2 mb-2 px-6 py-3 border rounded-lg text-lg text-gray-700 focus:outline-none" />
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                              <label for="email-address" class="block text-sm font-medium text-gray-700">Email address</label>
                              <input type="email" name="email" id="email-address" autocomplete="email" value="{{ old('email') }}" class="w-full mt-2 mb-2 px-6 py-3 border rounded-lg text-lg text-gray-700 focus:outline-none">
                            </div> 
                            <div class="col-span-6 sm:col-span-4">
                              <label for="password-field" class="block text-sm font-medium text-gray-700">Password</label>
                              <input type="password" name="password" id="password-field" class="w-full mt-2 mb-2 px-6 py-3 border rounded-lg text-lg text-gray-700 focus:outline-none">
                            </div> 
                            <div class="col-span-6 sm:col-span-4">
                              <label for="password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                              <input type="password" name="confirm_password" id="password-field" class="w-full mt-2 mb-2 px-6 py-3 border rounded-lg text-lg text-gray-700 focus:outline-none">
                            </div> 
                            <div class="col-span-6 sm:col-span-4">
                              <label for="last-name" class="block text-sm font-medium text-gray-700">Role</label> 
                              {!! Form::select('roles[]', $roles,[], array('class' => 'w-full border bg-white rounded px-3 py-2 outline-none')) !!} 
                            </div>

                          </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                          <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Save
                          </button>
                        </div>
                      </div>
                    {!! Form::close() !!}
                  </div>
                </div>
              </div>
 
            </div>
        </section>
    </div>
</main> 
@endsection