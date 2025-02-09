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
                    <div class="space-y-1">
                        <label for="president" class="block font-semibold text-sm">President</label>
                        <select id="president" name="president" class="w-full p-1 text-sm border border-gray-300 rounded">
                            <option value="">-- Select a Candidate --</option>
                            @foreach($presidents as $president)
                                <option value="{{ $president->name }}">{{ $president->name }}</option>
                            @endforeach
                        </select>
                    </div>
                
                    <div class="space-y-1">
                        <label for="vice_president" class="block font-semibold text-sm">Vice President</label>
                        <select id="vice_president" name="vice_president" class="w-full p-1 text-sm border border-gray-300 rounded">
                            <option value="">-- Select a Candidate --</option>
                            @foreach($vice_presidents as $vice_president)
                                <option value="{{ $vice_president->name }}">{{ $vice_president->name }}</option>
                            @endforeach
                        </select>
                    </div>
                
                    <div class="space-y-1">
                        <label for="secretary" class="block font-semibold text-sm">Secretary</label>
                        <select id="secretary" name="secretary" class="w-full p-1 text-sm border border-gray-300 rounded">
                            <option value="">-- Select a Candidate --</option>
                            @foreach($secretaries as $secretary)
                                <option value="{{ $secretary->name }}">{{ $secretary->name }}</option>
                            @endforeach
                        </select>
                    </div>
                
                    <div class="space-y-1">
                        <label for="treasurer" class="block font-semibold text-sm">Treasurer</label>
                        <select id="treasurer" name="treasurer" class="w-full p-1 text-sm border border-gray-300 rounded">
                            <option value="">-- Select a Candidate --</option>
                            @foreach($treasurers as $treasurer)
                                <option value="{{ $treasurer->name }}">{{ $treasurer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="space-y-1">
                        <label for="auditor" class="block font-semibold text-sm">Auditor</label>
                        <select id="auditor" name="auditor" class="w-full p-1 text-sm border border-gray-300 rounded">
                            <option value="">-- Select a Candidate --</option>
                            @foreach($auditors as $auditor)
                                <option value="{{ $auditor->name }}">{{ $auditor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                
                    <!-- Right Column -->
                    <div class="space-y-1">
                        <label for="pio" class="block font-semibold text-sm">P.I.O.</label>
                        <select id="pio" name="pio" class="w-full p-1 text-sm border border-gray-300 rounded">
                            <option value="">-- Select a Candidate --</option>
                            @foreach($pios as $pio)
                                <option value="{{ $pio->name }}">{{ $pio->name }}</option>
                            @endforeach
                        </select>
                    </div>
                
                    <div class="space-y-1">
                        <label for="business_manager_1" class="block font-semibold text-sm">Business Manager 1</label>
                        <select id="business_manager_1" name="business_manager_1" class="w-full p-1 text-sm border border-gray-300 rounded">
                            <option value="">-- Select a Candidate --</option>
                            @foreach($business_managers as $business_manager)
                                <option value="{{ $business_manager->name }}">{{ $business_manager->name }}</option>
                            @endforeach
                        </select>
                    </div>
                
                    <div class="space-y-1">
                        <label for="business_manager_2" class="block font-semibold text-sm">Business Manager 2</label>
                        <select id="business_manager_2" name="business_manager_2" class="w-full p-1 text-sm border border-gray-300 rounded">
                            <option value="">-- Select a Candidate --</option>
                            @foreach($business_managers as $business_manager)
                                <option value="{{ $business_manager->name }}">{{ $business_manager->name }}</option>
                            @endforeach
                        </select>
                    </div>
                
                    <div class="space-y-1">
                        <label for="peace_officer_1" class="block font-semibold text-sm">Peace Officer 1</label>
                        <select id="peace_officer_1" name="peace_officer_1" class="w-full p-1 text-sm border border-gray-300 rounded">
                            <option value="">-- Select a Candidate --</option>
                            @foreach($peace_officers as $peace_officer)
                                <option value="{{ $peace_officer->name }}">{{ $peace_officer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                
                    <div class="space-y-1">
                        <label for="peace_officer_2" class="block font-semibold text-sm">Peace Officer 2</label>
                        <select id="peace_officer_2" name="peace_officer_2" class="w-full p-1 text-sm border border-gray-300 rounded">
                            <option value="">-- Select a Candidate --</option>
                            @foreach($peace_officers as $peace_officer)
                                <option value="{{ $peace_officer->name }}">{{ $peace_officer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <button type="submit" class="bg-blue-600 text-white font-semibold py-1 px-3 rounded hover:bg-blue-700 mt-2 text-sm">
                    Preview Your Choices
                </button>
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
