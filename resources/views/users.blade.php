<x-app-layout>
    <div class="flex h-screen">
        <!-- Side Bar -->
        <x-sidebar />

        @if(Auth::user()->role == 1)
        <!-- Content Section -->
        <div class="flex-grow bg-gradient-to-br bg-white text-blue-900 p-10">
            <h1 class="text-xl font-bold text-blue-900 mb-4">Pending Request for Approval</h1>
            <div class="overflow-hidden bg-white text-blue-900 rounded-lg shadow-lg">
                <div class="flex space-x-4">
                    <!-- First Table: President, Vice President, Secretary  ... PIO -->
                    <div class="flex-1">
                        <table class="border-collapse text-sm w-full">
                            <thead class="bg-blue-900 text-white">
                                <tr>
                                    <th class="px-4 py-2 text-left">User ID.</th>
                                    <th class="px-4 py-2 text-left">Fullname</th>
                                    <th class="px-4 py-2 text-left">Email</th>
                                    <th class="px-4 py-2 text-left">Mobile No.</th>
                                    <th class="px-4 py-2 text-left">Course</th>
                                    <th class="px-4 py-2 text-left">Year</th>
                                    <th class="px-4 py-2 text-left">Block</th>
                                    <th class="px-4 py-2 text-left">Status</th>
                                    <th class="px-4 py-2 text-left">Date Registered</th>
                                    <th class="px-4 py-2 text-left">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    @if($user->is_approved == false)
                                        <tr>
                                            <td class="px-4 py-2 text-left">{{ $user->id }}</td>
                                            <td class="px-4 py-2 text-left">{{ sprintf('%s, %s %s', strtoupper($user->lastname), ucfirst($user->firstname), ucfirst($user->middlename)) }}</td>
                                            <td class="px-4 py-2 text-left">{{ $user->email }}</td>
                                            <td class="px-4 py-2 text-left">{{ $user->mobile_no }}</td>
                                            <td class="px-4 py-2 text-left">{{ $user->course }}</td>
                                            <td class="px-4 py-2 text-left">{{ $user->year }}</td>
                                            <td class="px-4 py-2 text-left">{{ $user->block }}</td>
                                            <td class="px-4 py-2 text-left">{{ ($user->is_approved == true) ? 'Approved' : 'Pending' }}</td>
                                            <td class="px-4 py-2 text-left">{{ $user->created_at }}</td>
                                            <td class="px-4 py-2 text-left">
                                                <a href="{{ route('user.approve', $user->id) }}">
                                                    <button for="is_approved" name="is_approved" class="cursor-pointer px-4 py-2 bg-gray-100 rounded-lg text-sm font-medium text-gray-700 peer-checked:bg-blue-500 peer-checked:text-white transition">
                                                        Approve
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach

                                @if(empty($user->is_approved == false)) 
                                    <tr>
                                        <td class="px-4 py-2 text-left" colspan="10">No Pending Voter Requests</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <h1 class="text-xl font-bold text-blue-900 mb-4 mt-4">Approved Voters</h1>
            <div class="overflow-hidden bg-white text-blue-900 rounded-lg shadow-lg">
                <div class="flex space-x-4">
                    <!-- First Table: President, Vice President, Secretary  ... PIO -->
                    <div class="flex-1">
                        <table class="border-collapse text-sm w-full">
                            <thead class="bg-blue-900 text-white">
                                <tr>
                                    <th class="px-4 py-2 text-left">User ID.</th>
                                    <th class="px-4 py-2 text-left">Fullname</th>
                                    <th class="px-4 py-2 text-left">Email</th>
                                    <th class="px-4 py-2 text-left">Mobile No.</th>
                                    <th class="px-4 py-2 text-left">Course</th>
                                    <th class="px-4 py-2 text-left">Year</th>
                                    <th class="px-4 py-2 text-left">Block</th>
                                    <th class="px-4 py-2 text-left">Role</th>
                                    <th class="px-4 py-2 text-left">Has Voted</th>
                                    <th class="px-4 py-2 text-left">Date Registered</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                    @if($user->is_approved == true)
                                        <tr>
                                            <td class="px-4 py-2 text-left">{{ $user->id }}</td>
                                            <td class="px-4 py-2 text-left">{{ sprintf('%s, %s %s', strtoupper($user->lastname), ucfirst($user->firstname), ucfirst($user->middlename)) }}</td>
                                            <td class="px-4 py-2 text-left">{{ $user->email }}</td>
                                            <td class="px-4 py-2 text-left">{{ $user->mobile_no }}</td>
                                            <td class="px-4 py-2 text-left">{{ $user->course }}</td>
                                            <td class="px-4 py-2 text-left">{{ $user->year }}</td>
                                            <td class="px-4 py-2 text-left">{{ $user->block }}</td>
                                            <td class="px-4 py-2 text-left">{{ ($user->role == 1) ? 'Admin' : 'Student' }}</td>
                                            @if($user->role == 1)
                                                <td class="px-4 py-2 text-left">Not applicable</td>
                                            @elseif($user->has_voted == true)
                                                <td class="px-4 py-2 text-left">Casted a vote</td>
                                            @else 
                                                <td class="px-4 py-2 text-left">No vote casted yet</td>
                                            @endif
                                            <td class="px-4 py-2 text-left">{{ $user->created_at }}</td>
                                        </tr>
                                    @endif 
                                @empty 
                                <tr>
                                    <td class="px-4 py-2 text-left" colspan="10"></td>
                                </tr>
                                @endforelse

                                @if(empty($user->is_approved == true)) 
                                    <tr>
                                        <td class="px-4 py-2 text-left" colspan="10">No Approved Voter Yet</td>
                                    </tr>
                                @endif
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
