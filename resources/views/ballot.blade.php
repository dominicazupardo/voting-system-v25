<x-app-layout>
@php
    // Ensure all ballot variables are always defined to avoid undefined variable errors
    $presidents = $presidents ?? collect();
    $vice_presidents = $vice_presidents ?? collect();
    $secretaries = $secretaries ?? collect();
    $treasurers = $treasurers ?? collect();
    $auditors = $auditors ?? collect();
    $pios_internal = $pios_internal ?? collect();
    $pios_external = $pios_external ?? collect();
    $business_managers_internal = $business_managers_internal ?? collect();
    $business_managers_external = $business_managers_external ?? collect();
    $peace_officers_internal = $peace_officers_internal ?? collect();
    $peace_officers_external = $peace_officers_external ?? collect();
    $rep_1st_year = $rep_1st_year ?? collect();
    $rep_2nd_year = $rep_2nd_year ?? collect();
    $rep_3rd_year = $rep_3rd_year ?? collect();
    $rep_4th_year = $rep_4th_year ?? collect();
@endphp
    <div class="flex h-screen">
        <!-- Side Bar -->
        <x-sidebar />

        <!-- Content Section -->
        <div class="flex-grow bg-gradient-to-br bg-white text-blue-900 p-6">
            <h1 class="text-xl font-bold mb-4">Official Ballot</h1>
            <form id="ballotForm" action="{{ route('ballot.preview') }}" method="POST">
                @csrf
                <div class="gap-6">
                    
                    <!-- Left Column -->
                    <div class="space-y-4">
                        <label for="president" class="block font-semibold text-lg text-gray-700">Presidents</label>
                    
                        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 gap-2">
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
                                <p class="text-md font-semibold mt-2">{{ sprintf('%s %s. %s', $president->firstname, substr($president->middlename, 0, 1), $president->lastname) }}</p>
                                <p class="text-sm text-gray-600">Party List: {{ $president->partylist_name }}</p>

                                <!-- Radio Button -->
                                @if(Auth::user()->role == 3 && Auth::user()->has_voted == false && Auth::user()->is_approved == true)
                                    <div class="mt-3">
                                        <input type="hidden" name="president_id" value="{{ $president->id }}" />
                                        <input type="radio" id="president_{{ $loop->index }}" name="president" value="{{ sprintf('%s %s. %s', $president->firstname, substr($president->middlename, 0, 1), $president->lastname) }}" class="hidden peer" class="hidden peer" onclick="toggleCardColor({{ $loop->index }})">
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
                        <label for="vice_president" class="block font-semibold text-lg text-gray-700">Vice President</label>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 gap-4">
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
                                <p class="text-md font-semibold mt-2">{{ sprintf('%s %s. %s', $vice_president->firstname, substr($vice_president->middlename, 0, 1), $vice_president->lastname) }}</p>
                                <p class="text-sm text-gray-600">Party List: {{ $vice_president->partylist_name }}</p>
                    
                                <!-- Selection Button -->
                                @if(Auth::user()->role == 3 && Auth::user()->has_voted == false && Auth::user()->is_approved == true)
                                    <div class="mt-3">
                                        <input type="hidden" name="vice_president_id" value="{{ $vice_president->id }}" />
                                        <input type="radio" id="vice_president_{{ $loop->index }}" name="vice_president" value="{{ sprintf('%s %s. %s', $vice_president->firstname, substr($vice_president->middlename, 0, 1), $vice_president->lastname) }}" class="hidden peer" class="hidden peer" onclick="toggleCardColor({{ $loop->index }})">
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

                        <label for="secretary" class="block font-semibold text-lg text-gray-700">Secretary</label>
                    
                        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 gap-4">
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
                                <p class="text-md font-semibold mt-2">{{ sprintf('%s %s. %s', $secretary->firstname, substr($secretary->middlename, 0, 1), $secretary->lastname) }}</p>
                                <p class="text-sm text-gray-600">Party List: {{ $secretary->partylist_name }}</p>
                    
                                <!-- Selection Button -->
                                @if(Auth::user()->role == 3 && Auth::user()->has_voted == false && Auth::user()->is_approved == true)
                                    <div class="mt-3">
                                        <input type="hidden" name="secretary_id" value="{{ $secretary->id }}" />
                                        <input type="radio" id="secretary_{{ $loop->index }}" name="secretary" value="{{ sprintf('%s %s. %s', $secretary->firstname, substr($secretary->middlename, 0, 1), $secretary->lastname) }}" class="hidden peer" onclick="toggleCardColor({{ $loop->index }})">
                                        <label for="secretary_{{ $loop->index }}" class="cursor-pointer px-4 py-2 bg-gray-100 rounded-lg text-sm font-medium text-gray-700 peer-checked:bg-blue-500 peer-checked:text-white transition">
                                            Select
                                        </label>
                                    </div>
                                @endif
                            </div>
                            @empty 
                                <p class="text-sm text-gray-600">No Candidate Found for Secretary</p>
                            @endforelse
                        </div>

                        <label for="treasurer" class="block font-semibold text-lg text-gray-700">Treasurer</label>

                        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 gap-4">
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
                                <p class="text-md font-semibold mt-2">{{ sprintf('%s %s. %s', $treasurer->firstname, substr($treasurer->middlename, 0, 1), $treasurer->lastname) }}</p>
                                <p class="text-sm text-gray-600">Party List: {{ $treasurer->partylist_name }}</p>

                                <!-- Radio Button -->
                                @if(Auth::user()->role == 3 && Auth::user()->has_voted == false && Auth::user()->is_approved == true)
                                    <div class="mt-3">
                                        <input type="hidden" name="treasurer_id" value="{{ $treasurer->id }}" />
                                        <input type="radio" id="treasurer_{{ $loop->index }}" name="treasurer" value="{{ sprintf('%s %s. %s', $treasurer->firstname, substr($treasurer->middlename, 0, 1), $treasurer->lastname) }}" class="hidden peer" onclick="toggleCardColor({{ $loop->index }})">
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


                        <label for="auditor" class="block font-semibold text-lg text-gray-700">Auditor</label>
                    
                        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 gap-4">
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
                                <p class="text-md font-semibold mt-2">{{ sprintf('%s %s. %s', $auditor->firstname, substr($auditor->middlename, 0, 1), $auditor->lastname) }}</p>
                                <p class="text-sm text-gray-600">Party List: {{ $auditor->partylist_name }}</p>
                    
                                <!-- Selection Button -->
                                @if(Auth::user()->role == 3 && Auth::user()->has_voted == false && Auth::user()->is_approved == true)
                                    <div class="mt-3">
                                        <input type="hidden" name="auditor_id" value="{{ $auditor->id }}" />
                                        <input type="radio" id="auditor_{{ $loop->index }}" name="auditor" value="{{ sprintf('%s %s. %s', $auditor->firstname, substr($auditor->middlename, 0, 1), $auditor->lastname) }}" class="hidden peer" onclick="toggleCardColor({{ $loop->index }})">
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

                        <!-- P.I.O. Internal -->
                        <label for="pio_internal" class="block font-semibold text-lg text-gray-700">P.I.O. Internal</label>
                        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 gap-4">
                            @forelse($pios_internal as $pio)
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
                                <p class="text-md font-semibold mt-2">{{ sprintf('%s %s. %s', $pio->firstname, substr($pio->middlename, 0, 1), $pio->lastname) }}</p>
                                <p class="text-sm text-gray-600">Party List: {{ $pio->partylist_name }}</p>
                                <!-- Selection Button -->
                                @if(Auth::user()->role == 3 && Auth::user()->has_voted == false && Auth::user()->is_approved == true)
                                    <div class="mt-3">
                                        <input type="hidden" name="pio_internal_id" value="{{ $pio->id }}" />
                                        <input type="radio" id="pio_internal_{{ $loop->index }}" name="pio_internal" value="{{ sprintf('%s %s. %s', $pio->firstname, substr($pio->middlename, 0, 1), $pio->lastname) }}" class="hidden peer" onclick="toggleCardColor({{ $loop->index }})">
                                        <label for="pio_internal_{{ $loop->index }}" class="cursor-pointer px-4 py-2 bg-gray-100 rounded-lg text-sm font-medium text-gray-700 peer-checked:bg-blue-500 peer-checked:text-white transition">
                                            Select
                                        </label>
                                    </div>
                                @endif
                            </div>
                            @empty 
                                <p class="text-sm text-gray-600">No Candidate Found for P.I.O. Internal</p>
                            @endforelse
                        </div>

                        <!-- P.I.O. External -->
                        <label for="pio_external" class="block font-semibold text-lg text-gray-700 mt-4">P.I.O. External</label>
                        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 gap-4">
                            @forelse($pios_external as $pio)
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
                                <p class="text-md font-semibold mt-2">{{ sprintf('%s %s. %s', $pio->firstname, substr($pio->middlename, 0, 1), $pio->lastname) }}</p>
                                <p class="text-sm text-gray-600">Party List: {{ $pio->partylist_name }}</p>
                                <!-- Selection Button -->
                                @if(Auth::user()->role == 3 && Auth::user()->has_voted == false && Auth::user()->is_approved == true)
                                    <div class="mt-3">
                                        <input type="hidden" name="pio_external_id" value="{{ $pio->id }}" />
                                        <input type="radio" id="pio_external_{{ $loop->index }}" name="pio_external" value="{{ sprintf('%s %s. %s', $pio->firstname, substr($pio->middlename, 0, 1), $pio->lastname) }}" class="hidden peer" onclick="toggleCardColor({{ $loop->index }})">
                                        <label for="pio_external_{{ $loop->index }}" class="cursor-pointer px-4 py-2 bg-gray-100 rounded-lg text-sm font-medium text-gray-700 peer-checked:bg-blue-500 peer-checked:text-white transition">
                                            Select
                                        </label>
                                    </div>
                                @endif
                            </div>
                            @empty 
                                <p class="text-sm text-gray-600">No Candidate Found for P.I.O. External</p>
                            @endforelse
                        </div>


                        <!-- Business Manager Internal -->
                        <label for="business_manager_internal" class="block font-semibold text-lg text-gray-700">Business Manager Internal</label>
                        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 gap-4">
                            @forelse($business_managers_internal as $business_manager)
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
                                <p class="text-md font-semibold mt-2">{{ sprintf('%s %s. %s', $business_manager->firstname, substr($business_manager->middlename, 0, 1), $business_manager->lastname) }}</p>
                                <p class="text-sm text-gray-600">Party List: {{ $business_manager->partylist_name }}</p>
                                <!-- Selection Button -->
                                @if(Auth::user()->role == 3 && Auth::user()->has_voted == false && Auth::user()->is_approved == true)
                                    <div class="mt-3">
                                        <input type="hidden" name="business_manager_internal_id" value="{{ $business_manager->id }}" />
                                        <input type="radio" id="business_manager_internal_{{ $loop->index }}" name="business_manager_internal" value="{{ sprintf('%s %s. %s', $business_manager->firstname, substr($business_manager->middlename, 0, 1), $business_manager->lastname) }}" class="hidden peer" onclick="toggleCardColor({{ $loop->index }})">
                                        <label for="business_manager_internal_{{ $loop->index }}" class="cursor-pointer px-4 py-2 bg-gray-100 rounded-lg text-sm font-medium text-gray-700 peer-checked:bg-blue-500 peer-checked:text-white transition">
                                            Select
                                        </label>
                                    </div>
                                @endif
                            </div>
                            @empty 
                                <p class="text-sm text-gray-600">No Candidate Found for Business Manager Internal</p>
                            @endforelse
                        </div>

                        <!-- Business Manager External -->
                        <label for="business_manager_external" class="block font-semibold text-lg text-gray-700">Business Manager External</label>
                        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 gap-4">
                            @forelse($business_managers_external as $business_manager)
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
                                <p class="text-md font-semibold mt-2">{{ sprintf('%s %s. %s', $business_manager->firstname, substr($business_manager->middlename, 0, 1), $business_manager->lastname) }}</p>
                                <p class="text-sm text-gray-600">Party List: {{ $business_manager->partylist_name }}</p>
                                <!-- Selection Button -->
                                @if(Auth::user()->role == 3 && Auth::user()->has_voted == false && Auth::user()->is_approved == true)
                                    <div class="mt-3">
                                        <input type="hidden" name="business_manager_external_id" value="{{ $business_manager->id }}" />
                                        <input type="radio" id="business_manager_external_{{ $loop->index }}" name="business_manager_external" value="{{ sprintf('%s %s. %s', $business_manager->firstname, substr($business_manager->middlename, 0, 1), $business_manager->lastname) }}" class="hidden peer" onclick="toggleCardColor({{ $loop->index }})">
                                        <label for="business_manager_external_{{ $loop->index }}" class="cursor-pointer px-4 py-2 bg-gray-100 rounded-lg text-sm font-medium text-gray-700 peer-checked:bg-blue-500 peer-checked:text-white transition">
                                            Select
                                        </label>
                                    </div>
                                @endif
                            </div>
                            @empty 
                                <p class="text-sm text-gray-600">No Candidate Found for Business Manager External</p>
                            @endforelse
                        </div>


                        <!-- Peace Officer Internal -->
                        <label for="peace_officer_internal" class="block font-semibold text-lg text-gray-700">Peace Officer Internal</label>
                        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 gap-4">
                            @forelse($peace_officers_internal as $peace_officer)
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
                                <p class="text-md font-semibold mt-2">{{ sprintf('%s %s. %s', $peace_officer->firstname, substr($peace_officer->middlename, 0, 1), $peace_officer->lastname) }}</p>
                                <p class="text-sm text-gray-600">Party List: {{ $peace_officer->partylist_name }}</p>
                                <!-- Selection Button -->
                                @if(Auth::user()->role == 3 && Auth::user()->has_voted == false && Auth::user()->is_approved == true)
                                    <div class="mt-3">
                                        <input type="hidden" name="peace_officer_internal_id" value="{{ $peace_officer->id }}" />
                                        <input type="radio" id="peace_officer_internal_{{ $loop->index }}" name="peace_officer_internal" value="{{ sprintf('%s %s. %s', $peace_officer->firstname, substr($peace_officer->middlename, 0, 1), $peace_officer->lastname) }}" class="hidden peer" onclick="toggleCardColor({{ $loop->index }})">
                                        <label for="peace_officer_internal_{{ $loop->index }}" class="cursor-pointer px-4 py-2 bg-gray-100 rounded-lg text-sm font-medium text-gray-700 peer-checked:bg-blue-500 peer-checked:text-white transition">
                                            Select
                                        </label>
                                    </div>
                                @endif
                            </div>
                            @empty 
                                <p class="text-sm text-gray-600">No Candidate Found for Peace Officer Internal</p>
                            @endforelse
                        </div>

                        <!-- Peace Officer External -->
                        <label for="peace_officer_external" class="block font-semibold text-lg text-gray-700">Peace Officer External</label>
                        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 gap-4">
                            @forelse($peace_officers_external as $peace_officer)
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
                                <p class="text-md font-semibold mt-2">{{ sprintf('%s %s. %s', $peace_officer->firstname, substr($peace_officer->middlename, 0, 1), $peace_officer->lastname) }}</p>
                                <p class="text-sm text-gray-600">Party List: {{ $peace_officer->partylist_name }}</p>
                                <!-- Selection Button -->
                                @if(Auth::user()->role == 3 && Auth::user()->has_voted == false && Auth::user()->is_approved == true)
                                    <div class="mt-3">
                                        <input type="hidden" name="peace_officer_external_id" value="{{ $peace_officer->id }}" />
                                        <input type="radio" id="peace_officer_external_{{ $loop->index }}" name="peace_officer_external" value="{{ sprintf('%s %s. %s', $peace_officer->firstname, substr($peace_officer->middlename, 0, 1), $peace_officer->lastname) }}" class="hidden peer" onclick="toggleCardColor({{ $loop->index }})">
                                        <label for="peace_officer_external_{{ $loop->index }}" class="cursor-pointer px-4 py-2 bg-gray-100 rounded-lg text-sm font-medium text-gray-700 peer-checked:bg-blue-500 peer-checked:text-white transition">
                                            Select
                                        </label>
                                    </div>
                                @endif
                            </div>
                            @empty 
                                <p class="text-sm text-gray-600">No Candidate Found for Peace Officer External</p>
                            @endforelse
                        </div>

                        <!-- 1st to 4th Year Representatives -->
                        <label for="rep_1st_year" class="block font-semibold text-lg text-gray-700 mt-6">1st Year Representative</label>
                        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 gap-4">
                            @forelse($rep_1st_year ?? [] as $rep)
                            <div class="border border-gray-300 rounded-lg shadow-md p-4 flex flex-col items-center bg-white">
                                <img src="{{ asset('storage/images/'.$rep->image) }}" alt="{{ $rep->image }}" class="w-24 h-24 object-cover rounded-full border border-gray-200 shadow-sm">
                                <div class="text-xs text-red-500 mt-1">Image: {{ $rep->image }}</div>
                                <p class="text-md font-semibold mt-2">{{ sprintf('%s %s. %s', $rep->firstname, substr($rep->middlename, 0, 1), $rep->lastname) }}</p>
                                <p class="text-sm text-gray-600">Party List: {{ $rep->partylist_name }}</p>
                                @if(Auth::user()->role == 3 && Auth::user()->has_voted == false && Auth::user()->is_approved == true)
                                    <div class="mt-3">
                                        <input type="hidden" name="rep_1st_year_id" value="{{ $rep->id }}" />
                                        <input type="radio" id="rep_1st_year_{{ $loop->index }}" name="rep_1st_year" value="{{ sprintf('%s %s. %s', $rep->firstname, substr($rep->middlename, 0, 1), $rep->lastname) }}" class="hidden peer" onclick="toggleCardColor({{ $loop->index }})">
                                        <label for="rep_1st_year_{{ $loop->index }}" class="cursor-pointer px-4 py-2 bg-gray-100 rounded-lg text-sm font-medium text-gray-700 peer-checked:bg-blue-500 peer-checked:text-white transition">Select</label>
                                    </div>
                                @endif
                            </div>
                            @empty
                                <p class="text-sm text-gray-600">No Candidate Found for 1st Year Representative</p>
                            @endforelse
                        </div>

                        <label for="rep_2nd_year" class="block font-semibold text-lg text-gray-700 mt-6">2nd Year Representative</label>
                        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 gap-4">
                            @forelse($rep_2nd_year ?? [] as $rep)
                            <div class="border border-gray-300 rounded-lg shadow-md p-4 flex flex-col items-center bg-white">
                                <img src="{{ asset('storage/images/'.$rep->image) }}" alt="{{ $rep->image }}" class="w-24 h-24 object-cover rounded-full border border-gray-200 shadow-sm">
                                <p class="text-md font-semibold mt-2">{{ sprintf('%s %s. %s', $rep->firstname, substr($rep->middlename, 0, 1), $rep->lastname) }}</p>
                                <p class="text-sm text-gray-600">Party List: {{ $rep->partylist_name }}</p>
                                @if(Auth::user()->role == 3 && Auth::user()->has_voted == false && Auth::user()->is_approved == true)
                                    <div class="mt-3">
                                        <input type="hidden" name="rep_2nd_year_id" value="{{ $rep->id }}" />
                                        <input type="radio" id="rep_2nd_year_{{ $loop->index }}" name="rep_2nd_year" value="{{ sprintf('%s %s. %s', $rep->firstname, substr($rep->middlename, 0, 1), $rep->lastname) }}" class="hidden peer" onclick="toggleCardColor({{ $loop->index }})">
                                        <label for="rep_2nd_year_{{ $loop->index }}" class="cursor-pointer px-4 py-2 bg-gray-100 rounded-lg text-sm font-medium text-gray-700 peer-checked:bg-blue-500 peer-checked:text-white transition">Select</label>
                                    </div>
                                @endif
                            </div>
                            @empty
                                <p class="text-sm text-gray-600">No Candidate Found for 2nd Year Representative</p>
                            @endforelse
                        </div>

                        <label for="rep_3rd_year" class="block font-semibold text-lg text-gray-700 mt-6">3rd Year Representative</label>
                        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 gap-4">
                            @forelse($rep_3rd_year ?? [] as $rep)
                            <div class="border border-gray-300 rounded-lg shadow-md p-4 flex flex-col items-center bg-white">
                                <img src="{{ asset('storage/images/'.$rep->image) }}" alt="{{ $rep->image }}" class="w-24 h-24 object-cover rounded-full border border-gray-200 shadow-sm">
                                <p class="text-md font-semibold mt-2">{{ sprintf('%s %s. %s', $rep->firstname, substr($rep->middlename, 0, 1), $rep->lastname) }}</p>
                                <p class="text-sm text-gray-600">Party List: {{ $rep->partylist_name }}</p>
                                @if(Auth::user()->role == 3 && Auth::user()->has_voted == false && Auth::user()->is_approved == true)
                                    <div class="mt-3">
                                        <input type="hidden" name="rep_3rd_year_id" value="{{ $rep->id }}" />
                                        <input type="radio" id="rep_3rd_year_{{ $loop->index }}" name="rep_3rd_year" value="{{ sprintf('%s %s. %s', $rep->firstname, substr($rep->middlename, 0, 1), $rep->lastname) }}" class="hidden peer" onclick="toggleCardColor({{ $loop->index }})">
                                        <label for="rep_3rd_year_{{ $loop->index }}" class="cursor-pointer px-4 py-2 bg-gray-100 rounded-lg text-sm font-medium text-gray-700 peer-checked:bg-blue-500 peer-checked:text-white transition">Select</label>
                                    </div>
                                @endif
                            </div>
                            @empty
                                <p class="text-sm text-gray-600">No Candidate Found for 3rd Year Representative</p>
                            @endforelse
                        </div>

                        <label for="rep_4th_year" class="block font-semibold text-lg text-gray-700 mt-6">4th Year Representative</label>
                        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 gap-4">
                            @forelse($rep_4th_year ?? [] as $rep)
                            <div class="border border-gray-300 rounded-lg shadow-md p-4 flex flex-col items-center bg-white">
                                <img src="{{ asset('storage/images/'.$rep->image) }}" alt="{{ $rep->image }}" class="w-24 h-24 object-cover rounded-full border border-gray-200 shadow-sm">
                                <p class="text-md font-semibold mt-2">{{ sprintf('%s %s. %s', $rep->firstname, substr($rep->middlename, 0, 1), $rep->lastname) }}</p>
                                <p class="text-sm text-gray-600">Party List: {{ $rep->partylist_name }}</p>
                                @if(Auth::user()->role == 3 && Auth::user()->has_voted == false && Auth::user()->is_approved == true)
                                    <div class="mt-3">
                                        <input type="hidden" name="rep_4th_year_id" value="{{ $rep->id }}" />
                                        <input type="radio" id="rep_4th_year_{{ $loop->index }}" name="rep_4th_year" value="{{ sprintf('%s %s. %s', $rep->firstname, substr($rep->middlename, 0, 1), $rep->lastname) }}" class="hidden peer" onclick="toggleCardColor({{ $loop->index }})">
                                        <label for="rep_4th_year_{{ $loop->index }}" class="cursor-pointer px-4 py-2 bg-gray-100 rounded-lg text-sm font-medium text-gray-700 peer-checked:bg-blue-500 peer-checked:text-white transition">Select</label>
                                    </div>
                                @endif
                            </div>
                            @empty
                                <p class="text-sm text-gray-600">No Candidate Found for 4th Year Representative</p>
                            @endforelse
                        </div>

                        <div class="cols-12 mt-2">
                            @if(Auth::user()->role == 3 && Auth::user()->has_voted == false && Auth::user()->is_approved == true)
                                <button type="submit" class="bg-blue-600 text-white font-semibold py-1 px-3 rounded hover:bg-blue-700 mt-2 text-sm">
                                    Preview Your Choices
                                </button>
                            @elseif(Auth::user()->is_approved == false)
                                <div class="cols-12 mt-4">
                                    <div id="card" class="border border-gray-300 rounded-lg shadow-md p-4 flex flex-col items-center bg-white">
                                        <p class="text-sm text-gray-600">Please request for approval to admin to cast a vote</p>
                                    </div>
                                </div>
                            @elseif(Auth::user()->role == 1)
                                <div class="cols-12 mt-4">
                                    <div id="card" class="border border-gray-300 rounded-lg shadow-md p-4 flex flex-col items-center bg-white">
                                        <p class="text-sm text-gray-600">Hi admin! Nice to see you!</p>
                                    </div>
                                </div>
                            @else 
                                <div class="cols-12 mt-4">
                                    <div id="card" class="border border-gray-300 rounded-lg shadow-md p-4 flex flex-col items-center bg-white">
                                        <p class="text-sm text-gray-600">You already casted a vote! Thank you!</p>
                                    </div>
                                </div>
                            @endif
                        </div>

                    </div>
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
                    <p><strong>P.I.O. Internal:</strong> <span id="preview-pio-internal"></span></p>
                    <p><strong>P.I.O. External:</strong> <span id="preview-pio-external"></span></p>
                    <p><strong>Auditor:</strong> <span id="preview-auditor"></span></p>
                    <p><strong>Business Manager Internal:</strong> <span id="preview-business-manager-internal"></span></p>
                    <p><strong>Business Manager External:</strong> <span id="preview-business-manager-external"></span></p>
                    <p><strong>Peace Officer Internal:</strong> <span id="preview-peace-officer-internal"></span></p>
                    <p><strong>Peace Officer External:</strong> <span id="preview-peace-officer-external"></span></p>
                    <p><strong>1st Year Representative:</strong> <span id="preview-rep-1st-year"></span></p>
                    <p><strong>2nd Year Representative:</strong> <span id="preview-rep-2nd-year"></span></p>
                    <p><strong>3rd Year Representative:</strong> <span id="preview-rep-3rd-year"></span></p>
                    <p><strong>4th Year Representative:</strong> <span id="preview-rep-4th-year"></span></p>
                </div>
                <div class="mt-4 space-x-2  ">
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

