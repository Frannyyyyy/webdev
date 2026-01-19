<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\StudentLoginController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\Employee\DashboardController;
use App\Http\Controllers\Employee\TicketController as EmployeeTicketController;
use App\Http\Controllers\Employee\SupportManagerController;
use App\Http\Controllers\Manager\TicketController;
use App\Http\Controllers\Manager\AgentController;
use App\Http\Controllers\Manager\TicketController as ManagerTicketController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminController;
/*
|--------------------------------------------------------------------------
| 1. PUBLIC LANDING
|--------------------------------------------------------------------------
*/
Route::get('/', fn () => view('landing'))->name('landing');
Route::get('/start', fn () => view('selector'))->name('start');

/*
|--------------------------------------------------------------------------
| 2. EMPLOYEE ROLE SELECTION PAGE
|--------------------------------------------------------------------------
*/
Route::get('/login/selection', fn () => view('auth.selector-employee'))->name('login.selection');

/*
|--------------------------------------------------------------------------
| 3. LOGIN PAGES
|--------------------------------------------------------------------------
*/
// Student
Route::get('/login/student', [StudentLoginController::class, 'showLoginForm'])->name('login.student');
Route::post('/login/student', [StudentLoginController::class, 'login'])->name('student.login.submit');

// Alumni
Route::get('/login/alumni', [AlumniController::class, 'showLogin'])->name('login.alumni');
Route::post('/login/alumni', [AlumniController::class, 'login'])->name('alumni.login.submit');

// Employee Login (by role)
Route::get('/login/employee/{role?}', function ($role = null) {
    if (!$role) return redirect()->route('login.selection');

    return match ($role) {
        'manager' => view('manager.login-manager'),
        'agent'   => view('agent.login-agent'),
        'admin'   => view('admin.login-admin'),
        default   => abort(404),
    };
})->name('login.employee');

// Employee POST login
Route::post('/login/employee', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (!Auth::attempt($credentials)) {
        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    $request->session()->regenerate();

    return redirect()->route(match (Auth::user()->role) {
        'student'  => 'user.dashboard',
        'alumni'   => 'alumni.dashboard',
        'employee' => 'agent.dashboard',
        'manager'  => 'manager.dashboard',
        'admin'    => 'admin.dashboard',
        default    => 'landing',
    });
})->name('employee.login.submit');

// Redirect generic /login
Route::get('/login', fn () => redirect()->route('login.selection'))->name('login');

/*
|--------------------------------------------------------------------------
| 4. LOGOUT
|--------------------------------------------------------------------------
*/
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect($request->input('redirect_to', route('landing')));
})->name('logout');

/*
|--------------------------------------------------------------------------
| 5. STUDENT ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn () => view('user.dashboard'))->name('user.dashboard');
    Route::get('/homepage', fn () => view('user.homepage'))->name('user.homepage');
    Route::get('/document-list', fn () => view('user.document-list'))->name('user.document-list');
    Route::get('/records', fn () => view('user.records'))->name('user.records');
    Route::get('/help', fn () => view('user.help'))->name('user.help');

    // Ticket stages
    Route::get('/ticket/stage01', fn () => view('user.ticket-provide-details-stage-01'))->name('user.ticket.stage01');
    Route::get('/user/ticket/stage-02', fn () => view('user.ticket-creation-stage-02-request-and-delivery-mode'))->name('user.ticket.stage-02');
    Route::get('/ticket/stage03', fn () => view('user.ticket-creation-stage-03-receipt-finalization'))->name('user.ticket.stage03');
});

/*
|--------------------------------------------------------------------------
| 6. EMPLOYEE ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/agent/dashboard', [DashboardController::class, 'index'])->name('agent.dashboard');
    Route::post('/tickets/update', [DashboardController::class, 'update'])->name('agent.tickets.update');
    Route::get('/tickets/{id}', [EmployeeTicketController::class, 'show'])->name('tickets.show');
    Route::get('/history', [EmployeeTicketController::class, 'history'])->name('agent.history');
});

/*
|----------------------------------------------------------------------
| 7. MANAGER ROUTES
|----------------------------------------------------------------------
*/
Route::middleware('auth')->prefix('manager')->group(function () {
    // Dashboard
    Route::get('/dashboard', [SupportManagerController::class, 'index'])
        ->name('manager.dashboard');

    // Tickets
    Route::get('/tickets', [ManagerTicketController::class, 'index'])
        ->name('manager.tickets');

    // Agents
    Route::get('/agents', [AgentController::class, 'index'])
        ->name('manager.agents');
});


