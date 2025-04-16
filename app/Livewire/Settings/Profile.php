<?php

namespace App\Livewire\Settings;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Profile extends Component
{
    public string $name = '';

    public string $email = '';

    public User $user; // Properti untuk user

    public string $role = ''; // Pastikan ada properti role


    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->user = Auth::user(); // Mengambil user yang sedang login
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->role = $this->user->role; // Pastikan role sudah terisi
    }
    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $user = $this->user; // Gunakan $this->user yang sudah didefinisikan

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($user->id),
            ],
            'role' => [
                'required',
                Rule::in(['admin', 'siswa']),
                function ($attribute, $value, $fail) use ($user) {
                    // Validasi hanya admin yang bisa mengubah role
                    if ($user->role === 'siswa' && $value === 'admin') {
                        $fail('Role siswa tidak dapat diubah menjadi admin.');
                    }
                },
            ],
        ]);

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        $this->dispatch('profile-updated', name: $user->name);
    }



    /**
     * Send an email verification notification to the current user.
     */
    public function resendVerificationNotification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false));

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }
}
