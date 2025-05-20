@php
    use Illuminate\Support\Facades\Auth;
    $user = Auth::user();
@endphp

<div class="modal fade" id="akunModal" tabindex="-1" aria-labelledby="akunModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg border-0">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title fw-bold" id="akunModalLabel">Informasi Akun</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex flex-column align-items-start align-items-md-center">
                    <p class="mb-1 w-100"><strong>Nama:</strong> <span class="text-muted">{{ $user?->nama ?? '-' }}</span></p>
                    <p class="mb-1 w-100"><strong>Email:</strong> <span class="text-muted">{{ $user?->email ?? '-' }}</span></p>
                    <p class="mb-1 w-100"><strong>No HP:</strong> <span class="text-muted">{{ $user?->no_hp ?? '-' }}</span></p>
                    <p class="mb-1 w-100"><strong>Alamat:</strong> <span class="text-muted">{{ $user?->alamat ?? '-' }}</span></p>
                    <p class="mb-1 w-100"><strong>Jenis Kelamin:</strong> <span class="text-muted">{{ $user?->jenis_kelamin ?? '-' }}</span></p>
                    <p class="mb-1 w-100"><strong>Tanggal Lahir:</strong> 
                        <span class="text-muted">
                            {{ $user ? \Carbon\Carbon::parse($user->tanggal_lahir)->format('d-m-Y') : '-' }}
                        </span>
                    </p>
                    <p class="mb-1 w-100"><strong>Asal:</strong> <span class="text-muted">{{ $user?->asal ?? '-' }}</span></p>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                @if($user)
                    <a href="/logout" class="btn btn-sm custom-btn-outline-primary w-80 h-50">Logout</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-sm custom-btn-outline-primary w-80 h-50">Login</a>
                @endif
            </div>
        </div>
    </div>
</div>