/*
|--------------------------------------------------------------------------
| 8. ADMIN ROUTES
|--------------------------------------------------------------------------
*/
/*
|--------------------------------------------------------------------------
| 8. ADMIN ROUTES
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('dashboard');
    
    Route::get('/users', function () {
        $tab = request('tab', 'all');
        $users = \App\Models\User::all();
        return view('admin.users', ['tab' => $tab, 'users' => $users]);
    })->name('users');
    
    // AJAX UPDATE ROUTE (use different name to avoid conflict)
    Route::post('/users/{id}/update-ajax', function ($id) {
        $user = \App\Models\User::findOrFail($id);
        
        $user->update([
            'name' => request('name'),
            'email' => request('email'),
            'department' => request('department'),
            'role' => request('role'),
            'status' => request('status')
        ]);
        
        return response()->json(['success' => true, 'message' => 'User updated successfully']);
    })->name('users.update.ajax');
    
    // AJAX RESET PASSWORD ROUTE
    Route::post('/users/{id}/reset-password-ajax', function ($id) {
        $user = \App\Models\User::findOrFail($id);
        
        // Generate random password
        $newPassword = \Illuminate\Support\Str::random(8);
        $user->update([
            'password' => \Illuminate\Support\Facades\Hash::make($newPassword)
        ]);
        
        return response()->json([
            'success' => true, 
            'message' => 'Password reset successful',
            'new_password' => $newPassword
        ]);
    })->name('users.reset-password.ajax');
});


// Admin Login Routes (NO middleware - PUBLIC)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');
});


/*
|--------------------------------------------------------------------------
| 9. ALUMNI ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->prefix('alumni')->name('alumni.')->group(function () {
    Route::get('/dashboard', [AlumniController::class, 'dashboard'])->name('dashboard');
    Route::get('/documents', [AlumniController::class, 'documents'])->name('documents');
    Route::get('/records', [AlumniController::class, 'records'])->name('records');
    Route::get('/help', [AlumniController::class, 'help'])->name('help');
});

/*
|--------------------------------------------------------------------------
| 10. DEV QUICK LOGIN LINKS (LOCAL ONLY)
|--------------------------------------------------------------------------
*/
if (app()->environment('local')) {
    Route::prefix('dev')->group(function () {
        Route::get('/{role}', function ($role) {
            abort_unless(
                in_array($role, ['student','employee','manager','admin','alumni']),
                404
            );

            Auth::logout();

            $user = \App\Models\User::firstOrCreate(
                ['email' => "{$role}@dev.local"],
                [
                    'name' => ucfirst($role).' Dev',
                    'password' => bcrypt('password'),
                    'role' => $role,
                ]
            );

            Auth::login($user);

            return redirect()->route(match ($role) {
                'student'  => 'user.dashboard',
                'employee' => 'agent.dashboard',
                'manager'  => 'manager.dashboard',
                'admin'    => 'admin.dashboard',
                'alumni'   => 'alumni.dashboard',
            });
        });
    });
}




// Simple route to check if database is connected
Route::get('/dbtest', function () {
    try {
        DB::connection()->getPdo();
        echo "✅ Database is connected!";
    } catch (\Exception $e) {
        echo "❌ Database NOT connected: " . $e->getMessage();
    }
});
