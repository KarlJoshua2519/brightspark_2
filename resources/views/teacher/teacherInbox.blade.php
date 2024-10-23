@extends('layouts.app')

@section('title', 'Inbox')
@section('content')

<x-brightsparks_header />
<x-teacher_sidebar />

<div class="p-6 sm:ml-64 mt-16">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-3xl font-semibold text-gray-800 mb-6 text-center">Inbox</h2>

        <!-- Compose Message Button -->
        <div class="text-right mb-4">
            <button class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition duration-200" onclick="showComposeModal()">
                Compose Message
            </button>
        </div>

        <!-- Message List (Clicking the message redirects to conversation, but without backend it just opens a placeholder) -->
        <div id="messageList" class="space-y-4">
            <!-- Sample Message -->
            <div class="flex justify-between items-start bg-gray-50 p-4 rounded-lg shadow-sm hover:shadow-md transition duration-200 cursor-pointer" onclick="showConversation('Subject 1', 'This is the body of the message.')">
                <div class="flex-grow">
                    <h3 class="text-lg font-medium text-gray-700">Subject 1</h3>
                    <p class="text-gray-500 text-sm">From: sender@example.com | Date: 2024-10-23</p>
                    <p class="text-gray-600 text-sm mt-1">This is a preview of the message body...</p>
                </div>
                <button class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700 transition duration-200" onclick="event.stopPropagation(); deleteMessage(this);">
                    Delete
                </button>
            </div>

            <!-- Add more sample messages as needed -->
        </div>

        <!-- No messages message (hidden initially) -->
        <p id="noMessages" class="text-center text-gray-500 mt-4 hidden">Your inbox is empty.</p>
    </div>
</div>

<!-- Compose Message Modal (Hidden by default) -->
<div id="composeModal" class="fixed inset-0 z-50 hidden bg-gray-800 bg-opacity-50 flex items-center justify-center">
    <div class="bg-white rounded-lg p-6 w-11/12 md:w-1/3">
        <h3 class="text-xl font-semibold mb-4">Compose Message</h3>
        <div>
            <form id="composeForm" onsubmit="composeMessage(event)">
                <label for="recipient" class="block text-gray-700">To:</label>
                <input type="text" id="recipient" class="border border-gray-300 rounded-md w-full p-2 mb-4" placeholder="Recipient's email">
                
                <label for="subject" class="block text-gray-700">Subject:</label>
                <input type="text" id="subject" class="border border-gray-300 rounded-md w-full p-2 mb-4" placeholder="Message subject">
                
                <label for="message" class="block text-gray-700">Message:</label>
                <textarea id="messageBody" rows="4" class="border border-gray-300 rounded-md w-full p-2 mb-4" placeholder="Type your message here..."></textarea>

                <div class="flex justify-end">
                    <button type="button" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition duration-200" onclick="closeComposeModal()">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-200 ml-2">
                        Send
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Conversation Modal (Hidden by default) -->
<div id="conversationModal" class="fixed inset-0 z-50 hidden bg-gray-800 bg-opacity-50 flex items-center justify-center">
    <div class="bg-white rounded-lg p-6 w-11/12 md:w-1/3">
        <h3 id="conversationSubject" class="text-xl font-semibold mb-4">Message Subject</h3>
        <p id="conversationBody" class="text-gray-600 mb-4">Message body content goes here...</p>

        <div class="text-right">
            <button type="button" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition duration-200" onclick="closeConversationModal()">Close</button>
        </div>
    </div>
</div>

<script>
    // Compose Message Modal Functions
    function showComposeModal() {
        document.getElementById('composeModal').classList.remove('hidden');
    }

    function closeComposeModal() {
        document.getElementById('composeModal').classList.add('hidden');
    }

    function composeMessage(event) {
        event.preventDefault();

        const recipient = document.getElementById('recipient').value;
        const subject = document.getElementById('subject').value;
        const messageBody = document.getElementById('messageBody').value;

        if (recipient && subject && messageBody) {
            // Simulate adding a new message to the inbox
            const messageList = document.getElementById('messageList');
            const noMessages = document.getElementById('noMessages');
            
            const newMessage = `
                <div class="flex justify-between items-start bg-gray-50 p-4 rounded-lg shadow-sm hover:shadow-md transition duration-200 cursor-pointer" onclick="showConversation('${subject}', '${messageBody}')">
                    <div class="flex-grow">
                        <h3 class="text-lg font-medium text-gray-700">${subject}</h3>
                        <p class="text-gray-500 text-sm">From: ${recipient} | Date: ${new Date().toISOString().split('T')[0]}</p>
                        <p class="text-gray-600 text-sm mt-1">${messageBody.slice(0, 50)}...</p>
                    </div>
                    <button class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700 transition duration-200" onclick="event.stopPropagation(); deleteMessage(this);">
                        Delete
                    </button>
                </div>
            `;
            
            messageList.insertAdjacentHTML('beforeend', newMessage);
            noMessages.classList.add('hidden');
            closeComposeModal();
        }
    }

    // Delete Message Function
    function deleteMessage(element) {
        element.closest('.flex').remove();

        // Check if the inbox is empty
        const messageList = document.getElementById('messageList');
        if (messageList.children.length === 0) {
            document.getElementById('noMessages').classList.remove('hidden');
        }
    }

    // Conversation Modal Functions
    function showConversation(subject, body) {
        document.getElementById('conversationSubject').innerText = subject;
        document.getElementById('conversationBody').innerText = body;
        document.getElementById('conversationModal').classList.remove('hidden');
    }

    function closeConversationModal() {
        document.getElementById('conversationModal').classList.add('hidden');
    }
</script>

@endsection
