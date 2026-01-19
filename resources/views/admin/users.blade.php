@extends('admin.admin-layouts')

@section('hide_left_sidebar')
@endsection

@php
  $tab = request('tab', 'all'); // all | employee | students
  
  // Get users from database
  $users = \App\Models\User::all();
  
  // Filter users based on tab
  if ($tab === 'employee') {
      $filteredUsers = $users->whereIn('role', ['support_manager', 'support_agent']);
  } elseif ($tab === 'students') {
      $filteredUsers = $users->where('role', 'student');
  } else {
      $filteredUsers = $users;
  }
@endphp

@section('content')
<div class="min-h-[calc(100vh-2rem)] bg-[#FBF7EB] p-6">
  <div class="max-w-6xl mx-auto">
    <div class="bg-[#FBF7EB] border-[4px] border-black rounded-3xl overflow-hidden shadow-[10px_10px_0px_#000]">
      <div class="flex">

        <!-- MAIN -->
        <main class="flex-1 bg-[#FBF7EB]">
          <div class="px-8 pt-8 pb-5">
            <h1 class="text-3xl font-black">User Management</h1>
            <p class="font-bold text-gray-700">Access Control &amp; Account Oversight</p>
          </div>
          <div class="border-t-[2px] border-black"></div>

          <div class="px-8 py-6">
            <!-- Tabs + Search -->
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 mb-5">
              <div class="flex items-center gap-8">

                <!-- All Users -->
                <a href="{{ route('admin.users', ['tab' => 'all']) }}"
                   class="px-8 py-2 rounded-xl border-[3px] border-black shadow-[3px_3px_0px_#000] font-black
                          {{ $tab === 'all' ? 'bg-[#D1D5DB]' : 'bg-[#FBF7EB] hover:bg-white' }}">
                  All Users
                </a>

                <!-- Employee -->
                <a href="{{ route('admin.users', ['tab' => 'employee']) }}"
                   class="px-8 py-2 rounded-xl border-[3px] border-black shadow-[3px_3px_0px_#000] font-black
                          {{ $tab === 'employee' ? 'bg-[#D1D5DB]' : 'bg-[#FBF7EB] hover:bg-white' }}">
                  Employee
                </a>

                <!-- Students -->
                <a href="{{ route('admin.users', ['tab' => 'students']) }}"
                   class="px-8 py-2 rounded-xl border-[3px] border-black shadow-[3px_3px_0px_#000] font-black
                          {{ $tab === 'students' ? 'bg-[#D1D5DB]' : 'bg-[#FBF7EB] hover:bg-white' }}">
                  Students
                </a>

              </div>

              <div class="w-full lg:w-[340px]">
                <div class="flex items-center bg-white border-[3px] border-black rounded-xl px-4 py-2 shadow-[3px_3px_0px_#000]">
                  <input type="text" placeholder="Search users" class="w-full bg-transparent outline-none font-bold" />
                  <span class="text-xl">🔍</span>
                </div>
              </div>
            </div>

            <!-- Table -->
            <div class="bg-white border-[4px] border-black rounded-2xl shadow-[8px_8px_0px_#000] overflow-hidden">
              <div class="grid grid-cols-5 font-black text-center border-b-[3px] border-black">
                <div class="py-3 border-r-[3px] border-black">Name</div>
                <div class="py-3 border-r-[3px] border-black">Email</div>
                <div class="py-3 border-r-[3px] border-black">Role</div>
                <div class="py-3 border-r-[3px] border-black">Status</div>
                <div class="py-3">Action</div>
              </div>

              {{-- SHOW REAL USERS FROM DATABASE --}}
              @if($filteredUsers->count() > 0)
                @foreach($filteredUsers as $user)
                <div class="grid grid-cols-5 text-center font-bold {{ !$loop->last ? 'border-b-[3px] border-black' : '' }}">
                  <div class="py-6 border-r-[3px] border-black">{{ $user->name }}</div>
                  <div class="py-6 border-r-[3px] border-black leading-tight">{{ $user->email }}</div>
                  <div class="py-6 border-r-[3px] border-black">
                    @if($user->role === 'student')
                    <span class="inline-block px-10 py-2 rounded-full border-[3px] border-black bg-[#FEF08A] shadow-[3px_3px_0px_#000] font-black">
                      Student
                    </span>
                    @elseif($user->role === 'support_manager')
                    <span class="inline-block px-6 py-2 rounded-full border-[3px] border-black bg-[#FEF08A] shadow-[3px_3px_0px_#000] font-black leading-tight">
                      Support<br>Manager
                    </span>
                    @elseif($user->role === 'support_agent')
                    <span class="inline-block px-7 py-2 rounded-full border-[3px] border-black bg-[#FEF08A] shadow-[3px_3px_0px_#000] font-black leading-tight">
                      Support<br>Agent
                    </span>
                    @elseif($user->role === 'alumni')
                    <span class="inline-block px-8 py-2 rounded-full border-[3px] border-black bg-[#FEF08A] shadow-[3px_3px_0px_#000] font-black">
                      Alumni
                    </span>
                    @else
                    <span class="inline-block px-8 py-2 rounded-full border-[3px] border-black bg-[#FEF08A] shadow-[3px_3px_0px_#000] font-black">
                      {{ ucfirst($user->role) }}
                    </span>
                    @endif
                  </div>
                  <div class="py-6 border-r-[3px] border-black">
                    @if($user->status === 'Active')
                    <span class="inline-block px-8 py-2 rounded-full border-[3px] border-black bg-[#2DD4BF] shadow-[3px_3px_0px_#000] font-black">
                      Active
                    </span>
                    @else
                    <span class="inline-block px-6 py-2 rounded-full border-[3px] border-black bg-[#EF4444] shadow-[3px_3px_0px_#000] font-black">
                      Deactivated
                    </span>
                    @endif
                  </div>
                  <div class="py-6">
                    <button type="button"
                      onclick="openUpdateUserModal({
                        id: {{ $user->id }},
                        name: '{{ $user->name }}',
                        email: '{{ $user->email }}',
                        department: '{{ $user->department ?? '' }}',
                        role: '{{ $user->role }}',
                        status: '{{ $user->status }}'
                      })"
                      class="px-6 py-2 rounded-full bg-[#1747E7] text-white border-[3px] border-black shadow-[3px_3px_0px_#000] font-black leading-tight">
                      View<br>Details
                    </button>
                  </div>
                </div>
                @endforeach
              @else
                {{-- SHOW HARDCODED DEMO DATA IF NO USERS --}}
                @if($tab === 'employee')
                  <!-- Employee Row 1 -->
                  <div class="grid grid-cols-5 text-center font-bold border-b-[3px] border-black">
                    <div class="py-6 border-r-[3px] border-black">DeanneMata</div>
                    <div class="py-6 border-r-[3px] border-black leading-tight">nyahahaha@examp<br>le.com</div>
                    <div class="py-6 border-r-[3px] border-black">
                      <span class="inline-block px-6 py-2 rounded-full border-[3px] border-black bg-[#FEF08A] shadow-[3px_3px_0px_#000] font-black leading-tight">
                        Support<br>Manager
                      </span>
                    </div>
                    <div class="py-6 border-r-[3px] border-black">
                      <span class="inline-block px-8 py-2 rounded-full border-[3px] border-black bg-[#2DD4BF] shadow-[3px_3px_0px_#000] font-black">
                        Active
                      </span>
                    </div>
                    <div class="py-6">
                      <button type="button"
                        onclick="openUpdateUserModal({
                          name:'Deanne Mata',
                          email:'nyahahahh@gmail.com',
                          department:'IT Support',
                          role:'Support Manager',
                          status:'Active'
                        })"
                        class="px-6 py-2 rounded-full bg-[#1747E7] text-white border-[3px] border-black shadow-[3px_3px_0px_#000] font-black leading-tight">
                        View<br>Details
                      </button>
                    </div>
                  </div>
                @elseif($tab === 'students')
                  <div class="grid grid-cols-5 text-center font-bold">
                    <div class="py-6 border-r-[3px] border-black">JaneDoe</div>
                    <div class="py-6 border-r-[3px] border-black leading-tight">nyahahaha@examp<br>le.com</div>
                    <div class="py-6 border-r-[3px] border-black">
                      <span class="inline-block px-10 py-2 rounded-full border-[3px] border-black bg-[#FEF08A] shadow-[3px_3px_0px_#000] font-black">
                        Student
                      </span>
                    </div>
                    <div class="py-6 border-r-[3px] border-black">
                      <span class="inline-block px-8 py-2 rounded-full border-[3px] border-black bg-[#2DD4BF] shadow-[3px_3px_0px_#000] font-black">
                        Active
                      </span>
                    </div>
                    <div class="py-6">
                      <button type="button"
                        onclick="openUpdateUserModal({
                          name:'Jane Doe',
                          email:'nyahahaha@example.com',
                          department:'Registrar',
                          role:'Student',
                          status:'Active'
                        })"
                        class="px-6 py-2 rounded-full bg-[#1747E7] text-white border-[3px] border-black shadow-[3px_3px_0px_#000] font-black leading-tight">
                        View<br>Details
                      </button>
                    </div>
                  </div>
                @else
                  <!-- Show all demo data -->
                  <div class="grid grid-cols-5 text-center font-bold border-b-[3px] border-black">
                    <div class="py-6 border-r-[3px] border-black">DeanneMata</div>
                    <div class="py-6 border-r-[3px] border-black leading-tight">nyahahaha@examp<br>le.com</div>
                    <div class="py-6 border-r-[3px] border-black">
                      <span class="inline-block px-6 py-2 rounded-full border-[3px] border-black bg-[#FEF08A] shadow-[3px_3px_0px_#000] font-black leading-tight">
                        Support<br>Manager
                      </span>
                    </div>
                    <div class="py-6 border-r-[3px] border-black">
                      <span class="inline-block px-8 py-2 rounded-full border-[3px] border-black bg-[#2DD4BF] shadow-[3px_3px_0px_#000] font-black">
                        Active
                      </span>
                    </div>
                    <div class="py-6">
                      <button type="button"
                        onclick="openUpdateUserModal({
                          name:'Deanne Mata',
                          email:'nyahahahh@gmail.com',
                          department:'IT Support',
                          role:'Support Manager',
                          status:'Active'
                        })"
                        class="px-6 py-2 rounded-full bg-[#1747E7] text-white border-[3px] border-black shadow-[3px_3px_0px_#000] font-black leading-tight">
                        View<br>Details
                      </button>
                    </div>
                  </div>
                @endif
              @endif
            </div>

            <!-- Bottom Buttons -->
            <div class="flex flex-col md:flex-row md:justify-center gap-6 mt-6">
           
            </div>
          </div>
        </main>

      </div>
    </div>
  </div>
