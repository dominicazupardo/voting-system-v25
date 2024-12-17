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
                <a href="{{ route('candidates.index') }}" class="hover:underline block">Candidates</a>
            </nav>
        </div>

        <!-- Content Section -->
        <div class="flex-grow bg-gradient-to-br bg-white text-blue-900 p-10">
            <h1 class="text-3xl font-bold mb-6">Registration of Candidates</h1>
            <a href="">
                <h2 class="text-2xl font-bold mb-6">Show All List of Candidates</h2>
            </a>
            <form id="ballotForm" onsubmit="return showPreview(event)" class="space-y-6">
                <div class="space-y-2">
                    <label for="president" class="block font-semibold">Candidate for President</label>
                    <a href="">Add Candidate</a> | <a href="">Show List of Candidates</a>
                </div>

                <div class="space-y-2">
                    <label for="vice_president" class="block font-semibold">Candidate for Vice President</label>
                    <a href="">Add Candidate</a> | <a href="">Show List of Candidates</a>
                </div>

                <div class="space-y-2">
                    <label for="secretary" class="block font-semibold">Candidate for Secretary</label>
                    <a href="">Add Candidate</a> | <a href="">Show List of Candidates</a>
                </div>

                <div class="space-y-2">
                    <label for="treasurer" class="block font-semibold">Candidate for Treasurer</label>
                    <a href="">Add Candidate</a> | <a href="">Show List of Candidates</a>
                </div>

                <div class="space-y-2">
                    <label for="pio" class="block font-semibold">Candidate for P.I.O.</label>
                    <a href="">Add Candidate</a> | <a href="">Show List of Candidates</a>
                </div>

                <div class="space-y-2">
                    <label for="auditor" class="block font-semibold">Candidate for Auditor</label>
                    <a href="">Add Candidate</a> | <a href="">Show List of Candidates</a>
                </div>

                <div class="space-y-2">
                    <label for="business_manager" class="block font-semibold">Candidate for Business Manager</label>
                    <a href="">Add Candidate</a> | <a href="">Show List of Candidates</a>
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
