<x-app-layout>
    <style>
        table tbody tr.first-row {
            background-color: #ffffff;
            color: #0000ff;
            border: #0000ff dashed 1px;
        }

        tr.color-blue {
            background-color: :#ffffff;
        }
    </style>
    <div class="flex h-screen">
        <!-- Side Bar -->
        <x-sidebar />

        @if(Auth::user()->role === 3)
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
                                    <th class="px-4 py-2 text-left">Votes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="color-blue">
                                    <td class="px-4 py-2" colspan="3">
                                        <label for="peace_officer_2" class="block font-semibold text-lg text-gray-700">President</label>
                                    </td>
                                </tr>
                                @forelse($presidents as $index => $president)
                                    <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-grey-800' }}">
                                        <td class="px-4 py-2">{{ sprintf("PR-%s-00%s", date('Y'), $president->id) }}</td>
                                        <td class="px-4 py-2">{{ $president->votes }}</td>
                                    </tr>
                                @empty
                                    <tr class="border-b bg-white text-blue-900">
                                        <td class="px-4 py-2" colspan="3">No Candidate for President</td>
                                    </tr>
                                @endforelse

                                <tr class="color-blue">
                                    <td class="px-4 py-2" colspan="3">
                                        <label for="peace_officer_2" class="block font-semibold text-lg text-gray-700">Vice President</label>
                                    </td>
                                </tr>
                                
                                @forelse($vice_presidents as $index => $vice_president)
                                    <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-grey-800' }}">
                                        <td class="px-4 py-2">{{ sprintf("VP-%s-00%s", date('Y'), $vice_president->id) }}</td>
                                        <td class="px-4 py-2">{{ $vice_president->votes }}</td>
                                    </tr>
                                @empty
                                    <tr class="border-b bg-white text-blue-900">
                                        <td class="px-4 py-2" colspan="3">No Candidate for VicePresident</td>
                                    </tr>
                                @endforelse

                                <tr class="color-blue">
                                    <td class="px-4 py-2" colspan="3">
                                        <label for="peace_officer_2" class="block font-semibold text-lg text-gray-700">Secretary</label>
                                    </td>
                                </tr>

                                
                                @forelse($secretaries as $index => $secretary)
                                    <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-grey-800' }}">
                                        <td class="px-4 py-2">{{ sprintf("TR-%s-00%s", date('Y'), $secretary->id) }}</td>
                                        <td class="px-4 py-2">{{ $secretary->votes }}</td>
                                    </tr>
                                @empty
                                    <tr class="border-b bg-white text-blue-900">
                                        <td class="px-4 py-2" colspan="3">No Candidate for Secretary</td>
                                    </tr>
                                @endforelse

                                <tr class="color-blue">
                                    <td class="px-4 py-2" colspan="3">
                                        <label for="peace_officer_2" class="block font-semibold text-lg text-gray-700">Treasurer</label>
                                    </td>
                                </tr>

                                
                                @forelse($treasurers as $index => $treasurer)
                                    <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-grey-800' }}">
                                        <td class="px-4 py-2">{{ sprintf("TR-%s-00%s", date('Y'), $treasurer->id) }}</td>
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
                                    <th class="px-4 py-2 text-left">Votes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="color-blue">
                                    <td class="px-4 py-2" colspan="3">
                                        <label for="peace_officer_2" class="block font-semibold text-lg text-gray-700">Auditor</label>
                                    </td>
                                </tr>

                                @forelse($auditors as $index => $auditor)
                                    <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-grey-800' }}">
                                        <td class="px-4 py-2">{{ sprintf("AU-%s-00%s", date('Y'), $auditor->id) }}</td>
                                        <td class="px-4 py-2">{{ $auditor->votes }}</td>
                                    </tr>
                                @empty
                                    <tr class="border-b bg-white text-blue-900">
                                        <td class="px-4 py-2" colspan="3">No Candidate for Auditor</td>
                                    </tr>
                                @endforelse

                                <tr class="color-blue">
                                    <td class="px-4 py-2" colspan="3">
                                        <label for="peace_officer_2" class="block font-semibold text-lg text-gray-700">P.I.O</label>
                                    </td>
                                </tr>

                                <!-- Add similar code blocks for PIO -->
                                @forelse($pios as $index => $pio)
                                    <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-grey-800' }}">
                                        <td class="px-4 py-2">{{ sprintf("PI-%s-00%s", date('Y'), $pio->id) }}</td>
                                        <td class="px-4 py-2">{{ $pio->votes }}</td>
                                    </tr>
                                @empty
                                    <tr class="border-b bg-white text-blue-900">
                                        <td class="px-4 py-2" colspan="3">No Candidate for P.I.O</td>
                                    </tr>
                                @endforelse

                                <tr class="color-blue">
                                    <td class="px-4 py-2" colspan="3">
                                        <label for="peace_officer_2" class="block font-semibold text-lg text-gray-700">Peace Officer</label>
                                    </td>
                                </tr>
                                @forelse($peace_officers as $index => $peace_officer)
                                    <tr class="{{ $index < 2 ? 'first-row' : 'bg-white text-grey-800' }}">
                                        <td class="px-4 py-2">{{ sprintf("PO-%s-00%s", date('Y'), $peace_officer->id) }}</td>
                                        <td class="px-4 py-2">{{ $peace_officer->votes }}</td>
                                    </tr>
                                @empty
                                    <tr class="border-b bg-white text-blue-900">
                                        <td class="px-4 py-2" colspan="3">No Candidate for Business Manager</td>
                                    </tr>
                                @endforelse

                                <tr class="color-blue">
                                    <td class="px-4 py-2" colspan="3">
                                        <label for="peace_officer_2" class="block font-semibold text-lg text-gray-700">Business Manager</label>
                                    </td>
                                </tr>
                                @forelse($business_managers as $index => $business_manager)
                                    <tr class="{{ $index < 2 ? 'first-row' : 'bg-white text-grey-800' }}">
                                        <td class="px-4 py-2">{{ sprintf("BM-%s-00%s", date('Y'), $business_manager->id) }}</td>
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
                <button class="mt-4 bg-blue-900 hover:bg-blue-800 text-white font-semibold py-1 px-3 rounded text-sm">
                    Go Back to Ballot
                </button>
            </a>
        </div>
        @elseif(Auth::user()->role === 1)
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
                                    <th class="px-4 py-2 text-left">Candidate Name</th>
                                    <th class="px-4 py-2 text-left">Partylist</th>
                                    <th class="px-4 py-2 text-left">Votes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="color-blue">
                                    <td class="px-4 py-2" colspan="4">
                                        <label for="peace_officer_2" class="block font-semibold text-lg text-gray-700">President</label>
                                    </td>
                                </tr>
                                @forelse($presidents as $index => $president)
                                    <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-grey-800' }}">
                                        <td class="px-4 py-2">{{ sprintf("PR-%s-00%s", date('Y'), $president->id) }}</td>
                                        <td class="px-4 py-2">{{ sprintf("%s %s. %s", $president->firstname, substr($president->middlename, 0, 1), $president->lastname) }}</td>
                                        <td class="px-4 py-2">{{ $president->partylist_name }}</td>                                           
                                        <td class="px-4 py-2">{{ $president->votes }}</td>
                                    </tr>
                                @empty
                                    <tr class="border-b bg-white text-blue-900">
                                        <td class="px-4 py-2" colspan="4">No Candidate for President</td>
                                    </tr>
                                @endforelse

                                <tr class="color-blue">
                                    <td class="px-4 py-2" colspan="4">
                                        <label for="peace_officer_2" class="block font-semibold text-lg text-gray-700">Vice President</label>
                                    </td>
                                </tr>
                                
                                @forelse($vice_presidents as $index => $vice_president)
                                    <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-grey-800' }}">
                                        <td class="px-4 py-2">{{ sprintf("VP-%s-00%s", date('Y'), $vice_president->id) }}</td>
                                        <td class="px-4 py-2">{{ sprintf("%s %s. %s", $vice_president->firstname, substr($vice_president->middlename, 0, 1), $vice_president->lastname) }}</td>
                                        <td class="px-4 py-2">{{ $vice_president->partylist_name }}</td>                                           
                                        <td class="px-4 py-2">{{ $vice_president->votes }}</td>
                                    </tr>
                                @empty
                                    <tr class="border-b bg-white text-blue-900">
                                        <td class="px-4 py-2" colspan="4">No Candidate for Vice President</td>
                                    </tr>
                                @endforelse

                                <tr class="color-blue">
                                    <td class="px-4 py-2" colspan="4">
                                        <label for="peace_officer_2" class="block font-semibold text-lg text-gray-700">Secretary</label>
                                    </td>
                                </tr>

                                
                                @forelse($secretaries as $index => $secretary)
                                    <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-grey-800' }}">
                                        <td class="px-4 py-2">{{ sprintf("TR-%s-00%s", date('Y'), $secretary->id) }}</td>
                                        <td class="px-4 py-2">{{ sprintf("%s %s. %s", $secretary->firstname, substr($secretary->middlename, 0, 1), $secretary->lastname) }}</td>
                                        <td class="px-4 py-2">{{ $secretary->partylist_name }}</td>                                           
                                        <td class="px-4 py-2">{{ $secretary->votes }}</td>
                                    </tr>
                                @empty
                                    <tr class="border-b bg-white text-blue-900">
                                        <td class="px-4 py-2" colspan="4">No Candidate for Secretary</td>
                                    </tr>
                                @endforelse

                                <tr class="color-blue">
                                    <td class="px-4 py-2" colspan="4">
                                        <label for="peace_officer_2" class="block font-semibold text-lg text-gray-700">Treasurer</label>
                                    </td>
                                </tr>

                                
                                @forelse($treasurers as $index => $treasurer)
                                    <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-grey-800' }}">
                                        <td class="px-4 py-2">{{ sprintf("TR-%s-00%s", date('Y'), $treasurer->id) }}</td>
                                        <td class="px-4 py-2">{{ sprintf("%s %s. %s", $treasurer->firstname, substr($treasurer->middlename, 0, 1), $treasurer->lastname) }}</td>
                                        <td class="px-4 py-2">{{ $treasurer->partylist_name }}</td>                                           
                                        <td class="px-4 py-2">{{ $treasurer->votes }}</td>
                                    </tr>
                                @empty
                                    <tr class="border-b bg-white text-blue-900">
                                        <td class="px-4 py-2" colspan="4">No Candidate for Treasurer</td>
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
                                    <th class="px-4 py-2 text-left">Candidate Name</th>
                                    <th class="px-4 py-2 text-left">Partylist</th>
                                    <th class="px-4 py-2 text-left">Votes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="color-blue">
                                    <td class="px-4 py-2" colspan="4">
                                        <label for="peace_officer_2" class="block font-semibold text-lg text-gray-700">Auditor</label>
                                    </td>
                                </tr>

                                @forelse($auditors as $index => $auditor)
                                    <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-grey-800' }}">
                                        <td class="px-4 py-2">{{ sprintf("AU-%s-00%s", date('Y'), $auditor->id) }}</td>
                                        <td class="px-4 py-2">{{ sprintf("%s %s. %s", $auditor->firstname, substr($auditor->middlename, 0, 1), $auditor->lastname) }}</td>
                                        <td class="px-4 py-2">{{ $auditor->partylist_name }}</td>                                           
                                        <td class="px-4 py-2">{{ $auditor->votes }}</td>
                                    </tr>
                                @empty
                                    <tr class="border-b bg-white text-blue-900">
                                        <td class="px-4 py-2" colspan="4">No Candidate for Auditor</td>
                                    </tr>
                                @endforelse

                                <tr class="color-blue">
                                    <td class="px-4 py-2" colspan="4">
                                        <label for="peace_officer_2" class="block font-semibold text-lg text-gray-700">P.I.O</label>
                                    </td>
                                </tr>

                                <!-- Add similar code blocks for PIO -->
                                @forelse($pios as $index => $pio)
                                    <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-grey-800' }}">
                                        <td class="px-4 py-2">{{ sprintf("PI-%s-00%s", date('Y'), $pio->id) }}</td>
                                        <td class="px-4 py-2">{{ sprintf("%s %s. %s", $pio->firstname, substr($pio->middlename, 0, 1), $pio->lastname) }}</td>
                                        <td class="px-4 py-2">{{ $pio->partylist_name }}</td>                                           
                                        <td class="px-4 py-2">{{ $pio->votes }}</td>
                                    </tr>
                                @empty
                                    <tr class="border-b bg-white text-blue-900">
                                        <td class="px-4 py-2" colspan="4">No Candidate for P.I.O</td>
                                    </tr>
                                @endforelse

                                <tr class="color-blue">
                                    <td class="px-4 py-2" colspan="4">
                                        <label for="peace_officer_2" class="block font-semibold text-lg text-gray-700">Peace Officer</label>
                                    </td>
                                </tr>
                                @forelse($peace_officers as $index => $peace_officer)
                                    <tr class="{{ $index < 2 ? 'first-row' : 'bg-white text-grey-800' }}">
                                        <td class="px-4 py-2">{{ sprintf("PO-%s-00%s", date('Y'), $peace_officer->id) }}</td>
                                        <td class="px-4 py-2">{{ sprintf("%s %s. %s", $peace_officer->firstname, substr($peace_officer->middlename, 0, 1), $peace_officer->lastname) }}</td>
                                        <td class="px-4 py-2">{{ $peace_officer->partylist_name }}</td>                                           
                                        <td class="px-4 py-2">{{ $peace_officer->votes }}</td>
                                    </tr>
                                @empty
                                    <tr class="border-b bg-white text-blue-900">
                                        <td class="px-4 py-2" colspan="4">No Candidate for Business Manager</td>
                                    </tr>
                                @endforelse

                                <tr class="color-blue">
                                    <td class="px-4 py-2" colspan="4">
                                        <label for="peace_officer_2" class="block font-semibold text-lg text-gray-700">Business Manager</label>
                                    </td>
                                </tr>
                                @forelse($business_managers as $index => $business_manager)
                                    <tr class="{{ $index < 2 ? 'first-row' : 'bg-white text-grey-800' }}">
                                        <td class="px-4 py-2">{{ sprintf("BM-%s-00%s", date('Y'), $business_manager->id) }}</td>
                                        <td class="px-4 py-2">{{ sprintf("%s %s. %s", $business_manager->firstname, substr($business_manager->middlename, 0, 1), $business_manager->lastname) }}</td>
                                        <td class="px-4 py-2">{{ $business_manager->partylist_name }}</td>                                           
                                        <td class="px-4 py-2">{{ $business_manager->votes }}</td>
                                    </tr>
                                @empty
                                    <tr class="border-b bg-white text-blue-900">
                                        <td class="px-4 py-2" colspan="4">No Candidate for Business Manager</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <a href="{{ route('ballots.index') }}" class="mt-2">
                <button class="mt-4 bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded text-sm">
                    Go Back to Ballot
                </button>
            </a>
        </div>
        @endif
    </div>
    <x-footer />
</x-app-layout>
