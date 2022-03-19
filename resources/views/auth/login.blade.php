<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">

        </x-slot>
            <section class="gradient-custom">
                <div class="container py-5">
                    <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-12 col-md-6 col-lg-4 col-xl-5">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">

                            <h4 class="fw-bold mb-2 text-uppercase">Login</h4>
                                <!-- Session Status -->
                                <x-auth-session-status class="mb-4" :status="session('status')" />

                                <!-- Validation Errors -->
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-outline form-white mb-4">
                                        <input placeholder="Email" type="email" id="typeEmailX" class="form-control form-control-lg" 
                                            name="email" 
                                            :value="old('email')" 
                                            required autofocus/>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input placeholder="Password" type="password" id="typePasswordX" class="form-control form-control-lg" 
                                            type="password"
                                            name="password"
                                            required autocomplete="current-password"/>
                                    </div>

                                    <!--<p class="small mb-5 pb-lg-2">
                                    @if (Route::has('password.request'))
                                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                                {{ __('Forgot your password?') }}
                                            </a>
                                        @endif
                                    </p>-->

                                    <x-button class="ml-3 btn btn-outline-light btn-lg px-5">
                                        {{ __('Log in') }}
                                    </x-button>
                                </form>
                            </div>

                            <div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </section>
    </x-auth-card>
</x-guest-layout>
