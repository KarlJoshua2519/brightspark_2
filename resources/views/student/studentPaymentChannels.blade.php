@extends('layouts.app')

@section('title', 'Student Payment Channels')
@section('content')

    <x-brightsparks_header />

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <x-student_sidebar />

    <div class="p-4 sm:ml-64">
        <!-- Main Container for Payment Channels -->
        <div class="p-6 mt-14 bg-white shadow-lg rounded-lg border border-gray-200 dark:border-gray-700">

            <!-- Page Header -->
            <h1 class="text-3xl font-bold text-gray-800 mb-6">Available Payment Channels</h1>

            <!-- Introduction or Instructions -->
            <p class="text-gray-600 mb-8">
                Please select one of the following payment channels to complete your tuition payments. Follow the instructions provided for each method.
            </p>

            <!-- Payment Channels Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Example Payment Channel 1: Bank Transfer -->
                <div class="p-4 bg-blue-100 border border-blue-200 rounded-lg shadow hover:bg-blue-200 transition duration-300">
                    <div class="flex items-center mb-4">
                        
                        <h2 class="text-lg font-semibold text-blue-800">Bank Transfer</h2>
                    </div>
                    <p class="text-blue-700 mb-2">Transfer your payment directly from your bank account to the school's official account.</p>
                    <p class="text-sm text-blue-600 mb-4">Account No: 1234 5678 9101 | ABC Bank</p>
                    <a href="#" class="text-right text-blue-600 font-bold block">View Instructions →</a>
                </div>

                <!-- Example Payment Channel 2: Credit/Debit Card -->
                <div class="p-4 bg-green-100 border border-green-200 rounded-lg shadow hover:bg-green-200 transition duration-300">
                    <div class="flex items-center mb-4">
                       
                        <h2 class="text-lg font-semibold text-green-800">Credit/Debit Card</h2>
                    </div>
                    <p class="text-green-700 mb-2">Pay securely using your credit or debit card.</p>
                    <p class="text-sm text-green-600 mb-4">We accept Visa, Mastercard, and more.</p>
                    <a href="#" class="text-right text-green-600 font-bold block">Proceed to Payment →</a>
                </div>

                <!-- Example Payment Channel 3: PayPal -->
                <div class="p-4 bg-yellow-100 border border-yellow-200 rounded-lg shadow hover:bg-yellow-200 transition duration-300">
                    <div class="flex items-center mb-4">
                        
                        <h2 class="text-lg font-semibold text-yellow-800">PayPal</h2>
                    </div>
                    <p class="text-yellow-700 mb-2">Make a quick and easy payment through PayPal.</p>
                    <a href="#" class="text-right text-yellow-600 font-bold block">Pay with PayPal →</a>
                </div>

                <!-- Add more payment channels as needed -->
            </div>

            <!-- Additional Information or Support Section -->
            <div class="mt-8">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Need Help?</h2>
                <p class="text-gray-600">
                    If you encounter any issues with your payment or need assistance, please contact our billing support team at
                    <a href="mailto:support@school.com" class="text-blue-600 underline">support@school.com</a> or call (123) 456-7890.
                </p>
            </div>

        </div>
    </div>

@endsection