</div>

{{-- =========================
   UPDATE USER MODAL (Screenshot Style)
========================== --}}
<div id="updateUserModal" class="hidden">
  <!-- backdrop -->
  <div class="fixed inset-0 bg-black/40 z-[80]" onclick="closeUpdateUserModal()"></div>

  <!-- layout -->
  <div class="fixed inset-0 z-[90] flex items-center justify-center p-4">
    <div class="w-full max-w-6xl flex gap-6">

      <!-- LEFT SIDE (Edit Role + Status) -->
      <div class="hidden md:flex flex-col gap-6 w-[280px]">

        <!-- Edit Role -->
        <div class="bg-white border-[3px] border-black rounded-xl shadow-[6px_6px_0px_#000] overflow-hidden">
          <div class="px-4 py-3 font-black border-b-[2px] border-black text-lg">Edit Role</div>

          <div class="p-4 font-bold space-y-2">
            <button type="button" onclick="setUpdateRole('student')" class="block w-full text-left hover:underline">Student</button>
            <button type="button" onclick="setUpdateRole('support_manager')" class="block w-full text-left hover:underline">SupportManager</button>
            <button type="button" onclick="setUpdateRole('support_agent')" class="block w-full text-left hover:underline">SupportAgent</button>
            <button type="button" onclick="setUpdateRole('alumni')" class="block w-full text-left hover:underline">Alumni</button>

            <div class="flex items-center justify-between pt-2">
              <span class="font-black">Deactivated</span>

              <label class="relative inline-flex items-center cursor-pointer">
                <input id="roleDeactivateToggle" type="checkbox" class="sr-only peer" onchange="syncDeactivateFromLeftRole()">
                <div class="w-12 h-6 bg-gray-300 peer-checked:bg-gray-800 rounded-full peer relative
                            after:content-[''] after:absolute after:top-0.5 after:left-0.5 after:w-5 after:h-5 after:bg-white after:rounded-full
                            peer-checked:after:translate-x-6 after:transition"></div>
              </label>
            </div>

            <div class="pt-3">
              <button type="button" onclick="closeUpdateUserModal()"
                class="w-11 h-11 bg-red-600 text-white border-[3px] border-black shadow-[3px_3px_0px_#000] font-black rounded-md">
                X
              </button>
            </div>
          </div>
        </div>

        <!-- Status -->
        <div class="bg-white border-[3px] border-black rounded-xl shadow-[6px_6px_0px_#000] overflow-hidden">
          <div class="px-4 py-3 font-black border-b-[2px] border-black text-lg">Status</div>

          <div class="p-4 font-bold space-y-3">
            <div>Active</div>
            <div>Deactivated</div>

            <div class="flex justify-end">
              <label class="relative inline-flex items-center cursor-pointer">
                <input id="statusDeactivateToggle" type="checkbox" class="sr-only peer" onchange="syncDeactivateFromLeftStatus()">
                <div class="w-12 h-6 bg-gray-300 peer-checked:bg-gray-800 rounded-full peer relative
                            after:content-[''] after:absolute after:top-0.5 after:left-0.5 after:w-5 after:h-5 after:bg-white after:rounded-full
                            peer-checked:after:translate-x-6 after:transition"></div>
              </label>
            </div>

            <button type="button" onclick="closeUpdateUserModal()"
              class="w-11 h-11 bg-red-600 text-white border-[3px] border-black shadow-[3px_3px_0px_#000] font-black rounded-md">
              X
            </button>
          </div>
        </div>
      </div>

      <!-- MAIN DETAILS PANEL -->
      <div class="flex-1 bg-white border-[4px] border-black rounded-2xl shadow-[10px_10px_0px_#000] overflow-hidden">
        <div class="p-6">
          <h2 class="text-center text-2xl font-black text-red-600">Details</h2>
          <div class="border-t-[2px] border-black mt-3"></div>

          <div class="mt-4 max-h-[70vh] overflow-y-auto pr-3">

            <!-- Personal Information -->
            <div class="border-t-[2px] border-black"></div>
            <h3 class="text-xl font-black py-2 border-b-[2px] border-black">Personal Information</h3>

            <div class="font-bold">
              <div class="flex items-center gap-4 py-3 border-b border-black/30">
                <div class="w-40 font-black">Full Name:</div>
                <input id="updName" class="flex-1 bg-transparent outline-none font-bold" />
              </div>

              <div class="flex items-center gap-4 py-3 border-b border-black/30">
                <div class="w-40 font-black">Email:</div>
                <input id="updEmail" class="flex-1 bg-transparent outline-none font-bold" />
              </div>

              <div class="flex items-center gap-4 py-3 border-b border-black/30">
                <div class="w-40 font-black">Department:</div>
                <input id="updDept" class="flex-1 bg-transparent outline-none font-bold" />
              </div>
            </div>

            <!-- Access Control -->
            <div class="mt-4 border-t-[2px] border-black"></div>
            <h3 class="text-xl font-black py-2 border-b-[2px] border-black">Access ControlandRole Assignment</h3>

            <div class="mt-4 bg-[#FAD4D8] border-[3px] border-black rounded-xl p-4">
              <div class="font-black mb-2">Account Status</div>

              <div class="flex items-center gap-4">
                <input id="updRole" class="flex-1 bg-white/60 border-[2px] border-black rounded-lg px-3 py-2 font-bold" readonly />

                <div class="flex items-center gap-3">
                  <label class="relative inline-flex items-center cursor-pointer">
                    <input id="updActiveToggle" type="checkbox" class="sr-only peer" onchange="syncDeactivateFromMain()">
                    <div class="w-12 h-6 bg-gray-300 peer-checked:bg-[#2DD4BF] rounded-full peer relative
                                after:content-[''] after:absolute after:top-0.5 after:left-0.5 after:w-5 after:h-5 after:bg-white after:rounded-full
                                peer-checked:after:translate-x-6 after:transition"></div>
                  </label>
                  <div id="updStatusText" class="font-black">Active</div>
                </div>
              </div>

              <div class="text-center text-xs font-black text-red-600 mt-2">
                Toggle to Deactivate Account
              </div>
            </div>

            <!-- Buttons -->
            <div class="mt-6 flex items-center justify-between gap-4">
              <button type="button" onclick="resetPassword()"
                class="px-6 py-3 bg-[#5B5B5B] text-white font-black border-[3px] border-black shadow-[4px_4px_0px_#000]">
                Reset Password
              </button>

              <button type="button" onclick="saveUpdateUser()"
                class="px-6 py-3 bg-[#5B5B5B] text-white font-black border-[3px] border-black shadow-[4px_4px_0px_#000]">
                SaveChanges
              </button>
            </div>

            <div class="mt-4 flex justify-end">
              <button type="button" onclick="closeUpdateUserModal()"
                class="px-10 py-3 bg-[#1747E7] text-white font-black border-[3px] border-black shadow-[4px_4px_0px_#000]">
                Close
              </button>
            </div>

          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<script>
    let updUser = null;

    function openUpdateUserModal(user){
        updUser = {...user};

        document.getElementById('updName').value = updUser.name || '';
        document.getElementById('updEmail').value = updUser.email || '';
        document.getElementById('updDept').value = updUser.department || '';
        document.getElementById('updRole').value = updUser.role || '';

        const isActive = (updUser.status || '').toLowerCase() === 'active';
        document.getElementById('updActiveToggle').checked = isActive;
        document.getElementById('updStatusText').textContent = isActive ? 'Active' : 'Deactivated';

        // left toggles
        document.getElementById('roleDeactivateToggle').checked = !isActive;
        document.getElementById('statusDeactivateToggle').checked = !isActive;

        document.getElementById('updateUserModal').classList.remove('hidden');
    }

    function closeUpdateUserModal(){
        document.getElementById('updateUserModal').classList.add('hidden');
    }

    function setUpdateRole(role){
        document.getElementById('updRole').value = role;
    }

    // Left role deactivate toggle sync
    function syncDeactivateFromLeftRole(){
        const deactivated = document.getElementById('roleDeactivateToggle').checked;
        document.getElementById('updActiveToggle').checked = !deactivated;
        document.getElementById('updStatusText').textContent = deactivated ? 'Deactivated' : 'Active';
        document.getElementById('statusDeactivateToggle').checked = deactivated;
    }

    // Left status deactivate toggle sync
    function syncDeactivateFromLeftStatus(){
        const deactivated = document.getElementById('statusDeactivateToggle').checked;
        document.getElementById('updActiveToggle').checked = !deactivated;
        document.getElementById('updStatusText').textContent = deactivated ? 'Deactivated' : 'Active';
        document.getElementById('roleDeactivateToggle').checked = deactivated;
    }

    // Main toggle sync -> left toggles
    function syncDeactivateFromMain(){
        const isActive = document.getElementById('updActiveToggle').checked;
        document.getElementById('updStatusText').textContent = isActive ? 'Active' : 'Deactivated';
        document.getElementById('roleDeactivateToggle').checked = !isActive;
        document.getElementById('statusDeactivateToggle').checked = !isActive;
    }

    // NEW: Reset Password function
    function resetPassword() {
        if (!updUser || !updUser.id) {
            alert('No user selected!');
            return;
        }

        if (confirm('Reset password for ' + updUser.name + '?')) {
            fetch(`/admin/users/${updUser.id}/reset-password-ajax`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Password reset successful! New password: ' + data.new_password);
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error resetting password');
            });
        }
    }

    // UPDATED: Save Update User function (now works with database)
    function saveUpdateUser(){
        if (!updUser || !updUser.id) {
            alert('No user selected!');
            return;
        }

        // Get updated values
        const updatedData = {
            name: document.getElementById('updName').value,
            email: document.getElementById('updEmail').value,
            department: document.getElementById('updDept').value,
            role: document.getElementById('updRole').value,
            status: document.getElementById('updActiveToggle').checked ? 'Active' : 'Deactivated'
        };

        // Send AJAX request to update user
        fetch(`/admin/users/${updUser.id}/update-ajax`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify(updatedData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('User updated successfully!');
                closeUpdateUserModal();
                location.reload(); // Refresh page to show updated data
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error updating user');
        });
    }
</script>

@endsection
