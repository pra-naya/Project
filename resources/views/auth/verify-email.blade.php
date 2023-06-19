<x-layout>
<div class="row justify-content-center mt-5">
    <div class="col-md-8">

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-dark text-white text-md-start p-3 fs-4">Verify Email</div>
            <div class="card-body text-primary d-flex justify-content-center align-items-center flex-column">
                <h5 class="mb-4 text-black">Having trouble finding the verification email?</h5>
                <form action="{{ route('verification.send') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-lg">Resend Verification Link</button>
                </form>
            </div>
        </div>
    </div>    
</div>
</x-layout>