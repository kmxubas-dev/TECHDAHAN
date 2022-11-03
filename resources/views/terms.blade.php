<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="{{ asset('img/logo-dark.png') }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.css" integrity="sha512-gxWow8Mo6q6pLa1XH/CcH8JyiSDEtiwJV78E+D+QP0EVasFs8wKXq16G8CLD4CJ2SnonHr4Lm/yY2fSI2+cbmw==" crossorigin="anonymous" referrerpolicy="no-referrer"/>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            <main class="relative min-h-screen w-full bg-white">
                <section>
                    <a href="{{ route('login') }}" class="flex justify-center">
                        <img src="{{ asset('img/logo-dark.png') }}" alt="" class="h-20">
                    </a>
                    <div class="flex flex-col space-y-3 p-5 text-justify text-lg">
                        <h1 class="flex justify-center text-2xl font-bold">TECHDAHAN</h1>
                        <h3 class="text-xl font-semibold">Terms of Use</h3>
                        
                        <p>
                            1. This document reflects the legal policies of Techdahan with regard to the use of its
                            services. Signing up for an account means that you have read the following policies and have agreed to
                            the associated terms:
                        </p>
                        <p>
                            2. Each member is allowed to have only one logged in account. Registering and using
                            multiple accounts simultaneously is prohibited. Account sharing, transferring, borrowing, or acquiring
                            ownership is also prohibited.
                        </p>
                        <p>
                            3. Techdahan reserves the right to deny the use of its services to anyone at any time for any
                            reason whatsoever at its sole discretion and without any notice. Denial of service may be applied in any
                            way chosen by Techdahan.
                        </p>
                        <p>
                            4. Techdahan (represented by the creators of the site, moderators and administrators)
                            reserves the right to delete, remove, edit, alter, change any data on the website without any form of notice
                            to its users;
                        </p>
                        <p>
                            5. Techdahan does not guarantee the constant availability of its services to its users.
                            6. Techdahan prohibits the use of this site to infringe on any copyrighted materials or
                            services, as well as similar activities.
                        </p>
                        <p>
                            7. Techdahan forbids the use of its facilities to convey profanity, vulgarity, discriminatory,
                            defamatory, inaccurate, obscene, hostile remarks, or to violate the law in any other way.
                        </p>
                        <p>
                            8. TECHDAHAN, ITS OFFICERS, DIRECTORS, AND EMPLOYEES, SHALL NOT BE
                            LIABLE FOR LOST PROFITS OR ANY SPECIAL, INCIDENTAL, OR CONSEQUENTIAL
                            DAMAGES ARISING OUT OF OR IN CONNECTION WITH TECHDAHAN'S SITE, ITS SERVICES,
                            OR THIS AGREEMENT (HOWEVER ARISING, INCLUDING NEGLIGENCE).
                        </p>
                        <p>
                            9. You agree to compensate and hold Techdahan harmless from any claim or demand,
                            including reasonable attorneys' fees, made by any third party due to or arising out of your breach of this
                            Agreement or the documents it incorporates by reference, or your violation of any law or the rights of a
                            third party;
                        </p>
                        <p>
                            10. All of the rules and policies stated in the Item Posting Rules and Policies, Forum Posting
                            Rules and Policies, and relevant advisories posted in the Official News and Announcements thread will be
                            incorporated into these Terms of Use.
                        </p>
                        <p>
                            11. Violation of any of our rules and policies shall be grounds for the offending user's being
                            restricted from accessing Techadahan. Furthermore, Techdahan reserves the right to pursue any legal
                            action deemed necessary.
                        </p>
                        <p>
                            12. Techdahan will not be held liable for any transactions made by the buyer and seller
                            through private messaging negotiations. Any negotiation of payments through meetup or other payments
                            that are not in the choices of payments in Techdahan is in the Techbuyer and Techsellers' accountability.
                            As a result, any transactions made through it will not be refunded, monitored, or held accountable by
                            Techdahan.
                        </p>
                        <p>
                            13. For transactions made through Techdahan in the form of credit cards or e-wallets, on the
                            arrival of the item to the Techbuyers, Techdahan will hold onto the payment for 24 hours. Upon the arrival
                            of the item, Techbuyer will be given 24 hours to report if the item is defective or if it has issues, and
                            Techseller and Techdahan will be notified and will look to solve the issue. If proven that the item has an
                            issue, Techbuyer needs to return the item to Techseller. Once confirmed that Techseller received the item,
                            Techbuyer will be refunded. But if there are no issues reported, it will be assumed that the item is working
                            well and the payment will be given to the techseller.
                        </p>
                        <p>
                            14. Techdahan reserves the right to make changes to these policies at any time for any reason
                            conceived by the group without prior notice.
                        </p>

                        <hr>

                        <h3 class="text-xl font-semibold">Disclaimer</h3>
                        <p>
                            1. Techdahan will not be responsible or be involved, in any way, in any direct transaction
                            between buyer and seller, nor in any court litigation that may arise thereby. Also, Techdahan does not
                            guarantee the credibility of the users of its services, nor the items and services posted by them.
                        </p>
                        <p>
                            2. Techdahan does not guarantee the availability of any product or item listed on the site, as
                            well as the assurance of the buyer's intent to purchase or sell any listed item;
                        </p>
                        <p>
                            3. Techdahan assumes no responsibility for the legality, quality, worth, and durability of any
                            item or product, or the validity of content posted by its users.
                        </p>
                        <p>
                            4. Expect visual wear and tear; there will be scuffs and scratches, depending on the specific
                            unit. The battery life of used laptops will not be 100% anymore. Expect reduced operating times when
                            unplugged.
                        </p>

                        <hr>

                        <h3 class="text-xl font-semibold">Privacy Policy</h3>
                        <p>
                            1. For your privacy protection, we at Techdahan use the following guidelines for customer
                            privacy. Signing up for an account at Techdahan means that you have read the following policies and have
                            agreed to the associated terms.
                        </p>
                        <p>
                            2. By signing up for an account with Techdahan, you agree to provide and maintain
                            accurate, complete, and up-to-date information about yourself as required by the account creation process.
                        </p>
                        <p>
                            3. All information collected by Techdahan will be used to: resolve disputes; troubleshoot
                            problems; benchmark consumer interest in our services; protect Techdahan and its users from fraud or any
                            other criminal activity; and as otherwise described to the user at the time of collection.
                        </p>
                        <p>
                            4. Upon your account's creation, all of your information is protected from other users by the
                            provided login name and password. You are responsible for keeping your login information, including
                            your email address, confidential and undisclosed.
                        </p>
                        <p>
                            5. You agree that Techdahan may use personal information about you to analyze site usage,
                            improve content and product offerings, and customize Techdahan services.
                        </p>
                        <p>
                            6. You agree that Techdahan may use personal information about you and disclose such
                            information in a non-personally identifiable manner to its advertisers and sponsors for their marketing and
                            promotional purposes.
                        </p>
                        <p>
                            7. You agree that Techdahan may disclose your site information, postings, and messages
                            relative to any investigation concerning activities deemed criminal or illegal in nature
                            8. All relevant announcements posted in the Announcements thread will be incorporated
                            into the Techdahan Privacy Policy.
                        </p>
                    </div>
                </section>
            </main>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js" integrity="sha512-+gShyB8GWoOiXNwOlBaYXdLTiZt10Iy6xjACGadpqMs20aJOoh+PJt3bwUVA6Cefe7yF7vblX6QwyXZiVwTWGg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
          var input = document.querySelector("#phone");
          window.intlTelInput(input, {
            // any initialisation options go here
            initialCountry: 'ph',
            onlyCountries: ['ph'],
            customContainer: 'w-full my-1',
          });
        </script>
    </body>
</html>




{{-- <x-guest-layout>
    <div class="pt-4 bg-gray-100">
        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
            <div>
                <x-jet-authentication-card-logo />
            </div>

            <div class="w-full sm:max-w-2xl mt-6 p-6 bg-white shadow-md overflow-hidden sm:rounded-lg prose">
                {!! $terms !!}
            </div>
        </div>
    </div>
</x-guest-layout> --}}
