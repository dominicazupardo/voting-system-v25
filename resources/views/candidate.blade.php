<x-app-layout>
    <div class="flex min-h-screen bg-gradient-to-br from-blue-50 to-blue-100">
        <!-- Side Bar -->
        <x-sidebar />
        <!-- Content Section -->
        <div class="flex-grow flex items-center justify-center">
            <div class="w-full max-w-2xl bg-white rounded-xl shadow-lg p-10">
                <h1 class="text-2xl font-bold mb-6 text-center text-blue-900">Registration of Candidates</h1>
                <a href="" class="block text-center mb-6">
                    <h2 class="text-xl font-bold text-blue-700 underline">Show All List of Candidates</h2>
                </a>
                <div class="space-y-6">
                    <div class="flex items-center justify-between border-b pb-2">
                        <span class="font-semibold">Candidate for President ({{ isset($president_counts) ? $president_counts : 0 }})</span>
                        <a href="{{ route('presidents.create') }}" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 transition">Add Candidate</a>
                    </div>
                    <div class="flex items-center justify-between border-b pb-2">
                        <span class="font-semibold">Candidate for Vice President ({{ isset($vice_president_counts) ? $vice_president_counts : 0 }})</span>
                        <a href="{{ route('vice_presidents.create') }}" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 transition">Add Candidate</a>
                    </div>
                    <div class="flex items-center justify-between border-b pb-2">
                        <span class="font-semibold">Candidate for Secretary ({{ isset($secretary_counts) ? $secretary_counts : 0 }})</span>
                        <a href="{{ route('secretaries.create') }}" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 transition">Add Candidate</a>
                    </div>
                    <div class="flex items-center justify-between border-b pb-2">
                        <span class="font-semibold">Candidate for Treasurer ({{ isset($treasurer_counts) ? $treasurer_counts : 0 }})</span>
                        <a href="{{ route('treasurers.create') }}" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 transition">Add Candidate</a>
                    </div>
                    <div class="flex items-center justify-between border-b pb-2">
                        <span class="font-semibold">Candidate for Auditor ({{ isset($auditor_counts) ? $auditor_counts : 0 }})</span>
                        <a href="{{ route('auditors.create') }}" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 transition">Add Candidate</a>
                    </div>
                    <div class="flex items-center justify-between border-b pb-2">
                        <span class="font-semibold">Candidate for P.I.O. ({{ isset($pio_counts) ? $pio_counts : 0 }})</span>
                        <a href="{{ route('pios.create') }}" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 transition">Add Candidate</a>
                    </div>
                    <div class="flex items-center justify-between border-b pb-2">
                        <span class="font-semibold">Candidate for Business Manager ({{ isset($business_manager_counts) ? $business_manager_counts : 0 }})</span>
                        <a href="{{ route('business_managers.create') }}" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 transition">Add Candidate</a>
                    </div>
                    <div class="flex items-center justify-between border-b pb-2">
                        <span class="font-semibold">Candidate for Peace Officer ({{ isset($peace_officer_counts) ? $peace_officer_counts : 0 }})</span>
                        <a href="{{ route('peace_officers.create') }}" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 transition">Add Candidate</a>
                    </div>
                    <div class="flex items-center justify-between border-b pb-2">
                        <span class="font-semibold">Candidate for 1st Year Representative ({{ isset($rep_1st_year_counts) ? $rep_1st_year_counts : 0 }})</span>
                        <a href="{{ route('representative.create', ['year' => '1st Year']) }}" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 transition">Add Candidate</a>
                    </div>
                    <div class="flex items-center justify-between border-b pb-2">
                        <span class="font-semibold">Candidate for 2nd Year Representative ({{ isset($rep_2nd_year_counts) ? $rep_2nd_year_counts : 0 }})</span>
                        <a href="{{ route('representative.create', ['year' => '2nd Year']) }}" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 transition">Add Candidate</a>
                    </div>
                    <div class="flex items-center justify-between border-b pb-2">
                        <span class="font-semibold">Candidate for 3rd Year Representative ({{ isset($rep_3rd_year_counts) ? $rep_3rd_year_counts : 0 }})</span>
                        <a href="{{ route('representative.create', ['year' => '3rd Year']) }}" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 transition">Add Candidate</a>
                    </div>
                    <div class="flex items-center justify-between border-b pb-2">
                        <span class="font-semibold">Candidate for 4th Year Representative ({{ isset($rep_4th_year_counts) ? $rep_4th_year_counts : 0 }})</span>
                        <a href="{{ route('representative.create', ['year' => '4th Year']) }}" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 transition">Add Candidate</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-footer />
</x-app-layout>
