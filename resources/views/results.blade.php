<x-app-layout>
    <style>
        table {
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
            background: #fff;
            box-shadow: 0 2px 8px 0 #e0e7ff;
            border-radius: 0.5rem;
            overflow: hidden;
        }
        thead th {
            position: sticky;
            top: 0;
            background: #1e3a8a;
            color: #fff;
            z-index: 2;
            font-size: 1rem;
            padding: 0.75rem 1rem;
        }
        table tbody tr.first-row {
            background-color: #e0e7ff;
            color: #1e3a8a;
            border: #1e3a8a dashed 1px;
        }
        tr.color-blue {
            background-color: #f1f5f9;
        }
        tr:nth-child(even):not(.color-blue):not(.first-row) {
            background-color: #f8fafc;
        }
        th, td {
            border-bottom: 1px solid #e5e7eb;
            padding: 0.75rem 1rem;
            text-align: left;
        }
        th {
            font-weight: 700;
        }
        label.block {
            margin-bottom: 0.25rem;
        }
        .table-section {
            margin-bottom: 2rem;
        }
    </style>
    <div class="flex h-screen">
        <!-- Side Bar -->
        <x-sidebar />

        @if(Auth::user()->role === 3)
            <!-- Student Results Table: No candidate names -->
            <div class="flex-grow bg-gradient-to-br bg-white text-blue-900 p-10">
                <h1 class="text-xl font-bold text-blue-900 mb-4">Election Results</h1>
                <div class="overflow-hidden bg-white text-blue-900 rounded-lg shadow-lg">
                    <div class="flex space-x-4">
                        <div class="flex-1">
                            <table class="border-collapse text-sm w-full">
                                <thead class="bg-blue-900 text-white">
                                    <tr>
                                        <th class="px-4 py-2 text-left">Candidate ID.</th>
                                        <th class="px-4 py-2 text-left">Party List</th>
                                        <th class="px-4 py-2 text-left">Votes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- President -->
                                    <tr class="color-blue"><td colspan="3"><label class="block font-semibold text-lg text-gray-700">President</label></td></tr>
                                    @forelse($presidents as $index => $president)
                                        <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-grey-800' }}">
                                            <td class="px-4 py-2">{{ sprintf('PR-%s-00%s', date('Y'), $president->id) }}</td>
                                            <td class="px-4 py-2">{{ $president->partylist_name ?? '' }}</td>
                                            <td class="px-4 py-2">{{ $president->votes ?? 0 }}</td>
                                        </tr>
                                    @empty
                                        <tr class="border-b bg-white text-blue-900"><td colspan="3">No Candidate for President</td></tr>
                                    @endforelse
                                    <!-- Vice President -->
                                    <tr class="color-blue"><td colspan="3"><label class="block font-semibold text-lg text-gray-700">Vice President</label></td></tr>
                                    @forelse($vice_presidents as $index => $vice_president)
                                        <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-grey-800' }}">
                                            <td class="px-4 py-2">{{ sprintf('VP-%s-00%s', date('Y'), $vice_president->id) }}</td>
                                            <td class="px-4 py-2">{{ $vice_president->partylist_name ?? '' }}</td>
                                            <td class="px-4 py-2">{{ $vice_president->votes ?? 0 }}</td>
                                        </tr>
                                    @empty
                                        <tr class="border-b bg-white text-blue-900"><td colspan="3">No Candidate for Vice President</td></tr>
                                    @endforelse
                                    <!-- Secretary -->
                                    <tr class="color-blue"><td colspan="3"><label class="block font-semibold text-lg text-gray-700">Secretary</label></td></tr>
                                    @forelse($secretaries as $index => $secretary)
                                        <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-grey-800' }}">
                                            <td class="px-4 py-2">{{ sprintf('SC-%s-00%s', date('Y'), $secretary->id) }}</td>
                                            <td class="px-4 py-2">{{ $secretary->partylist_name ?? '' }}</td>
                                            <td class="px-4 py-2">{{ $secretary->votes ?? 0 }}</td>
                                        </tr>
                                    @empty
                                        <tr class="border-b bg-white text-blue-900"><td colspan="3">No Candidate for Secretary</td></tr>
                                    @endforelse
                                    <!-- Treasurer -->
                                    <tr class="color-blue"><td colspan="3"><label class="block font-semibold text-lg text-gray-700">Treasurer</label></td></tr>
                                    @forelse($treasurers as $index => $treasurer)
                                        <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-grey-800' }}">
                                            <td class="px-4 py-2">{{ sprintf('TR-%s-00%s', date('Y'), $treasurer->id) }}</td>
                                            <td class="px-4 py-2">{{ $treasurer->partylist_name ?? '' }}</td>
                                            <td class="px-4 py-2">{{ $treasurer->votes ?? 0 }}</td>
                                        </tr>
                                    @empty
                                        <tr class="border-b bg-white text-blue-900"><td colspan="3">No Candidate for Treasurer</td></tr>
                                    @endforelse
                                    <!-- Auditor -->
                                    <tr class="color-blue"><td colspan="3"><label class="block font-semibold text-lg text-gray-700">Auditor</label></td></tr>
                                    @forelse($auditors as $index => $auditor)
                                        <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-grey-800' }}">
                                            <td class="px-4 py-2">{{ sprintf('AU-%s-00%s', date('Y'), $auditor->id) }}</td>
                                            <td class="px-4 py-2">{{ $auditor->partylist_name ?? '' }}</td>
                                            <td class="px-4 py-2">{{ $auditor->votes ?? 0 }}</td>
                                        </tr>
                                    @empty
                                        <tr class="border-b bg-white text-blue-900"><td colspan="3">No Candidate for Auditor</td></tr>
                                    @endforelse
                                    <!-- PIO Internal -->
                                    <tr class="color-blue"><td colspan="3"><label class="block font-semibold text-lg text-gray-700">P.I.O. Internal</label></td></tr>
                                    @php $pios_internal = $pios->where('type', 'internal'); @endphp
                                    @forelse($pios_internal as $index => $pio)
                                        <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-grey-800' }}">
                                            <td class="px-4 py-2">{{ sprintf('PIOI-%s-00%s', date('Y'), $pio->id) }}</td>
                                            <td class="px-4 py-2">{{ $pio->partylist_name ?? '' }}</td>
                                            <td class="px-4 py-2">{{ $pio->votes ?? 0 }}</td>
                                        </tr>
                                    @empty
                                        <tr class="border-b bg-white text-blue-900"><td colspan="3">No Candidate for P.I.O. Internal</td></tr>
                                    @endforelse
                                    <!-- PIO External -->
                                    <tr class="color-blue"><td colspan="3"><label class="block font-semibold text-lg text-gray-700">P.I.O. External</label></td></tr>
                                    @php $pios_external = $pios->where('type', 'external'); @endphp
                                    @forelse($pios_external as $index => $pio)
                                        <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-grey-800' }}">
                                            <td class="px-4 py-2">{{ sprintf('PIOE-%s-00%s', date('Y'), $pio->id) }}</td>
                                            <td class="px-4 py-2">{{ $pio->partylist_name ?? '' }}</td>
                                            <td class="px-4 py-2">{{ $pio->votes ?? 0 }}</td>
                                        </tr>
                                    @empty
                                        <tr class="border-b bg-white text-blue-900"><td colspan="3">No Candidate for P.I.O. External</td></tr>
                                    @endforelse
                                    <!-- Peace Officer Internal -->
                                    <tr class="color-blue"><td colspan="3"><label class="block font-semibold text-lg text-gray-700">Peace Officer Internal</label></td></tr>
                                    @php $peace_officers_internal = $peace_officers->where('type', 'internal'); @endphp
                                    @forelse($peace_officers_internal as $index => $peace_officer)
                                        <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-grey-800' }}">
                                            <td class="px-4 py-2">{{ sprintf('POI-%s-00%s', date('Y'), $peace_officer->id) }}</td>
                                            <td class="px-4 py-2">{{ $peace_officer->partylist_name ?? '' }}</td>
                                            <td class="px-4 py-2">{{ $peace_officer->votes ?? 0 }}</td>
                                        </tr>
                                    @empty
                                        <tr class="border-b bg-white text-blue-900"><td colspan="3">No Candidate for Peace Officer Internal</td></tr>
                                    @endforelse
                                    <!-- Peace Officer External -->
                                    <tr class="color-blue"><td colspan="3"><label class="block font-semibold text-lg text-gray-700">Peace Officer External</label></td></tr>
                                    @php $peace_officers_external = $peace_officers->where('type', 'external'); @endphp
                                    @forelse($peace_officers_external as $index => $peace_officer)
                                        <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-grey-800' }}">
                                            <td class="px-4 py-2">{{ sprintf('POE-%s-00%s', date('Y'), $peace_officer->id) }}</td>
                                            <td class="px-4 py-2">{{ $peace_officer->partylist_name ?? '' }}</td>
                                            <td class="px-4 py-2">{{ $peace_officer->votes ?? 0 }}</td>
                                        </tr>
                                    @empty
                                        <tr class="border-b bg-white text-blue-900"><td colspan="3">No Candidate for Peace Officer External</td></tr>
                                    @endforelse
                                    <!-- 1st Year Representative -->
                                    <tr class="color-blue"><td colspan="3"><label class="block font-semibold text-lg text-gray-700">1st Year Representative</label></td></tr>
                                    @forelse($rep_1st_year as $index => $rep)
                                        <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-grey-800' }}">
                                            <td class="px-4 py-2">{{ sprintf('REP1-%s-00%s', date('Y'), $rep->id) }}</td>
                                            <td class="px-4 py-2">{{ $rep->partylist_name ?? '' }}</td>
                                            <td class="px-4 py-2">{{ $rep->votes ?? 0 }}</td>
                                        </tr>
                                    @empty
                                        <tr class="border-b bg-white text-blue-900"><td colspan="3">No Candidate for 1st Year Representative</td></tr>
                                    @endforelse
                                    <!-- 2nd Year Representative -->
                                    <tr class="color-blue"><td colspan="3"><label class="block font-semibold text-lg text-gray-700">2nd Year Representative</label></td></tr>
                                    @forelse($rep_2nd_year as $index => $rep)
                                        <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-grey-800' }}">
                                            <td class="px-4 py-2">{{ sprintf('REP2-%s-00%s', date('Y'), $rep->id) }}</td>
                                            <td class="px-4 py-2">{{ $rep->partylist_name ?? '' }}</td>
                                            <td class="px-4 py-2">{{ $rep->votes ?? 0 }}</td>
                                        </tr>
                                    @empty
                                        <tr class="border-b bg-white text-blue-900"><td colspan="3">No Candidate for 2nd Year Representative</td></tr>
                                    @endforelse
                                    <!-- 3rd Year Representative -->
                                    <tr class="color-blue"><td colspan="3"><label class="block font-semibold text-lg text-gray-700">3rd Year Representative</label></td></tr>
                                    @forelse($rep_3rd_year as $index => $rep)
                                        <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-grey-800' }}">
                                            <td class="px-4 py-2">{{ sprintf('REP3-%s-00%s', date('Y'), $rep->id) }}</td>
                                            <td class="px-4 py-2">{{ $rep->partylist_name ?? '' }}</td>
                                            <td class="px-4 py-2">{{ $rep->votes ?? 0 }}</td>
                                        </tr>
                                    @empty
                                        <tr class="border-b bg-white text-blue-900"><td colspan="3">No Candidate for 3rd Year Representative</td></tr>
                                    @endforelse
                                    <!-- 4th Year Representative -->
                                    <tr class="color-blue"><td colspan="3"><label class="block font-semibold text-lg text-gray-700">4th Year Representative</label></td></tr>
                                    @forelse($rep_4th_year as $index => $rep)
                                        <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-grey-800' }}">
                                            <td class="px-4 py-2">{{ sprintf('REP4-%s-00%s', date('Y'), $rep->id) }}</td>
                                            <td class="px-4 py-2">{{ $rep->partylist_name ?? '' }}</td>
                                            <td class="px-4 py-2">{{ $rep->votes ?? 0 }}</td>
                                        </tr>
                                    @empty
                                        <tr class="border-b bg-white text-blue-900"><td colspan="3">No Candidate for 4th Year Representative</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if(Auth::user()->role === 1)
            <!-- Admin Results Table: With candidate names -->
            <div class="flex-grow bg-gradient-to-br bg-white text-blue-900 p-10">
                <h1 class="text-xl font-bold text-blue-900 mb-4">Election Results (Admin View)</h1>
                <div class="overflow-hidden bg-white text-blue-900 rounded-lg shadow-lg">
                    <div class="flex space-x-4">
                        <div class="flex-1">
                            <table class="border-collapse text-sm w-full">
                                <thead class="bg-blue-900 text-white">
                                    <tr>
                                        <th class="px-4 py-2 text-left">Candidate ID.</th>
                                        <th class="px-4 py-2 text-left">Name</th>
                                        <th class="px-4 py-2 text-left">Party List</th>
                                        <th class="px-4 py-2 text-left">Votes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- President -->
                                    <tr class="color-blue"><td colspan="4"><label class="block font-semibold text-lg text-gray-700">President</label></td></tr>
                                    @forelse($presidents as $index => $president)
                                        <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-grey-800' }}">
                                            <td class="px-4 py-2">{{ sprintf('PR-%s-00%s', date('Y'), $president->id) }}</td>
                                            <td class="px-4 py-2">{{ $president->name ?? '' }}</td>
                                            <td class="px-4 py-2">{{ $president->partylist_name ?? '' }}</td>
                                            <td class="px-4 py-2">{{ $president->votes ?? 0 }}</td>
                                        </tr>
                                    @empty
                                        <tr class="border-b bg-white text-blue-900"><td colspan="4">No Candidate for President</td></tr>
                                    @endforelse
                                    <!-- Vice President -->
                                    <tr class="color-blue"><td colspan="4"><label class="block font-semibold text-lg text-gray-700">Vice President</label></td></tr>
                                    @forelse($vice_presidents as $index => $vice_president)
                                        <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-grey-800' }}">
                                            <td class="px-4 py-2">{{ sprintf('VP-%s-00%s', date('Y'), $vice_president->id) }}</td>
                                            <td class="px-4 py-2">{{ $vice_president->name ?? '' }}</td>
                                            <td class="px-4 py-2">{{ $vice_president->partylist_name ?? '' }}</td>
                                            <td class="px-4 py-2">{{ $vice_president->votes ?? 0 }}</td>
                                        </tr>
                                    @empty
                                        <tr class="border-b bg-white text-blue-900"><td colspan="4">No Candidate for Vice President</td></tr>
                                    @endforelse
                                    <!-- Secretary -->
                                    <tr class="color-blue"><td colspan="4"><label class="block font-semibold text-lg text-gray-700">Secretary</label></td></tr>
                                    @forelse($secretaries as $index => $secretary)
                                        <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-grey-800' }}">
                                            <td class="px-4 py-2">{{ sprintf('SC-%s-00%s', date('Y'), $secretary->id) }}</td>
                                            <td class="px-4 py-2">{{ $secretary->name ?? '' }}</td>
                                            <td class="px-4 py-2">{{ $secretary->partylist_name ?? '' }}</td>
                                            <td class="px-4 py-2">{{ $secretary->votes ?? 0 }}</td>
                                        </tr>
                                    @empty
                                        <tr class="border-b bg-white text-blue-900"><td colspan="4">No Candidate for Secretary</td></tr>
                                    @endforelse
                                    <!-- Treasurer -->
                                    <tr class="color-blue"><td colspan="4"><label class="block font-semibold text-lg text-gray-700">Treasurer</label></td></tr>
                                    @forelse($treasurers as $index => $treasurer)
                                        <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-grey-800' }}">
                                            <td class="px-4 py-2">{{ sprintf('TR-%s-00%s', date('Y'), $treasurer->id) }}</td>
                                            <td class="px-4 py-2">{{ $treasurer->name ?? '' }}</td>
                                            <td class="px-4 py-2">{{ $treasurer->partylist_name ?? '' }}</td>
                                            <td class="px-4 py-2">{{ $treasurer->votes ?? 0 }}</td>
                                        </tr>
                                    @empty
                                        <tr class="border-b bg-white text-blue-900"><td colspan="4">No Candidate for Treasurer</td></tr>
                                    @endforelse
                                    <!-- Auditor -->
                                    <tr class="color-blue"><td colspan="4"><label class="block font-semibold text-lg text-gray-700">Auditor</label></td></tr>
                                    @forelse($auditors as $index => $auditor)
                                        <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-grey-800' }}">
                                            <td class="px-4 py-2">{{ sprintf('AU-%s-00%s', date('Y'), $auditor->id) }}</td>
                                            <td class="px-4 py-2">{{ $auditor->name ?? '' }}</td>
                                            <td class="px-4 py-2">{{ $auditor->partylist_name ?? '' }}</td>
                                            <td class="px-4 py-2">{{ $auditor->votes ?? 0 }}</td>
                                        </tr>
                                    @empty
                                        <tr class="border-b bg-white text-blue-900"><td colspan="4">No Candidate for Auditor</td></tr>
                                    @endforelse
                                    <!-- PIO Internal -->
                                    <tr class="color-blue"><td colspan="4"><label class="block font-semibold text-lg text-gray-700">P.I.O. Internal</label></td></tr>
                                    @php $pios_internal = $pios->where('type', 'internal'); @endphp
                                    @forelse($pios_internal as $index => $pio)
                                        <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-grey-800' }}">
                                            <td class="px-4 py-2">{{ sprintf('PIOI-%s-00%s', date('Y'), $pio->id) }}</td>
                                            <td class="px-4 py-2">{{ $pio->name ?? '' }}</td>
                                            <td class="px-4 py-2">{{ $pio->partylist_name ?? '' }}</td>
                                            <td class="px-4 py-2">{{ $pio->votes ?? 0 }}</td>
                                        </tr>
                                    @empty
                                        <tr class="border-b bg-white text-blue-900"><td colspan="4">No Candidate for P.I.O. Internal</td></tr>
                                    @endforelse
                                    <!-- PIO External -->
                                    <tr class="color-blue"><td colspan="4"><label class="block font-semibold text-lg text-gray-700">P.I.O. External</label></td></tr>
                                    @php $pios_external = $pios->where('type', 'external'); @endphp
                                    @forelse($pios_external as $index => $pio)
                                        <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-grey-800' }}">
                                            <td class="px-4 py-2">{{ sprintf('PIOE-%s-00%s', date('Y'), $pio->id) }}</td>
                                            <td class="px-4 py-2">{{ $pio->name ?? '' }}</td>
                                            <td class="px-4 py-2">{{ $pio->partylist_name ?? '' }}</td>
                                            <td class="px-4 py-2">{{ $pio->votes ?? 0 }}</td>
                                        </tr>
                                    @empty
                                        <tr class="border-b bg-white text-blue-900"><td colspan="4">No Candidate for P.I.O. External</td></tr>
                                    @endforelse
                                    <!-- Peace Officer Internal -->
                                    <tr class="color-blue"><td colspan="4"><label class="block font-semibold text-lg text-gray-700">Peace Officer Internal</label></td></tr>
                                    @php $peace_officers_internal = $peace_officers->where('type', 'internal'); @endphp
                                    @forelse($peace_officers_internal as $index => $peace_officer)
                                        <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-grey-800' }}">
                                            <td class="px-4 py-2">{{ sprintf('POI-%s-00%s', date('Y'), $peace_officer->id) }}</td>
                                            <td class="px-4 py-2">{{ $peace_officer->name ?? '' }}</td>
                                            <td class="px-4 py-2">{{ $peace_officer->partylist_name ?? '' }}</td>
                                            <td class="px-4 py-2">{{ $peace_officer->votes ?? 0 }}</td>
                                        </tr>
                                    @empty
                                        <tr class="border-b bg-white text-blue-900"><td colspan="4">No Candidate for Peace Officer Internal</td></tr>
                                    @endforelse
                                    <!-- Peace Officer External -->
                                    <tr class="color-blue"><td colspan="4"><label class="block font-semibold text-lg text-gray-700">Peace Officer External</label></td></tr>
                                    @php $peace_officers_external = $peace_officers->where('type', 'external'); @endphp
                                    @forelse($peace_officers_external as $index => $peace_officer)
                                        <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-grey-800' }}">
                                            <td class="px-4 py-2">{{ sprintf('POE-%s-00%s', date('Y'), $peace_officer->id) }}</td>
                                            <td class="px-4 py-2">{{ $peace_officer->name ?? '' }}</td>
                                            <td class="px-4 py-2">{{ $peace_officer->partylist_name ?? '' }}</td>
                                            <td class="px-4 py-2">{{ $peace_officer->votes ?? 0 }}</td>
                                        </tr>
                                    @empty
                                        <tr class="border-b bg-white text-blue-900"><td colspan="4">No Candidate for Peace Officer External</td></tr>
                                    @endforelse
                                    <!-- 1st Year Representative -->
                                    <tr class="color-blue"><td colspan="4"><label class="block font-semibold text-lg text-gray-700">1st Year Representative</label></td></tr>
                                    @forelse($rep_1st_year as $index => $rep)
                                        <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-grey-800' }}">
                                            <td class="px-4 py-2">{{ sprintf('REP1-%s-00%s', date('Y'), $rep->id) }}</td>
                                            <td class="px-4 py-2">{{ $rep->name ?? '' }}</td>
                                            <td class="px-4 py-2">{{ $rep->partylist_name ?? '' }}</td>
                                            <td class="px-4 py-2">{{ $rep->votes ?? 0 }}</td>
                                        </tr>
                                    @empty
                                        <tr class="border-b bg-white text-blue-900"><td colspan="4">No Candidate for 1st Year Representative</td></tr>
                                    @endforelse
                                    <!-- 2nd Year Representative -->
                                    <tr class="color-blue"><td colspan="4"><label class="block font-semibold text-lg text-gray-700">2nd Year Representative</label></td></tr>
                                    @forelse($rep_2nd_year as $index => $rep)
                                        <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-grey-800' }}">
                                            <td class="px-4 py-2">{{ sprintf('REP2-%s-00%s', date('Y'), $rep->id) }}</td>
                                            <td class="px-4 py-2">{{ $rep->name ?? '' }}</td>
                                            <td class="px-4 py-2">{{ $rep->partylist_name ?? '' }}</td>
                                            <td class="px-4 py-2">{{ $rep->votes ?? 0 }}</td>
                                        </tr>
                                    @empty
                                        <tr class="border-b bg-white text-blue-900"><td colspan="4">No Candidate for 2nd Year Representative</td></tr>
                                    @endforelse
                                    <!-- 3rd Year Representative -->
                                    <tr class="color-blue"><td colspan="4"><label class="block font-semibold text-lg text-gray-700">3rd Year Representative</label></td></tr>
                                    @forelse($rep_3rd_year as $index => $rep)
                                        <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-grey-800' }}">
                                            <td class="px-4 py-2">{{ sprintf('REP3-%s-00%s', date('Y'), $rep->id) }}</td>
                                            <td class="px-4 py-2">{{ $rep->name ?? '' }}</td>
                                            <td class="px-4 py-2">{{ $rep->partylist_name ?? '' }}</td>
                                            <td class="px-4 py-2">{{ $rep->votes ?? 0 }}</td>
                                        </tr>
                                    @empty
                                        <tr class="border-b bg-white text-blue-900"><td colspan="4">No Candidate for 3rd Year Representative</td></tr>
                                    @endforelse
                                    <!-- 4th Year Representative -->
                                    <tr class="color-blue"><td colspan="4"><label class="block font-semibold text-lg text-gray-700">4th Year Representative</label></td></tr>
                                    @forelse($rep_4th_year as $index => $rep)
                                        <tr class="{{ $index === 0 ? 'first-row' : 'bg-white text-grey-800' }}">
                                            <td class="px-4 py-2">{{ sprintf('REP4-%s-00%s', date('Y'), $rep->id) }}</td>
                                            <td class="px-4 py-2">{{ $rep->name ?? '' }}</td>
                                            <td class="px-4 py-2">{{ $rep->partylist_name ?? '' }}</td>
                                            <td class="px-4 py-2">{{ $rep->votes ?? 0 }}</td>
                                        </tr>
                                    @empty
                                        <tr class="border-b bg-white text-blue-900"><td colspan="4">No Candidate for 4th Year Representative</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <x-footer />
</x-app-layout>
