@extends('layouts.app')

@section('content')

    <!--This is from show.blade-->
    <div class="modal fade" id="fractionModal" tabindex="-1" aria-labelledby="modalLabel-{{ $fraction->id }}" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel-{{ $fraction->id }}">{{ $fraction->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="storage/laravel/{{ $fraction->image_path }}" class="img-fluid mb-3" alt="{{ $fraction->name }}">
                    <p>
                        <span data-bs-toggle="popover" data-bs-trigger="hover" data-bs-content="{{ $fraction->subtitle }}">{{ $fraction->name }}</span>
                        — {{ $fraction->description }}
                    </p>
                    <button type="button" class="btn btn-primary" onclick="showToast()">
                        <i class="fas fa-download"></i> Загрузить
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const modalElement = document.getElementById('fractionModal');

        if (modalElement) {
            const modal = new bootstrap.Modal(modalElement);
            modal.show();
        }
    });
</script>
@endpush