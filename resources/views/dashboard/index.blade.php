@extends('dashboard.layout.template')

@section('title', 'Dashboard')

@section('content')


<main class="flex-grow p-6">

    <!-- Page Title Start -->
    <div class="flex items-center justify-between flex-wrap gap-2 mb-6">
        <div>
            <h1 class=" text-gray-300 text-5xl font-medium">Selamat Datang <span class="text-gray-300">Admin</span></h1>
        </div>
    </div>
    <!-- Page Title End -->

    <div class="grid xl:grid-cols-4 md:grid-cols-2 gap-6 mb-6">
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="p-5">
                    <span class="material-symbols-rounded float-end text-3xl text-default-400">stacks</span>
                    <h6 class="text-muted text-sm uppercase">Skill</h6>
                    <h3 class="text-2xl mb-3" data-plugin="counterup">1,587</h3>
                    <span
                        class="inline-flex items-center gap-1.5 py-0.5 px-1.5 text-xs font-medium bg-success text-white rounded me-1">
                        +11% </span> <span class="text-muted">From previous period</span>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="p-5">
                    <span class="material-symbols-rounded float-end text-3xl text-default-400">payments</span>
                    <h6 class="text-muted text-sm uppercase">Service</h6>
                    <h3 class="text-2xl mb-3">$<span data-plugin="counterup">46,782</span></h3>
                    <span
                        class="inline-flex items-center gap-1.5 py-0.5 px-1.5 text-xs font-medium bg-danger text-white rounded me-1">
                        -29% </span> <span class="text-muted">From previous period</span>
                </div>
            </div>
        </div>

       
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="p-5">
                    <span class="material-symbols-rounded float-end text-3xl text-default-400">shopping_cart</span>
                    <h6 class="text-muted text-sm uppercase">Portofolio</h6>
                    <h3 class="text-2xl mb-3" data-plugin="counterup">1,890</h3>
                    <span
                        class="inline-flex items-center gap-1.5 py-0.5 px-1.5 text-xs font-medium bg-success text-white rounded me-1">
                        +89% </span> <span class="text-muted">Last year</span>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Footer End -->

</div>
<!-- End Page content -->

</div>

@endsection