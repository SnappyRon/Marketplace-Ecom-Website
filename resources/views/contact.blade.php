{{-- resources/views/contact.blade.php --}}
<x-app-layout>
    <x-slot name="title">
        MindanaoMarket - Contact
    </x-slot>
    <section class="contact-section">
        <div class="form-container">
            <h2>Contact Us</h2>
            <form action="#" method="POST">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" placeholder="Your Full Name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Your Email" required>
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="5" placeholder="Your Message" required></textarea>
                </div>
                <button type="submit" class="btn">Send Message</button>
            </form>
        </div>
    </section>
</x-app-layout>
