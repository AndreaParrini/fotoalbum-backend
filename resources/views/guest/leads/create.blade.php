@extends('layouts.app')

@section('content')
    <div class="p-5 mb-4 bg-light">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">Contact us</h1>
            <p class="col-md-8 fs-4">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellendus, molestias voluptatum. Consectetur,
                maiores magni. Nobis sit praesentium ex, atque sint excepturi molestiae rem ut nihil eaque corrupti
                voluptatum culpa quasi sunt impedit omnis natus eius laboriosam placeat repellendus tempore! Et animi ab
                magni officia atque consequuntur, ea praesentium rerum itaque!
            </p>
            <a class="btn btn-primary btn-lg" href="#contact-form">
                Contact me
            </a>
        </div>
    </div>


    <div class="container">
        @include('partials.message')
        @include('partials.error')
        <form action="{{ route('contacts.store') }}" method="post" id="contact-form">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="helpIdNameGuest"
                    placeholder="Your name ..." />
                <small id="helpIdNameGuest" class="form-text text-muted">Insert your name here</small>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId"
                    placeholder="abc@mail.com" />
                <small id="emailHelpId" class="form-text text-muted">Insert here your mail</small>
            </div>

            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" name="message" id="message" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">
                Send
            </button>


        </form>

    </div>
@endsection
