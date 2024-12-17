<x-app-layout>
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 h-full bg-blue-900 text-white flex flex-col p-6 overflow-y-auto">
            <a href="{{ route('dashboard') }}" class="mb-8">
                <h3 class="text-2xl font-bold">Homepage</h3>
            </a>
            <p class="mb-6"><strong>Student:</strong> {{ Auth::user()->name }}</p>
            <nav class="space-y-4">
                <a href="ballot.html" class="hover:underline block">Vote Again</a>
                <a href="{{ route('ballots.index') }}" class="hover:underline block">Ballot</a>
                <a href="{{ route('dashboard') }}" class="hover:underline block">Results</a>
                <a href="{{ route('candidates.index') }}" class="hover:underline block">Registrations</a>
            </nav>
        </div>

        <!-- Content Section -->
        <div class="flex-grow bg-gradient-to-br bg-white text-blue-900 p-10">
            <h1 class="text-3xl font-bold mb-6">Official Ballot</h1>
            <form id="ballotForm" onsubmit="return showPreview(event)" class="space-y-6">
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
                    <label for="pio" class="block font-semibold">P.I.O.</label>
                    <select id="pio" name="pio" class="w-full p-2 border border-gray-300 rounded">
                        <option value="">-- Select a Candidate --</option>
                        @foreach($pios as $pio)
                            <option value="{{ $pio->name }}">{{ $pio->name }}</option>
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

                <!-- Repeat similar blocks for other positions -->

                <div class="space-y-2">
                    <label for="business_manager" class="block font-semibold">Business Manager</label>
                    <select id="business_manager" name="business_manager" class="w-full p-2 border border-gray-300 rounded">
                        <option value="">-- Select a Candidate --</option>
                        @foreach($business_managers as $business_manager)
                            <option value="{{ $business_manager->name }}">{{ $business_manager->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="bg-blue-600 text-white font-semibold py-2 px-4 rounded hover:bg-blue-700">
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
