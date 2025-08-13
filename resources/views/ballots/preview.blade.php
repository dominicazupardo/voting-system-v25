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
          <h1 class="text-3xl font-bold mb-6">Official Ballot</h1>
          <form id="ballotForm" action="{{ route('ballot.cast') }}" method="POST">
              @csrf
              <div class="flex items-center space-x-2">
                <label for="president" class="block font-semibold">President: </label>
                <span>{{ isset($ballots->president) ? $ballots->president : 'No selected candidate' }}</span>
                <input type="hidden" name="president" value="{{ $ballots->president }}" />
              </div>
              <div class="flex items-center space-x-2">
                <label for="vice_president" class="block font-semibold">Vice President: </label>
                <span>{{ isset($ballots->vice_president) ? $ballots->vice_president : 'No selected candidate' }}</span>
                <input type="hidden" name="vice_president" value="{{ $ballots->vice_president }}" />
              </div>
              <div class="flex items-center space-x-2">
                <label for="secretary" class="block font-semibold">Secretary: </label>
                <span>{{ isset($ballots->secretary) ? $ballots->secretary : 'No selected candidate' }}</span>
                <input type="hidden" name="secretary" value="{{ $ballots->secretary }}" />
              </div>
              <div class="flex items-center space-x-2">
                <label for="treasurer" class="block font-semibold">Treasurer: </label>
                <span>{{ isset($ballots->treasurer) ? $ballots->treasurer : 'No selected candidate' }}</span>
                <input type="hidden" name="treasurer" value="{{ $ballots->treasurer }}" />
              </div>
              <div class="flex items-center space-x-2">
                <label for="auditor" class="block font-semibold">Auditor: </label>
                <span>{{ isset($ballots->auditor) ? $ballots->auditor : 'No selected candidate' }}</span>
                <input type="hidden" name="auditor" value="{{ $ballots->auditor }}" />
              </div>
              <div class="flex items-center space-x-2">
                <label for="pio_internal" class="block font-semibold">P.I.O. Internal: </label>
                <span>{{ isset($ballots->pio_internal) ? $ballots->pio_internal : 'No selected candidate' }}</span>
                <input type="hidden" name="pio_internal" value="{{ $ballots->pio_internal }}" />
              </div>
              <div class="flex items-center space-x-2">
                <label for="pio_external" class="block font-semibold">P.I.O. External: </label>
                <span>{{ isset($ballots->pio_external) ? $ballots->pio_external : 'No selected candidate' }}</span>
                <input type="hidden" name="pio_external" value="{{ $ballots->pio_external }}" />
              </div>
              <div class="flex items-center space-x-2">
                <label for="business_manager_internal" class="block font-semibold">Business Manager Internal: </label>
                <span>{{ isset($ballots->business_manager_internal) ? $ballots->business_manager_internal : 'No selected candidate' }}</span>
                <input type="hidden" name="business_manager_internal" value="{{ $ballots->business_manager_internal }}" />
              </div>
              <div class="flex items-center space-x-2">
                <label for="business_manager_external" class="block font-semibold">Business Manager External: </label>
                <span>{{ isset($ballots->business_manager_external) ? $ballots->business_manager_external : 'No selected candidate' }}</span>
                <input type="hidden" name="business_manager_external" value="{{ $ballots->business_manager_external }}" />
              </div>
              <div class="flex items-center space-x-2">
                <label for="peace_officer_internal" class="block font-semibold">Peace Officer Internal: </label>
                <span>{{ isset($ballots->peace_officer_internal) ? $ballots->peace_officer_internal : 'No selected candidate' }}</span>
                <input type="hidden" name="peace_officer_internal" value="{{ $ballots->peace_officer_internal }}" />
              </div>
              <div class="flex items-center space-x-2">
                <label for="peace_officer_external" class="block font-semibold">Peace Officer External: </label>
                <span>{{ isset($ballots->peace_officer_external) ? $ballots->peace_officer_external : 'No selected candidate' }}</span>
                <input type="hidden" name="peace_officer_external" value="{{ $ballots->peace_officer_external }}" />
              </div>
              <div class="flex items-center space-x-2">
                <label for="rep_1st_year" class="block font-semibold">1st Year Representative: </label>
                <span>{{ isset($ballots->rep_1st_year) ? $ballots->rep_1st_year : 'No selected candidate' }}</span>
                <input type="hidden" name="rep_1st_year" value="{{ $ballots->rep_1st_year }}" />
              </div>
              <div class="flex items-center space-x-2">
                <label for="rep_2nd_year" class="block font-semibold">2nd Year Representative: </label>
                <span>{{ isset($ballots->rep_2nd_year) ? $ballots->rep_2nd_year : 'No selected candidate' }}</span>
                <input type="hidden" name="rep_2nd_year" value="{{ $ballots->rep_2nd_year }}" />
              </div>
              <div class="flex items-center space-x-2">
                <label for="rep_3rd_year" class="block font-semibold">3rd Year Representative: </label>
                <span>{{ isset($ballots->rep_3rd_year) ? $ballots->rep_3rd_year : 'No selected candidate' }}</span>
                <input type="hidden" name="rep_3rd_year" value="{{ $ballots->rep_3rd_year }}" />
              </div>
              <div class="flex items-center space-x-2">
                <label for="rep_4th_year" class="block font-semibold">4th Year Representative: </label>
                <span>{{ isset($ballots->rep_4th_year) ? $ballots->rep_4th_year : 'No selected candidate' }}</span>
                <input type="hidden" name="rep_4th_year" value="{{ $ballots->rep_4th_year }}" />
              </div>
              <div class="flex items-center space-x-2 gap-2 mt-2">
                <button type="submit" class="bg-blue-600 text-white font-semibold py-2 px-4 rounded hover:bg-blue-700">
                    Cast the Votes
                </button>

                <a href="{{ url()->previous() }}">
                  <button type="button" class="bg-blue-600 text-white font-semibold py-2 px-4 rounded hover:bg-blue-700">
                    Back
                  </button>
                </a>
              </div>
          </form>

      <!-- Confirmation Section -->
      <div id="confirmation" class="mt-10 hidden">
        <h2 class="text-2xl font-bold mb-6">Your Selections</h2>
        <div class="space-y-4">
          <p><strong>1st Year Representative:</strong> <span id="preview-rep-1st-year">{{ isset($ballots->rep_1st_year) ? $ballots->rep_1st_year : 'No selected candidate' }}</span></p>
          <p><strong>2nd Year Representative:</strong> <span id="preview-rep-2nd-year">{{ isset($ballots->rep_2nd_year) ? $ballots->rep_2nd_year : 'No selected candidate' }}</span></p>
          <p><strong>3rd Year Representative:</strong> <span id="preview-rep-3rd-year">{{ isset($ballots->rep_3rd_year) ? $ballots->rep_3rd_year : 'No selected candidate' }}</span></p>
          <p><strong>4th Year Representative:</strong> <span id="preview-rep-4th-year">{{ isset($ballots->rep_4th_year) ? $ballots->rep_4th_year : 'No selected candidate' }}</span></p>
          <p><strong>President:</strong> <span id="preview-president"></span></p>
          <p><strong>Vice President:</strong> <span id="preview-vp"></span></p>
          <p><strong>Secretary:</strong> <span id="preview-secretary"></span></p>
          <p><strong>Treasurer:</strong> <span id="preview-treasurer"></span></p>
          <p><strong>P.I.O. Internal:</strong> <span id="preview-pio-internal"></span></p>
          <p><strong>P.I.O. External:</strong> <span id="preview-pio-external"></span></p>
          <p><strong>Auditor:</strong> <span id="preview-auditor"></span></p>
          <p><strong>Business Manager Internal:</strong> <span id="preview-business-manager-internal"></span></p>
          <p><strong>Business Manager External:</strong> <span id="preview-business-manager-external"></span></p>
          <p><strong>Peace Officer Internal:</strong> <span id="preview-peace-officer-internal"></span></p>
          <p><strong>Peace Officer External:</strong> <span id="preview-peace-officer-external"></span></p>
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
