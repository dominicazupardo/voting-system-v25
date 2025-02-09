<x-app-layout>
    <style>
        table tbody tr.first-row {
            background-color: #ffffff;
            color: green;
        }

        tr.color-blue {
            background-color: #87CEEB; color:white;
        }
    </style>
    <div class="flex h-screen">
        <!-- Side Bar -->
        <x-sidebar />

        <!-- Content Section -->
        <div class="flex-grow bg-gradient-to-br bg-white text-blue-900 p-10">
            <h1 class="text-xl font-bold text-blue-900 mb-4">Election Results</h1>
            <div class="overflow-hidden bg-white text-blue-900 rounded-lg shadow-lg">
    <div class="flex space-x-4">
        <!-- First Table: President, Vice President, Secretary  ... PIO -->
        <div class="flex-1">
            <table class="border-collapse text-sm w-full">
                <thead class="bg-blue-900 text-white">
                    <tr>
                        <th class="px-4 py-2 text-left">Candidate ID.</th>
                        <th class="px-4 py-2 text-left">Candidate</th>
                        <th class="px-4 py-2 text-left">Votes</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="color-blue">
                        <td class="px-4 py-2" colspan="3">
                            <h1 class="text-base">President</h1>
                        </td>
                    </tr>
                    @forelse($presidents as $index => $president)
                        <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-green-800' }}">
                            <td class="px-4 py-2">{{ sprintf("PR-%s-00%s", date('Y'), $president->id) }}</td>
                            <td class="px-4 py-2">{{ $president->name }}</td>
                            <td class="px-4 py-2">{{ $president->votes }}</td>
                        </tr>
                    @empty
                        <tr class="border-b bg-white text-blue-900">
                            <td class="px-4 py-2" colspan="3">No Candidate for President</td>
                        </tr>
                    @endforelse

                    <tr class="color-blue">
                        <td class="px-4 py-2" colspan="3">
                            <h1 class="text-base">Vice President</h1>
                        </td>
                    </tr>
                    
                    @forelse($vice_presidents as $index => $vice_president)
                        <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-green-800' }}">
                            <td class="px-4 py-2">{{ sprintf("VP-%s-00%s", date('Y'), $vice_president->id) }}</td>
                            <td class="px-4 py-2">{{ $vice_president->name }}</td>
                            <td class="px-4 py-2">{{ $vice_president->votes }}</td>
                        </tr>
                    @empty
                        <tr class="border-b bg-white text-blue-900">
                            <td class="px-4 py-2" colspan="3">No Candidate for VicePresident</td>
                        </tr>
                    @endforelse

                    <tr class="color-blue">
                        <td class="px-4 py-2" colspan="3">
                            <h1 class="text-base">Secretary</h1>
                        </td>
                    </tr>

                    
                    @forelse($secretaries as $index => $secretary)
                        <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-green-800' }}">
                            <td class="px-4 py-2">{{ sprintf("TR-%s-00%s", date('Y'), $secretary->id) }}</td>
                            <td class="px-4 py-2">{{ $secretary->name }}</td>
                            <td class="px-4 py-2">{{ $secretary->votes }}</td>
                        </tr>
                    @empty
                        <tr class="border-b bg-white text-blue-900">
                            <td class="px-4 py-2" colspan="3">No Candidate for Secretary</td>
                        </tr>
                    @endforelse

                    <tr class="color-blue">
                        <td class="px-4 py-2" colspan="3">
                            <h1 class="text-base">Treasurer</h1>
                        </td>
                    </tr>

                    
                    @forelse($treasurers as $index => $treasurer)
                        <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-green-800' }}">
                            <td class="px-4 py-2">{{ sprintf("TR-%s-00%s", date('Y'), $treasurer->id) }}</td>
                            <td class="px-4 py-2">{{ $treasurer->name }}</td>
                            <td class="px-4 py-2">{{ $treasurer->votes }}</td>
                        </tr>
                    @empty
                        <tr class="border-b bg-white text-blue-900">
                            <td class="px-4 py-2" colspan="3">No Candidate for Treasurer</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Second Table: Peace Officer 1, Peace Officer 2, Business Managers 1, Business Managers 2, Auditor -->
        <div class="flex-1">
            <table class="border-collapse text-sm w-full">
                <thead class="bg-blue-900 text-white">
                    <tr>
                        <th class="px-4 py-2 text-left">Candidate ID.</th>
                        <th class="px-4 py-2 text-left">Candidate</th>
                        <th class="px-4 py-2 text-left">Votes</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="color-blue">
                        <td class="px-4 py-2" colspan="3">
                            <h1 class="text-base">Auditor</h1>
                        </td>
                    </tr>

                    @forelse($auditors as $index => $auditor)
                        <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-green-800' }}">
                            <td class="px-4 py-2">{{ sprintf("AU-%s-00%s", date('Y'), $auditor->id) }}</td>
                            <td class="px-4 py-2">{{ $auditor->name }}</td>
                            <td class="px-4 py-2">{{ $auditor->votes }}</td>
                        </tr>
                    @empty
                        <tr class="border-b bg-white text-blue-900">
                            <td class="px-4 py-2" colspan="3">No Candidate for Auditor</td>
                        </tr>
                    @endforelse

                    <tr class="color-blue">
                        <td class="px-4 py-2" colspan="3">
                            <h1 class="text-base">P.I.O</h1>
                        </td>
                    </tr>

                    <!-- Add similar code blocks for PIO -->
                    @forelse($pios as $index => $pio)
                        <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-green-800' }}">
                            <td class="px-4 py-2">{{ sprintf("PI-%s-00%s", date('Y'), $pio->id) }}</td>
                            <td class="px-4 py-2">{{ $pio->name }}</td>
                            <td class="px-4 py-2">{{ $pio->votes }}</td>
                        </tr>
                    @empty
                        <tr class="border-b bg-white text-blue-900">
                            <td class="px-4 py-2" colspan="3">No Candidate for P.I.O</td>
                        </tr>
                    @endforelse

                    <tr class="color-blue">
                        <td class="px-4 py-2" colspan="3">
                            <h1 class="text-base">Peace Officer</h1>
                        </td>
                    </tr>
                    @forelse($peace_officers as $index => $peace_officer)
                        <tr class="{{ $index < 2 ? 'first-row' : 'bg-white text-green-800' }}">
                            <td class="px-4 py-2">{{ sprintf("PO-%s-00%s", date('Y'), $peace_officer->id) }}</td>
                            <td class="px-4 py-2">{{ $peace_officer->name }}</td>
                            <td class="px-4 py-2">{{ $peace_officer->votes }}</td>
                        </tr>
                    @empty
                        <tr class="border-b bg-white text-blue-900">
                            <td class="px-4 py-2" colspan="3">No Candidate for Business Manager</td>
                        </tr>
                    @endforelse

                    <tr class="color-blue">
                        <td class="px-4 py-2" colspan="3">
                            <h1 class="text-base">Business Manager</h1>
                        </td>
                    </tr>
                    @forelse($business_managers as $index => $business_manager)
                        <tr class="{{ $index < 2 ? 'first-row' : 'bg-white text-green-800' }}">
                            <td class="px-4 py-2">{{ sprintf("BM-%s-00%s", date('Y'), $business_manager->id) }}</td>
                            <td class="px-4 py-2">{{ $business_manager->name }}</td>
                            <td class="px-4 py-2">{{ $business_manager->votes }}</td>
                        </tr>
                    @empty
                        <tr class="border-b bg-white text-blue-900">
                            <td class="px-4 py-2" colspan="3">No Candidate for Business Manager</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

            <a href="{{ route('ballots.index') }}" class="mt-2">
                <button class="mt-4 bg-orange-500 hover:bg-orange-600 text-white font-semibold py-1 px-3 rounded text-sm">
                    Go Back to Ballot
                </button>
            </a>
        </div>
    </div>
</x-app-layout>
