<x-app-layout>
    <div class="flex h-screen">
        <!-- Side Bar -->
        <x-sidebar />

        <!-- Content Section -->
        <div class="flex-grow bg-gradient-to-br bg-white text-blue-900 p-6">
            <h1 class="text-xl font-bold mb-4">Official Ballot</h1>
            <form id="ballotForm" action="{{ route('ballot.preview') }}" method="POST">
                @csrf
                <div class="grid grid-cols-2 gap-6">
                    
                    <!-- Left Column -->
                    <div class="space-y-4">
                        <label for="president" class="block font-semibold text-lg text-gray-700">Presidents</label>
                    
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                            @forelse($presidents as $president)
                            <div id="card_{{ $loop->index }}" class="border border-gray-300 rounded-lg shadow-md p-4 flex flex-col items-center bg-white">
                                <!-- Image -->
                                @if(file_exists(public_path('storage/images/'.$president->image)))
                                    <img src="{{ asset('storage/images/'.$president->image) }}" 
                                        alt="{{ $president->image }}" 
                                        class="w-24 h-24 object-cover rounded-full border border-gray-200 shadow-sm">
                                @else
                                    <p class="text-gray-500 text-sm">Image not found</p>
                                @endif
                    
                                <!-- Name & Party List -->
                                <p class="text-lg font-semibold mt-2">{{ $president->name }}</p>
                                <p class="text-sm text-gray-600">Party List: {{ $president->partylist_name }}</p>
                    
                                <!-- Radio Button -->
                                @if(Auth::user()->role == 3 && Auth::user()->has_voted == false && Auth::user()->is_approved == true)
                                    <div class="mt-3">
                                        <input type="radio" id="president_{{ $loop->index }}" name="president" value="{{ $president->name }}" class="hidden peer" onclick="toggleCardColor({{ $loop->index }})">
                                        <label for="president_{{ $loop->index }}" class="cursor-pointer px-4 py-2 bg-gray-100 rounded-lg text-sm font-medium text-gray-700 peer-checked:bg-blue-500 peer-checked:text-white transition">
                                            Select
                                        </label>
                                    </div>
                                @endif
                            </div>
                            @empty 
                                <p class="text-sm text-gray-600">No Candidate Found for President</p>
                            @endforelse
                        </div>
                    </div>
                    
                    <div class="space-y-4">
                        <label for="vice_president" class="block font-semibold text-lg text-gray-700">Vice President</label>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                            @forelse($vice_presidents as $vice_president)
                            <div class="border border-gray-300 rounded-lg shadow-md p-4 flex flex-col items-center bg-white">
                                <!-- Image -->
                                @if(file_exists(public_path('storage/images/'.$vice_president->image)))
                                    <img src="{{ asset('storage/images/'.$vice_president->image) }}" 
                                        alt="{{ $vice_president->image }}" 
                                        class="w-24 h-24 object-cover rounded-full border border-gray-200 shadow-sm">
                                @else
                                    <p class="text-gray-500 text-sm">Image not found</p>
                                @endif
                    
                                <!-- Name & Party List -->
                                <p class="text-lg font-semibold mt-2">{{ $vice_president->name }}</p>
                                <p class="text-sm text-gray-600">Party List: {{ $vice_president->partylist_name }}</p>
                    
                                <!-- Selection Button -->
                                @if(Auth::user()->role == 3 && Auth::user()->has_voted == false && Auth::user()->is_approved == true)
                                    <div class="mt-3">
                                        <input type="radio" id="vice_president_{{ $loop->index }}" name="vice_president" value="{{ $vice_president->name }}" class="hidden peer">
                                        <label for="vice_president_{{ $loop->index }}" class="cursor-pointer px-4 py-2 bg-gray-100 rounded-lg text-sm font-medium text-gray-700 peer-checked:bg-blue-500 peer-checked:text-white transition">
                                            Select
                                        </label>
                                    </div>
                                @endif
                            </div>
                            @empty 
                                <p class="text-sm text-gray-600">No Candidate Found for Vice President</p>
                            @endforelse
                        </div>
                    </div>
                    
                
                    <div class="space-y-4">
                        <label for="secretary" class="block font-semibold text-lg text-gray-700">Secretary</label>
                    
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                            @forelse($secretaries as $secretary)
                            <div class="border border-gray-300 rounded-lg shadow-md p-4 flex flex-col items-center bg-white">
                                <!-- Image -->
                                @if(file_exists(public_path('storage/images/'.$secretary->image)))
                                    <img src="{{ asset('storage/images/'.$secretary->image) }}" 
                                        alt="{{ $secretary->image }}" 
                                        class="w-24 h-24 object-cover rounded-full border border-gray-200 shadow-sm">
                                @else
                                    <p class="text-gray-500 text-sm">Image not found</p>
                                @endif
                    
                                <!-- Name & Party List -->
                                <p class="text-lg font-semibold mt-2">{{ $secretary->name }}</p>
                                <p class="text-sm text-gray-600">Party List: {{ $secretary->partylist_name }}</p>
                    
                                <!-- Selection Button -->
                                @if(Auth::user()->role == 3 && Auth::user()->has_voted == false && Auth::user()->is_approved == true)
                                    <div class="mt-3">
                                        <input type="radio" id="secretary_{{ $loop->index }}" name="secretary" value="{{ $secretary->name }}" class="hidden peer">
                                        <label for="secretary_{{ $loop->index }}" class="cursor-pointer px-4 py-2 bg-gray-100 rounded-lg text-sm font-medium text-gray-700 peer-checked:bg-blue-500 peer-checked:text-white transition">
                                            Select
                                        </label>
                                    </div>
                                @endif
                                @empty 
                                    <p class="text-sm text-gray-600">No Candidate Found for Secretary</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    
                
                    <div class="space-y-4">
                        <label for="treasurer" class="block font-semibold text-lg text-gray-700">Treasurer</label>
                    
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                            @forelse($treasurers as $treasurer)
                            <div class="border border-gray-300 rounded-lg shadow-md p-4 flex flex-col items-center bg-white">
                                <!-- Image -->
                                @if(file_exists(public_path('storage/images/'.$treasurer->image)))
                                    <img src="{{ asset('storage/images/'.$treasurer->image) }}" 
                                        alt="{{ $treasurer->image }}" 
                                        class="w-24 h-24 object-cover rounded-full border border-gray-200 shadow-sm">
                                @else
                                    <p class="text-gray-500 text-sm">Image not found</p>
                                @endif
                    
                                <!-- Name & Party List -->
                                <p class="text-lg font-semibold mt-2">{{ $treasurer->name }}</p>
                                <p class="text-sm text-gray-600">Party List: {{ $treasurer->partylist_name }}</p>
                    
                                <!-- Selection Button -->
                                @if(Auth::user()->role == 3 && Auth::user()->has_voted == false && Auth::user()->is_approved == true)
                                    <div class="mt-3">
                                        <input type="radio" id="treasurer_{{ $loop->index }}" name="treasurer" value="{{ $treasurer->name }}" class="hidden peer">
                                        <label for="treasurer_{{ $loop->index }}" class="cursor-pointer px-4 py-2 bg-gray-100 rounded-lg text-sm font-medium text-gray-700 peer-checked:bg-blue-500 peer-checked:text-white transition">
                                            Select
                                        </label>
                                    </div>
                                @endif
                            </div>
                            @empty 
                                <p class="text-sm text-gray-600">No Candidate Found for Treasurer</p>
                            @endforelse
                        </div>        
                    </div>                    
                    
                    <div class="space-y-4">
                        <label for="auditor" class="block font-semibold text-lg text-gray-700">Auditor</label>
                    
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                            @forelse($auditors as $auditor)
                            <div class="border border-gray-300 rounded-lg shadow-md p-4 flex flex-col items-center bg-white">
                                <!-- Image -->
                                @if(file_exists(public_path('storage/images/'.$auditor->image)))
                                    <img src="{{ asset('storage/images/'.$auditor->image) }}" 
                                        alt="{{ $auditor->image }}" 
                                        class="w-24 h-24 object-cover rounded-full border border-gray-200 shadow-sm">
                                @else
                                    <p class="text-gray-500 text-sm">Image not found</p>
                                @endif
                    
                                <!-- Name & Party List -->
                                <p class="text-lg font-semibold mt-2">{{ $auditor->name }}</p>
                                <p class="text-sm text-gray-600">Party List: {{ $auditor->partylist_name }}</p>
                    
                                <!-- Selection Button -->
                                @if(Auth::user()->role == 3 && Auth::user()->has_voted == false && Auth::user()->is_approved == true)
                                    <div class="mt-3">
                                        <input type="radio" id="auditor_{{ $loop->index }}" name="auditor" value="{{ $auditor->name }}" class="hidden peer">
                                        <label for="auditor_{{ $loop->index }}" class="cursor-pointer px-4 py-2 bg-gray-100 rounded-lg text-sm font-medium text-gray-700 peer-checked:bg-blue-500 peer-checked:text-white transition">
                                            Select
                                        </label>
                                    </div>
                                @endif
                            </div>
                            @empty 
                                <p class="text-sm text-gray-600">No Candidate Found for Auditor</p>
                            @endforelse
                        </div>
                    </div>                    
                
                    <!-- Right Column -->
                    <div class="space-y-4">
                        <label for="pio" class="block font-semibold text-lg text-gray-700">P.I.O.</label>
                    
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                            @forelse($pios as $pio)
                            <div class="border border-gray-300 rounded-lg shadow-md p-4 flex flex-col items-center bg-white">
                                <!-- Image -->
                                @if(file_exists(public_path('storage/images/'.$pio->image)))
                                    <img src="{{ asset('storage/images/'.$pio->image) }}" 
                                        alt="{{ $pio->image }}" 
                                        class="w-24 h-24 object-cover rounded-full border border-gray-200 shadow-sm">
                                @else
                                    <p class="text-gray-500 text-sm">Image not found</p>
                                @endif
                    
                                <!-- Name & Party List -->
                                <p class="text-lg font-semibold mt-2">{{ $pio->name }}</p>
                                <p class="text-sm text-gray-600">Party List: {{ $pio->partylist_name }}</p>
                    
                                <!-- Selection Button -->
                                @if(Auth::user()->role == 3 && Auth::user()->has_voted == false && Auth::user()->is_approved == true)
                                    <div class="mt-3">
                                        <input type="radio" id="pio_{{ $loop->index }}" name="pio" value="{{ $pio->name }}" class="hidden peer">
                                        <label for="pio_{{ $loop->index }}" class="cursor-pointer px-4 py-2 bg-gray-100 rounded-lg text-sm font-medium text-gray-700 peer-checked:bg-blue-500 peer-checked:text-white transition">
                                            Select
                                        </label>
                                    </div>
                                @endif
                            </div>
                            @empty 
                                <p class="text-sm text-gray-600">No Candidate Found for P.I.O</p>
                            @endforelse
                        </div>
                    </div>                    
                
                    <div class="space-y-4">
                        <!-- Business Manager 1 -->
                        <label for="business_manager_1" class="block font-semibold text-lg text-gray-700">Business Manager 1</label>
                    
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                            @forelse($business_managers as $business_manager)
                            <div class="border border-gray-300 rounded-lg shadow-md p-4 flex flex-col items-center bg-white">
                                <!-- Image -->
                                @if(file_exists(public_path('storage/images/'.$business_manager->image)))
                                    <img src="{{ asset('storage/images/'.$business_manager->image) }}" 
                                        alt="{{ $business_manager->image }}" 
                                        class="w-24 h-24 object-cover rounded-full border border-gray-200 shadow-sm">
                                @else
                                    <p class="text-gray-500 text-sm">Image not found</p>
                                @endif
                    
                                <!-- Name & Party List -->
                                <p class="text-lg font-semibold mt-2">{{ $business_manager->name }}</p>
                                <p class="text-sm text-gray-600">Party List: {{ $business_manager->partylist_name }}</p>
                    
                                <!-- Selection Button -->
                                @if(Auth::user()->role == 3 && Auth::user()->has_voted == false && Auth::user()->is_approved == true)
                                    <div class="mt-3">
                                        <input type="radio" id="business_manager_1_{{ $loop->index }}" name="business_manager_1" value="{{ $business_manager->name }}" class="hidden peer">
                                        <label for="business_manager_1_{{ $loop->index }}" class="cursor-pointer px-4 py-2 bg-gray-100 rounded-lg text-sm font-medium text-gray-700 peer-checked:bg-blue-500 peer-checked:text-white transition">
                                            Select
                                        </label>
                                    </div>
                                @endif
                            </div>
                            @empty 
                                <p class="text-sm text-gray-600">No Candidate Found for Business Manager 1</p>
                            @endforelse
                        </div>
                    
                        <!-- Business Manager 2 -->
                        <label for="business_manager_2" class="block font-semibold text-lg text-gray-700">Business Manager 2</label>
                    
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                            @forelse($business_managers as $business_manager)
                            <div class="border border-gray-300 rounded-lg shadow-md p-4 flex flex-col items-center bg-white">
                                <!-- Image -->
                                @if(file_exists(public_path('storage/images/'.$business_manager->image)))
                                    <img src="{{ asset('storage/images/'.$business_manager->image) }}" 
                                        alt="{{ $business_manager->image }}" 
                                        class="w-24 h-24 object-cover rounded-full border border-gray-200 shadow-sm">
                                @else
                                    <p class="text-gray-500 text-sm">Image not found</p>
                                @endif
                    
                                <!-- Name & Party List -->
                                <p class="text-lg font-semibold mt-2">{{ $business_manager->name }}</p>
                                <p class="text-sm text-gray-600">Party List: {{ $business_manager->partylist_name }}</p>
                    
                                <!-- Selection Button -->
                                @if(Auth::user()->role == 3 && Auth::user()->has_voted == false && Auth::user()->is_approved == true)
                                    <div class="mt-3">
                                        <input type="radio" id="business_manager_2_{{ $loop->index }}" name="business_manager_2" value="{{ $business_manager->name }}" class="hidden peer">
                                        <label for="business_manager_2_{{ $loop->index }}" class="cursor-pointer px-4 py-2 bg-gray-100 rounded-lg text-sm font-medium text-gray-700 peer-checked:bg-blue-500 peer-checked:text-white transition">
                                            Select
                                        </label>
                                    </div>
                                @endif
                            </div>
                            @empty 
                                <p class="text-sm text-gray-600">No Candidate Found for Business Manager 2</p>
                            @endforelse
                        </div>
                    </div>
                
                    <div class="space-y-4">
                        <!-- Peace Officer 1 -->
                        <label for="peace_officer_1" class="block font-semibold text-lg text-gray-700">Peace Officer 1</label>
                    
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                            @forelse($peace_officers as $peace_officer)
                            <div class="border border-gray-300 rounded-lg shadow-md p-4 flex flex-col items-center bg-white">
                                <!-- Image -->
                                @if(file_exists(public_path('storage/images/'.$peace_officer->image)))
                                    <img src="{{ asset('storage/images/'.$peace_officer->image) }}" 
                                        alt="{{ $peace_officer->image }}" 
                                        class="w-24 h-24 object-cover rounded-full border border-gray-200 shadow-sm">
                                @else
                                    <p class="text-gray-500 text-sm">Image not found</p>
                                @endif
                    
                                <!-- Name & Party List -->
                                <p class="text-lg font-semibold mt-2">{{ $peace_officer->name }}</p>
                                <p class="text-sm text-gray-600">Party List: {{ $peace_officer->partylist_name }}</p>
                    
                                <!-- Selection Button -->
                                @if(Auth::user()->role == 3 && Auth::user()->has_voted == false && Auth::user()->is_approved == true)
                                    <div class="mt-3">
                                        <input type="radio" id="peace_officer_1_{{ $loop->index }}" name="peace_officer_1" value="{{ $peace_officer->name }}" class="hidden peer">
                                        <label for="peace_officer_1_{{ $loop->index }}" class="cursor-pointer px-4 py-2 bg-gray-100 rounded-lg text-sm font-medium text-gray-700 peer-checked:bg-blue-500 peer-checked:text-white transition">
                                            Select
                                        </label>
                                    </div>
                                @endif
                            </div>
                            @empty 
                                <p class="text-sm text-gray-600">No Candidate Found for Peace Officer 1</p>
                            @endforelse
                        </div>
                    
                        <!-- Peace Officer 2 -->
                        <label for="peace_officer_2" class="block font-semibold text-lg text-gray-700">Peace Officer 2</label>
                    
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                            @forelse($peace_officers as $peace_officer)
                            <div class="border border-gray-300 rounded-lg shadow-md p-4 flex flex-col items-center bg-white">
                                <!-- Image -->
                                @if(file_exists(public_path('storage/images/'.$peace_officer->image)))
                                    <img src="{{ asset('storage/images/'.$peace_officer->image) }}" 
                                        alt="{{ $peace_officer->image }}" 
                                        class="w-24 h-24 object-cover rounded-full border border-gray-200 shadow-sm">
                                @else
                                    <p class="text-gray-500 text-sm">Image not found</p>
                                @endif
                    
                                <!-- Name & Party List -->
                                <p class="text-lg font-semibold mt-2">{{ $peace_officer->name }}</p>
                                <p class="text-sm text-gray-600">Party List: {{ $peace_officer->partylist_name }}</p>
                    
                                <!-- Selection Button -->
                                @if(Auth::user()->role == 3 && Auth::user()->has_voted == false && Auth::user()->is_approved == true)
                                    <div class="mt-3">
                                        <input type="radio" id="peace_officer_2_{{ $loop->index }}" name="peace_officer_2" value="{{ $peace_officer->name }}" class="hidden peer">
                                        <label for="peace_officer_2_{{ $loop->index }}" class="cursor-pointer px-4 py-2 bg-gray-100 rounded-lg text-sm font-medium text-gray-700 peer-checked:bg-blue-500 peer-checked:text-white transition">
                                            Select
                                        </label>
                                    </div>
                                @endif
                            </div>
                            @empty 
                                <p class="text-sm text-gray-600">No Candidate Found for Peace Officer 2</p>
                            @endforelse
                        </div>
                    </div>
                    @if(Auth::user()->role == 3 && Auth::user()->has_voted == false && Auth::user()->is_approved == true)
                        <button type="submit" class="bg-blue-600 text-white font-semibold py-1 px-3 rounded hover:bg-blue-700 mt-2 text-sm">
                            Preview Your Choices
                        </button>
                    @elseif(Auth::user()->is_approved == false)
                        <div class="grid grid-cols-4 sm:grid-cols-6 md:grid-cols-6 gap-4">
                            <div id="card" class="border border-gray-300 rounded-lg shadow-md p-4 flex flex-col items-center bg-white">
                                <p class="text-sm text-gray-600">Please request for approval to admin to cast a vote</p>
                            </div>
                        </div>
                    @elseif(Auth::user()->role == 1)
                        <div class="grid grid-cols-4 sm:grid-cols-6 md:grid-cols-6 gap-4">
                            <div id="card" class="border border-gray-300 rounded-lg shadow-md p-4 flex flex-col items-center bg-white">
                                <p class="text-sm text-gray-600">Hi admin! Nice to see you!</p>
                            </div>
                        </div>
                    @else 
                        <div class="grid grid-cols-4 sm:grid-cols-6 md:grid-cols-6 gap-4">
                            <div id="card" class="border border-gray-300 rounded-lg shadow-md p-4 flex flex-col items-center bg-white">
                                <p class="text-sm text-gray-600">You already casted a vote! Thank you!</p>
                            </div>
                        </div>
                    @endif
                </div>
            </form>

            <!-- Confirmation Section -->
            <div id="confirmation" class="mt-6 hidden">
                <h2 class="text-xl font-bold mb-4">Your Selections</h2>
                <div class="space-y-2">
                    <p><strong>President:</strong> <span id="preview-president"></span></p>
                    <p><strong>Vice President:</strong> <span id="preview-vp"></span></p>
                    <p><strong>Secretary:</strong> <span id="preview-secretary"></span></p>
                    <p><strong>Treasurer:</strong> <span id="preview-treasurer"></span></p>
                    <p><strong>P.I.O:</strong> <span id="preview-pio"></span></p>
                    <p><strong>Auditor:</strong> <span id="preview-auditor"></span></p>
                    <p><strong>Business Manager:</strong> <span id="preview-business-manager"></span></p>
                </div>
                <div class="mt-4 space-x-2">
                    <button class="bg-green-600 text-white font-semibold py-1 px-3 rounded hover:bg-green-700 text-sm" onclick="confirmSubmission()">
                        Confirm Submission
                    </button>
                    <a href="{{ route('dashboard') }}">
                        <button type="button" class="bg-gray-600 text-white font-semibold py-1 px-3 rounded hover:bg-gray-700 text-sm">
                            Go Back to Candidates
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    
</x-app-layout>
