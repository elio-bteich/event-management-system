@extends("layouts.app")

@section("content")

    <style>
        .homepage-container {
            background: black;
        }
        form {
            left: 100%;
            top: 50%;
            height: 75%;
            width: 60%;
            transform: translate(-100%, -50%);
            position: relative;
            background: #1f1f1f;
        }
        .input-div {
            padding: 20px;
        }
        input {
            border: none;
            border-bottom: solid rgb(143, 143, 143) 1px;
            font-size: 18px;
            background: none;
            color: rgba(255, 255, 255, 0.555);
            margin-bottom: 28px;
            height: 35px;
            width: 100%;
        }
        input:focus{
            outline: none;
        }

        .row {
            margin: 0;
            --bs-gutter-x: 0;
            --bs-gutter-y: 0;
        }
        .submit-btn {
            position: relative;
            left: 50%;
            background: black;
            border: none;
            transform: translateX(-50%);
            width: 30%;
            height: 40px;
            margin: 20px 0 40px 0;
            color: rgba(255, 255, 255, 0.68);
            font-size: 18px;
        }
        .submit-btn:hover {
            background: rgba(164, 164, 164, 0.8);
            color: black;
        }
        .flyer {
            width: 60%;
            height: 75%;
            position: relative;
            top: 50%;
            transform: translateY(-50%);
        }
        .fname {
            margin-top: 30px;
        }

        .reservation-form-title {
            padding-top: 50px;
            text-align: center;
            color: #FFFFFFCC;
        }
        .customed-alert {
            width: 60%;
            position: absolute;
            top: 8%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .create-input-box-1, .create-input-box-2, .create-input-box-3, .create-input-box-4 {
            display: none;
        }
    </style>

    <div class="homepage-container">
        @if(Session::has('success'))
            <div class="customed-alert alert alert-success mb-0 mt-2">
                {{Session::pull('success')}}
            </div>
        @endif
            @if(Session::has('error'))
                <div class="customed-alert alert alert-danger mb-0 mt-2">
                    {{Session::pull('error')}}
                </div>
            @endif
        <div class="row h-100">
            <div class="col-6 h-100 reservation-box">
                <form action="{{ route('reservation.store') }}" method="post">
                    @csrf
                    <div id="create-input-box">
                        <div class="create-input-box-1">
                            @include('reservations.create-input-box-1')
                        </div>
                        <div class="create-input-box-2">
                            @include('reservations.create-input-box-2')
                        </div>
                        <div class="create-input-box-3">
                            @include('reservations.create-input-box-3')
                        </div>
                        <div class="create-input-box-4">
                            @include('reservations.create-input-box-4')
                        </div>
                    </div>
                    <div class="row justify-content-between mx-5 mt-4">
                        <div class="col-6">
                            <a class="btn btn-danger back-btn">Back</a>
                        </div>
                        <div class="col-6">
                            <a class="btn btn-primary float-end next-btn">Next</a>
                        </div>
                    </div>
                    <!-- <input type="submit" class="btn btn-primary submit-btn" value="Reserve"> -->
                </form>
            </div>
            <div class="col-6 h-100">
                <img class="flyer" src="/uploads/event_flyers/{{ $event->flyer_image }}">
            </div>
        </div>
    </div>

    <script>
        let inputBoxNum = 4
        let currentIndex = 1
        let emailCodeSent = false
        let phoneCodeSent = false
        let emailVerified = false
        let phoneVerified = false
        let emailEncryptedCode

        $('.create-input-box-1').show()
        updateButtons()
        $('.back-btn, .next-btn').on('click', function (e) {
            let btnClicked = e.target.className.includes('next-btn') ? 'next' : 'back'

            if (btnClicked === 'next') {
                if (currentIndex === 2 && !emailVerified) {
                    if (!emailCodeSent) {
                        sendEmailCode()
                        emailCodeSent = true
                    }
                    nextBox()
                } else if (currentIndex === 3 && !emailVerified) {
                    if ($('input[name=email_code]').val() !== ''){
                        let code_input = $('input[name=email_code]').val()
                        hash(code_input).then((hex) => {
                            if (hex === emailEncryptedCode) {
                                emailVerified = true
                                $($('.create-input-box-3')[0]).html(
                                    '<h2 class="reservation-form-title">Email Verification</h2>' +
                                    '<div class="alert alert-success my-5">Your email has been verified successfully</div>'
                                )
                                console.log('email verified successfully')
                                nextBox()
                                //sendPhoneCode()
                                phoneCodeSent = true
                                console.log('phone code sent')
                            } else {
                                console.log('code is incorrect, please try again!')
                            }
                        })

                    } else if (currentIndex === 4 && emailVerified) {

                    } else {
                        console.log('code input is empty')
                    }
                } else {
                    nextBox()
                }
            } else {
                previousBox()
            }
        })

        $('input[name=email]').change(function (){
            $($('.create-input-box-3')[0]).html(`@include('reservations.create-input-box-3')`)
            emailCodeSent = false
            emailVerified = false
        })

        $('input[name=phone_number]').change(function (){
            phoneCodeSent = false
            phoneVerified = false
        })

        function updateButtons() {
            if (currentIndex <= 1) {
                $('.back-btn').hide()
                $('.next-btn').show()
            } else if (currentIndex > 1 && currentIndex < inputBoxNum) {
                $('.back-btn').show()
                $('.next-btn').show()
            } else {
                $('.back-btn').show()
                $('.next-btn').hide()
            }
        }

        function nextBox() {
            $('.create-input-box-'+currentIndex).hide()
            currentIndex++
            $('.create-input-box-'+currentIndex).show()
            updateButtons()
        }

        function previousBox() {
            $('.create-input-box-'+currentIndex).hide()
            currentIndex--
            $('.create-input-box-'+currentIndex).show()
            updateButtons()
        }

        function emailAddress() {
            return $('input[name=email]').val()
        }

        function phoneNumber() {
            return $('input[name=phone_number]').val()
        }

        function sendEmailCode() {
            $.ajax({
                url: '/reservation/sendEmailVerification/'+emailAddress(),
                method: 'GET',
                success: function (data) {
                    emailEncryptedCode = data
                }
            })
        }

        function sendPhoneCode() {
            // TODO
        }

        function hash(string) {
            const utf8 = new TextEncoder().encode(string);
            return crypto.subtle.digest('SHA-256', utf8).then((hashBuffer) => {
                const hashArray = Array.from(new Uint8Array(hashBuffer));
                const hashHex = hashArray
                    .map((bytes) => bytes.toString(16).padStart(2, '0'))
                    .join('');
                return hashHex;
            });
        }

    </script>

@endsection
