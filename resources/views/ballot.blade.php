<x-app-layout>
    <div class="flex h-screen">
        <!-- Side Bar -->
        <x-sidebar />

        <!-- Content Section -->
        <div class="flex-grow bg-gradient-to-br bg-white text-blue-900 p-10">
            <h1 class="text-3xl font-bold mb-6">Official Ballot</h1>
            <form id="ballotForm" action="{{ route('ballot.preview') }}" method="POST">
                @csrf
                <div class="space-y-2">
                    <label for="president" class="block font-semibold">President</label>
                    <select id="president" name="president" class="w-full p-2 border border-gray-300 rounded">
                        <option value="">-- Select a Candidate --</option>
                        @foreach($presidents as $president)
                            <option value="{{ $president->name }}">{{ $president->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="space-y-2">
                    <label for="vice_president" class="block font-semibold">Vice President</label>
                    <select id="vice_president" name="vice_president" class="w-full p-2 border border-gray-300 rounded">
                        <option value="">-- Select a Candidate --</option>
                        @foreach($vice_presidents as $vice_president)
                            <option value="{{ $vice_president->name }}">{{ $vice_president->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="space-y-2">
                    <label for="secretary" class="block font-semibold">Secretary</label>
                    <select id="secretary" name="secretary" class="w-full p-2 border border-gray-300 rounded">
                        <option value="">-- Select a Candidate --</option>
                        @foreach($secretaries as $secretary)
                            <option value="{{ $secretary->name }}">{{ $secretary->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="space-y-2">
                    <label for="treasurer" class="block font-semibold">Treasurer</label>
                    <select id="treasurer" name="treasurer" class="w-full p-2 border border-gray-300 rounded">
                        <option value="">-- Select a Candidate --</option>
                        @foreach($treasurers as $treasurer)
                            <option value="{{ $treasurer->name }}">{{ $treasurer->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="space-y-2">
                    <label for="auditor" class="block font-semibold">Auditor</label>
                    <select id="auditor" name="auditor" class="w-full p-2 border border-gray-300 rounded">
                        <option value="">-- Select a Candidate --</option>
                        @foreach($auditors as $auditor)
                            <option value="{{ $auditor->name }}">{{ $auditor->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="space-y-2">
                    <label for="pio" class="block font-semibold">P.I.O.</label>
                    <select id="pio" name="pio" class="w-full p-2 border border-gray-300 rounded">
                        <option value="">-- Select a Candidate --</option>
                        @foreach($pios as $pio)
                            <option value="{{ $pio->name }}">{{ $pio->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Repeat similar blocks for other positions -->

                <div class="space-y-2">
                    <label for="business_manager_1" class="block font-semibold">Business Manager 1</label>
                    <select id="business_manager_1" name="business_manager_1" class="w-full p-2 border border-gray-300 rounded">
                        <option value="">-- Select a Candidate --</option>
                        @foreach($business_managers as $business_manager)
                            <option value="{{ $business_manager->name }}">{{ $business_manager->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="space-y-2">
                    <label for="business_manager_2" class="block font-semibold">Business Manager 2</label>
                    <select id="business_manager_2" name="business_manager_2" class="w-full p-2 border border-gray-300 rounded">
                        <option value="">-- Select a Candidate --</option>
                        @foreach($business_managers as $business_manager)
                            <option value="{{ $business_manager->name }}">{{ $business_manager->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="space-y-2">
                    <label for="peace_officer_1" class="block font-semibold">Peace Officer 1</label>
                    <select id="peace_officer_1" name="peace_officer_1" class="w-full p-2 border border-gray-300 rounded">
                        <option value="">-- Select a Candidate --</option>
                        @foreach($peace_officers as $peace_officer)
                            <option value="{{ $peace_officer->name }}">{{ $peace_officer->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="space-y-2">
                    <label for="peace_officer_2" class="block font-semibold">Peace Officer 2</label>
                    <select id="peace_officer_2" name="peace_officer_2" class="w-full p-2 border border-gray-300 rounded">
                        <option value="">-- Select a Candidate --</option>
                        @foreach($peace_officers as $peace_officer)
                            <option value="{{ $peace_officer->name }}">{{ $peace_officer->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <button type="submit" class="bg-blue-600 text-white font-semibold py-2 px-4 rounded hover:bg-blue-700 mt-2">
                    Preview Your Choices
                </button>
            </form>

            <!-- Confirmation Section -->
            <div id="confirmation" class="mt-10 hidden">
                <h2 class="text-2xl font-bold mb-6">Your Selections</h2>
                <div class="space-y-4">
                    <p><strong>President:</strong> <span id="preview-president"></span></p>
                    <p><strong>Vice President:</strong> <span id="preview-vp"></span></p>
                    <p><strong>Secretary:</strong> <span id="preview-secretary"></span></p>
                    <p><strong>Treasurer:</strong> <span id="preview-treasurer"></span></p>
                    <p><strong>P.I.O:</strong> <span id="preview-pio"></span></p>
                    <p><strong>Auditor:</strong> <span id="preview-auditor"></span></p>
                    <p><strong>Business Manager:</strong> <span id="preview-business-manager"></span></p>
                </div>
                <div class="mt-6 space-x-4">
                    <button class="bg-green-600 text-white font-semibold py-2 px-4 rounded hover:bg-green-700" onclick="confirmSubmission()">
                        Confirm Submission
                    </button>
                    <a href="{{ route('dashboard') }}">
                        <button type="button" class="bg-gray-600 text-white font-semibold py-2 px-4 rounded hover:bg-gray-700">
                            Go Back to Candidates
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
