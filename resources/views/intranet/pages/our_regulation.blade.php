@extends('intranet.master_intranet')

@section('content')
<div class="bg-onboarding w-11/12  mx-auto mt-6 px-6 py-6">
    <div class="flex flex-col  bg-blur-comission border border-white text-white rounded-lg w-full px-4 py-6">
        <h4 class="text-lg font-semibold">
        Our Regulation
        </h4>

    </div>
</div>

<div class="flex mt-6 w-11/12 mx-auto gap-4">

    <div class="flex flex-col w-1/4 2xl:w-1/6 px-4 py-5 gap-5 our-regulation-background border rounded-xl border-blue-950">

        <div class="bg-login-button text-center text-white login-button flex justify-center items-center px-3 py-2 rounded-xl cursor-pointer" data-tab-target="#tab1">
            <p class="font-semibold text-base">
                Code OF Conduct
            </p>
        </div>
        <div class="text-center text-white login-button flex justify-center items-center px-3 py-2 rounded-xl cursor-pointer " data-tab-target="#tab2">
            <p class="font-semibold text-base">
                Board Manual
            </p>
        </div>
        <div class="text-center text-white login-button flex justify-center items-center px-3 py-2 rounded-xl cursor-pointer " data-tab-target="#tab3">
            <p class="font-semibold text-base">
                GCG
            </p>
        </div>
        <div class="text-center text-white login-button flex justify-center items-center px-3 py-2 rounded-xl cursor-pointer " data-tab-target="#tab4">
            <p class="font-semibold text-base">
                Gratification
            </p>
        </div>


    </div>

    <div id="tab-contents" class="w-3/4 2xl:w-5/6 our-regulation-background border rounded-xl border-blue-950 ">

        <!-- Code of Conduct -->
        <div class="w-full flex flex-col px-4 py-5 text-white" id="tab1">
            <h1 class="text-2xl font-semibold">Code of Conduct</h1>
            <p class="text-sm mt-4">
                The company has compiled a Code of Conduct as a guide for professional behavior for all company personnel. The purpose of implementing the code of ethics so that every employee has the awareness to practice good ethics and will ultimately improve and strengthen the company's reputation. 
            </p>
            <p class="text-sm mt-2 font-light">
                Therefore, ILCS is determined to actively implement a culture of compliance with ethical behavior in the company, including by encouraging the implementation of reporting on matters that can cause financial or non-financial losses to the company. 
            </p>
            <p class="text-sm mt-2 font-light">
                Company or cause tarnishing of the Company's good name
            </p>

            <div class="mt-6">
                <a href="https://www.ilcs.co.id/cfind/source/files/complience/pedoman-kode-etik-bisnis-025.umm.doo.2020-2020.pdf" target="_blank" class="text-white px-4 w-6/12 2xl:w-3/12 text-sm py-2 rounded-2xl flex items-center login-button bg-login-button">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m.75 12 3 3m0 0 3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>
                    <div class="flex flex-col text-left">
                        <p>Download Gratification Guide</p>
                        <p class="font-extralight">5.7 Mb</p>
                    </div>
                </a>
            </div>

        </div>
        <!-- Board Manual -->
        <div class="w-full hidden flex-col px-4 py-5 text-white" id="tab2">
            <h1 class="text-2xl font-semibold">Board Manual</h1>
            <p class="text-sm mt-4">
                The work guidelines and implementation of the duties of the Board of Commissioners, Directors, Supporting Organs of the Board of Commissioners, Supporting Organs of the Board of Directors refer to the Board Manual which is useful as a reference in each of their activities.
            </p>
            <div class="mt-6">
                <a href="https://www.ilcs.co.id/cfind/source/files/complience/board-of-manual-019.hkm.d00.2020-2020.pdf" target="_blank" class="text-white px-4 w-6/12 2xl:w-3/12text-sm py-2 rounded-2xl flex items-center login-button bg-login-button">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m.75 12 3 3m0 0 3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>
                    <div class="flex flex-col text-left">
                        <p>Download Board of Manual</p>
                        <p class="font-extralight">12.3 mb</p>
                    </div>
                </a>
            </div>

        </div>
        <!-- GCG -->
        <div class="w-full hidden flex-col px-4 py-5 text-white " id="tab3">
            <h1 class="text-2xl font-semibold">GCG</h1>
            <p class="text-sm mt-4">
                ILCS is committed to implementing good corporate governance with high moral standards by referring to the Guidelines for the Implementation of Good Corporate Governance.
            </p>
            <p class="text-sm mt-2 font-light">
                GCG guidelines are guidelines for all company personnel in making decisions and carrying out actions based on high morals, compliance with applicable laws and awareness of the existence of corporate social responsibility towards interested parties (stakeholders) consistently.
            </p>
            <div class="mt-6">
                <a href="https://www.ilcs.co.id/cfind/source/files/complience/pemutakhiran-pedoman-gcg-pt-ilcs-signed-off.pdf" target="_blank" class="text-white px-4 w-6/12 2xl:w-3/12 text-sm py-2 rounded-2xl flex items-center login-button bg-login-button">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m.75 12 3 3m0 0 3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>
                    <div class="flex flex-col text-left">
                        <p>Download guide for CGC</p>
                        <p class="font-extralight">27.81 mb</p>
                    </div>
                </a>
            </div>
        </div>
        <!-- Gratification -->
        <div class="w-full hidden flex-col px-4 py-5 text-white " id="tab4">
            <h1 class="text-2xl font-semibold">Gratification</h1>
            <p class="text-sm mt-4">
                The Company upholds commitments related to GCG principles and creates a healthy business climate. The management and all employees of the company try to avoid actions, behaviors, or actions that will cause a conflict of interest. In addition, the company also applies rules for every form of giving, requesting, and receiving gratuities, as well as attempts to obtain bribes.
            </p>

            <div class="mt-6">
                <a href="https://www.ilcs.co.id/cfind/source/files/complience/pedoman-gratifikasi-027.hkm.d00.2020-2020.pdf" target="_blank" class="text-white px-4 w-6/12 2xl:w-3/12 text-sm py-2 rounded-2xl flex items-center login-button bg-login-button">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m.75 12 3 3m0 0 3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>
                    <div class="flex flex-col text-left">
                        <p>Download Gratification Guide</p>
                        <p class="font-extralight">5.79 mb</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        let tabs = document.querySelectorAll('[data-tab-target]');
        let tabContents = document.querySelectorAll('#tab-contents > div');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                tabs.forEach(item => item.classList.remove('bg-login-button'));
                tab.classList.add('bg-login-button');
                const target = document.querySelector(tab.dataset.tabTarget);
                tabContents.forEach(content => content.classList.add('hidden'));
                target.classList.remove('hidden');
                target.classList.add('flex');
            });
        });
    });
</script>
@endsection