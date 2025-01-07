<x-app-layout>
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 h-full bg-blue-900 text-white flex flex-col p-6 overflow-y-auto">
            <a href="{{ route('dashboard') }}" class="mb-8">
                <h3 class="text-2xl font-bold">Homepage</h3>
            </a>
            <p class="mb-6"><strong>Student:</strong> {{ Auth::user()->name }}</p>
            <nav class="space-y-4">
                <a href="{{ route('ballots.index') }}" class="hover:underline block">Ballot</a>
                <a href="{{ route('dashboard') }}" class="hover:underline block">Results</a>
                <a href="{{ route('candidates.index') }}" class="hover:underline block">Registrations</a>
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
                    <label for="president" class="block font-semibold">Candidate for President ({{ isset($president_counts) ? $president_counts : 0 }}) </label>
                    <a href="{{ route('presidents.create') }}">Add Candidate</a>
                </div>

                <div class="space-y-2">
                    <label for="vice_president" class="block font-semibold">Candidate for Vice President ({{ isset($vice_president_counts) ? $vice_president_counts : 0 }})</label>
                    <a href="{{ route('vice_presidents.create') }}">Add Candidate</a>
                </div>

                <div class="space-y-2">
                    <label for="secretary" class="block font-semibold">Candidate for Secretary ({{ isset($secretary_counts) ? $secretary_counts : 0 }})</label>
                    <a href="{{ route('secretaries.create') }}">Add Candidate</a>
                </div>

                <div class="space-y-2">
                    <label for="treasurer" class="block font-semibold">Candidate for Treasurer ({{ isset($treasurer_counts) ? $treasurer_counts : 0 }})</label>
                    <a href="{{ route('treasurers.create') }}">Add Candidate</a>
                </div>

                <div class="space-y-2">
                    <label for="pio" class="block font-semibold">Candidate for P.I.O. ({{ isset($pio_counts) ? $pio_counts : 0 }})</label>
                    <a href="{{ route('pios.create') }}">Add Candidate</a>
                </div>

                <div class="space-y-2">
                    <label for="pio" class="block font-semibold">Candidate for Peace Officer ({{ isset($peace_officer_counts) ? $peace_officer_counts : 0 }})</label>
                    <a href="{{ route('peace_officers.create') }}">Add Candidate</a>
                </div>

                <div class="space-y-2">
                    <label for="auditor" class="block font-semibold">Candidate for Auditor ({{ isset($auditor_counts) ? $auditor_counts : 0 }})</label>
                    <a href="{{ route('auditors.create') }}">Add Candidate</a>
                </div>

                <div class="space-y-2">
                    <label for="business_manager" class="block font-semibold">Candidate for Business Manager ({{ isset($business_manager_counts) ? $business_manager_counts : 0 }})</label>
                    <a href="{{ route('business_managers.create') }}">Add Candidate</a>
                </div>
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
                    <button type="submit" class="bg-blue-600 text-white font-semibold py-2 px-4 rounded hover:bg-blue-700">
                        Confirm Submission
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