<script>
// Helper to update preview fields for all ballot positions
document.addEventListener('DOMContentLoaded', function() {
    const previewMap = {
        president: 'preview-president',
        vice_president: 'preview-vp',
        secretary: 'preview-secretary',
        treasurer: 'preview-treasurer',
        auditor: 'preview-auditor',
        pio_internal: 'preview-pio-internal',
        pio_external: 'preview-pio-external',
        business_manager_internal: 'preview-business-manager-internal',
        business_manager_external: 'preview-business-manager-external',
        peace_officer_internal: 'preview-peace-officer-internal',
        peace_officer_external: 'preview-peace-officer-external',
        rep_1st_year: 'preview-rep-1st-year',
        rep_2nd_year: 'preview-rep-2nd-year',
        rep_3rd_year: 'preview-rep-3rd-year',
        rep_4th_year: 'preview-rep-4th-year',
    };

    Object.keys(previewMap).forEach(function(field) {
        const radios = document.getElementsByName(field);
        radios.forEach(function(radio) {
            radio.addEventListener('change', function() {
                document.getElementById(previewMap[field]).textContent = radio.value;
            });
            // Set preview if already checked (on reload)
            if (radio.checked) {
                document.getElementById(previewMap[field]).textContent = radio.value;
            }
        });
    });
});

// Optionally, you can call this to show the confirmation section and hide the form
function confirmSubmission() {
    document.getElementById('confirmation').classList.remove('hidden');
    document.getElementById('ballotForm').classList.add('hidden');
}
</script>
