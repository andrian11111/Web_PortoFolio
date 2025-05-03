<!-- Start Sidebar -->
<div id="app-menu"
    class="hs-overlay fixed inset-y-0 start-0 z-[60] hidden w-64 -translate-x-full transform overflow-y-auto border-e border-default-200 bg-white transition-all duration-300 hs-overlay-open:translate-x-0 lg:bottom-0 lg:end-auto lg:z-30 lg:block lg:translate-x-0 rtl:translate-x-full rtl:hs-overlay-open:translate-x-0 rtl:lg:translate-x-0 print:hidden [--overlay-backdrop:true] lg:[--overlay-backdrop:false]">
    <div class="sticky top-0 flex h-16 items-center justify-center px-6">
        <a href="dashboard.index" class="flex items-center space-x-3">
            <!-- <div class="bg-green-500 text-white rounded-full h-10 w-10 flex items-center justify-center text-lg font-bold">
            A
          </div> -->
            <div class="group transition-transform duration-500 ">
                <div class="transform group-hover:scale-110">
                <img src="{{ asset('uk.jpg') }}" class="w-14 h-14 rounded-full object-cover border-2 border-purple-500">
                </div>
            </div>

            <span class="font-semibold text-xl">porto<span class="text-purple-600">Andrian</span></span>
        </a>
    </div>

    <div class="hs-accordion-group h-[calc(100%-72px)] p-4 ps-0" data-simplebar>
        <ul class="admin-menu flex w-full flex-col gap-1.5">

            <li class="menu-item">
                <a href=" {{ route('dashboard.index')}}"
                    class="group flex items-center gap-x-3.5 rounded-e-full px-4 py-2 text-sm font-medium text-default-700 transition-all hover:bg-default-100 hs-accordion-active:bg-default-100">
                    <i
                        class="material-symbols-rounded font-light text-2xl transition-all group-hover:fill-1">article</i>
                    <span class="menu-text"> Dashboard </span>
                </a>
            </li>

            <li class="px-5 py-2 text-sm font-medium text-default-600">Edit</li>

            <li class="menu-item">
                <a href="{{ route('dashboard.skill')}}"
                    class="group flex items-center gap-x-3.5 rounded-e-full px-4 py-2 text-sm font-medium text-default-700 transition-all hover:bg-default-100">
                    <i class="material-symbols-rounded font-light text-2xl transition-all group-hover:fill-1">map</i>
                    <span class="menu-text"> Skill </span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('dashboard.service')}}"
                    class="group flex items-center gap-x-3.5 rounded-e-full px-4 py-2 text-sm font-medium text-default-700 transition-all hover:bg-default-100">
                    <i class="material-symbols-rounded font-light text-2xl transition-all group-hover:fill-1">map</i>
                    <span class="menu-text"> Service </span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('dashboard.portofolio')}}"
                    class="group flex items-center gap-x-3.5 rounded-e-full px-4 py-2 text-sm font-medium text-default-700 transition-all hover:bg-default-100">
                    <i class="material-symbols-rounded font-light text-2xl transition-all group-hover:fill-1">map</i>
                    <span class="menu-text"> Portofolio </span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- End Sidebar -->