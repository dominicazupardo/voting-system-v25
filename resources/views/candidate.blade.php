<x-app-layout>
    <div class="flex h-screen">
        <!-- Side Bar -->
        <x-sidebar />

        <!-- Content Section -->
        <div class="flex-grow bg-gradient-to-br bg-white text-blue-900 p-6">
            <h1 class="text-2xl font-bold mb-4">Registration of Candidates</h1>
            <a href="">
                <h2 class="text-xl font-bold mb-4">Show All List of Candidates</h2>
            </a>
            <form id="ballotForm" onsubmit="return showPreview(event)" class="space-y-4">
                <div class="space-y-1">
                    <label for="president" class="block text-md font-semibold">Candidate for President ({{ isset($president_counts) ? $president_counts : 0 }})</label>
                    <a href="{{ route('presidents.create') }}" class="text-md text-blue-600 hover:underline">Add Candidate</a>
                </div>

                <div class="space-y-1">
                    <label for="vice_president" class="block text-md font-semibold">Candidate for Vice President ({{ isset($vice_president_counts) ? $vice_president_counts : 0 }})</label>
                    <a href="{{ route('vice_presidents.create') }}" class="text-md text-blue-600 hover:underline">Add Candidate</a>
                </div>

                <div class="space-y-1">
                    <label for="secretary" class="block text-md font-semibold">Candidate for Secretary ({{ isset($secretary_counts) ? $secretary_counts : 0 }})</label>
                    <a href="{{ route('secretaries.create') }}" class="text-md text-blue-600 hover:underline">Add Candidate</a>
                </div>

                <div class="space-y-1">
                    <label for="treasurer" class="block text-md font-semibold">Candidate for Treasurer ({{ isset($treasurer_counts) ? $treasurer_counts : 0 }})</label>
                    <a href="{{ route('treasurers.create') }}" class="text-md text-blue-600 hover:underline">Add Candidate</a>
                </div>

                <div class="space-y-1">
                    <label for="auditor" class="block text-md font-semibold">Candidate for Auditor ({{ isset($auditor_counts) ? $auditor_counts : 0 }})</label>
                    <a href="{{ route('auditors.create') }}" class="text-md text-blue-600 hover:underline">Add Candidate</a>
                </div>

                <div class="space-y-1">
                    <label for="pio" class="block text-md font-semibold">Candidate for P.I.O. ({{ isset($pio_counts) ? $pio_counts : 0 }})</label>
                    <a href="{{ route('pios.create') }}" class="text-md text-blue-600 hover:underline">Add Candidate</a>
                </div>

                <div class="space-y-1">
                    <label for="business_manager" class="block text-md font-semibold">Candidate for Business Manager ({{ isset($business_manager_counts) ? $business_manager_counts : 0 }})</label>
                    <a href="{{ route('business_managers.create') }}" class="text-md text-blue-600 hover:underline">Add Candidate</a>
                </div>

                <div class="space-y-1">
                    <label for="peace_officer" class="block text-md font-semibold">Candidate for Peace Officer ({{ isset($peace_officer_counts) ? $peace_officer_counts : 0 }})</label>
                    <a href="{{ route('peace_officers.create') }}" class="text-md text-blue-600 hover:underline">Add Candidate</a>
                </div>
            </form>

            <!-- Confirmation Section -->
            <div id="confirmation" class="mt-8 hidden">
                <h2 class="text-xl font-bold mb-4">Your Selections</h2>
                <div class="space-y-2 text-md">
                    <p><strong>President:</strong> <span id="preview-president"></span></p>
                    <p><strong>Vice President:</strong> <span id="preview-vp"></span></p>
                    <p><strong>Secretary:</strong> <span id="preview-secretary"></span></p>
                    <p><strong>Treasurer:</strong> <span id="preview-treasurer"></span></p>
                    <p><strong>P.I.O:</strong> <span id="preview-pio"></span></p>
                    <p><strong>Auditor:</strong> <span id="preview-auditor"></span></p>
                    <p><strong>Business Manager:</strong> <span id="preview-business-manager"></span></p>
                </div>
                <div class="mt-4 space-x-4">
                    <button type="submit" class="bg-blue-600 text-white font-semibold py-1 px-2 rounded hover:bg-blue-700 text-md">
                        Confirm Submission
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
