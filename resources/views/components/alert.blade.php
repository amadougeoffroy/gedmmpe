
    @if (session()->has('success'))
            <div class="mt-6 -mb-6 intro-y">
                <div class="alert alert-dismissible show box bg-success text-white flex items-center mb-6" role="alert">
                    <span>
                    {{session()->get('success')}}
                    </span>
                    <button type="button" class="btn-close text-white" data-tw-dismiss="alert" aria-label="Close"> <i data-lucide="x" class="w-4 h-4"></i> </button>
                </div>
            </div>
        @endif

        @if (session()->has('danger'))
        <div class="mt-6 -mb-6 intro-y">
                <div class="alert alert-dismissible show box bg-danger text-white flex items-center mb-6" role="alert">
                    <span>
                    {{session()->get('danger')}}
                    </span>
                    <button type="button" class="btn-close text-white" data-tw-dismiss="alert" aria-label="Close"> <i data-lucide="x" class="w-4 h-4"></i> </button>
                </div>
            </div>
        @endif

        @if (session()->has('warning'))
        <div class="mt-6 -mb-6 intro-y">
                <div class="alert alert-dismissible show box bg-warning text-white flex items-center mb-6" role="alert">
                    <span>
                    {{session()->get('warning')}}
                    </span>
                    <button type="button" class="btn-close text-white" data-tw-dismiss="alert" aria-label="Close"> <i data-lucide="x" class="w-4 h-4"></i> </button>
                </div>
            </div>
        @endif

        
        @if (session()->has('info'))
        <div class="mt-6 -mb-6 intro-y">
                <div class="alert alert-dismissible show box bg-primary text-white flex items-center mb-6" role="alert">
                    <span>
                    {{session()->get('info')}}
                    </span>
                    <button type="button" class="btn-close text-white" data-tw-dismiss="alert" aria-label="Close"> <i data-lucide="x" class="w-4 h-4"></i> </button>
                </div>
            </div>
        @endif