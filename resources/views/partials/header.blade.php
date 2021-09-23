<!-- This example requires Tailwind CSS v2.0+ -->
        <nav class="bg-gray-800 mb-8">
          <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
              <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
                <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                  <span class="sr-only">Open main menu</span>
                  <!--
                    Icon when menu is closed.

                    Heroicon name: outline/menu

                    Menu open: "hidden", Menu closed: "block"
                  -->
                  <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                  </svg>
                  <!--
                    Icon when menu is open.

                    Heroicon name: outline/x

                    Menu open: "block", Menu closed: "hidden"
                  -->
                  <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </button>
              </div>
              <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start"> 
                <div class="hidden sm:block sm:ml-6">
                  <div class="flex space-x-4">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <a href="{{ url('users') }}" class="@isset($page){{ ($page == 'user')?'bg-gray-900':'' }} @endisset text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Users</a>

                    <a href="{{  url('patients') }}" class="@isset($page){{ ($page == 'patient')?'bg-gray-900':'' }} @endisset text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Patients</a>

                    <a href="{{ url('bpo')}}" class="@isset($page){{ ($page == 'bpo')?'bg-gray-900':'' }} @endisset text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">BPO</a>
 
                  </div>
                </div>
              </div> 
            </div>
          </div>

          <!-- Mobile menu, show/hide based on menu state. -->
          <div class="sm:hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <a href="{{ url('users') }}" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Users</a>

              <a href="{{ url('patients') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Patients</a>

              <a href="{{ url('bpo') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Projects</a> 
            </div>
          </div>
        </nav>
        @if ($errors->any())
        <div class="py-3 px-2 my-2 bg-red-300 text-red-800 rounded border border-red-600">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
        </div> 
        @endif  
         @if (session('success'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif